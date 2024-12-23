<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = 'livres';

    protected $fillable = [
        'titre',
        'auteur',
        'evaluation',
        'idUtilisateur',
        'photo', // Ajoutez le champ photo
        'fichier_pdf', // Ajoutez le champ fichier_pdf
    ];

    public $timestamps = true;

    /**
     * Relation avec les genres via la table pivot.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'livre_genre', 'idLivre', 'idGenre');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUtilisateur');
    }
}