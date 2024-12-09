<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    public function run(): void
    {
        Genre::create(['nomGenre' => 'Science Fiction']);
        Genre::create(['nomGenre' => 'Fantasy']);
        Genre::create(['nomGenre' => 'Biography']);
        Genre::create(['nomGenre' => 'Thriller']);
    }
}