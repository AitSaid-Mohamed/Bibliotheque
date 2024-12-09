<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable = [
        'nomGenre',
    ];

    public $timestamps = true;

    /**
     * Relation avec les livres via la table pivot.
     */
    public function livres()
    {
        return $this->belongsToMany(Livre::class, 'livre_genre', 'idGenre', 'idLivre');
    }
}
