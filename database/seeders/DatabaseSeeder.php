<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            GenresTableSeeder::class,
            LivresTableSeeder::class,
            LivreGenreTableSeeder::class,
        ]);
    }
}