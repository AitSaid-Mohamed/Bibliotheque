<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivreGenre extends Model
{
    protected $table = 'livre_genres';

    protected $fillable = [
        'idLivre',
        'idGenre',
        'dateAquit',
        'rangGenre',
    ];

    public $timestamps = true;

    /**
     * Relation avec le livre.
     */
    public function livre()
    {
        return $this->belongsTo(Livre::class, 'idLivre');
    }

    /**
     * Relation avec le genre.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'idGenre');
    }
}
