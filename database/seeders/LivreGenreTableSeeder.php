<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LivreGenre;

class LivreGenreTableSeeder extends Seeder
{
    public function run(): void
    {
        LivreGenre::create([
            'idLivre' => 1, // ID du livre
            'idGenre' => 1, // ID du genre
            'dateAquit' => now(),
            'rangGenre' => 1,
        ]);

        LivreGenre::create([
            'idLivre' => 2, // ID du livre
            'idGenre' => 2, // ID du genre
            'dateAquit' => now(),
            'rangGenre' => 2,
        ]);
    }
}
