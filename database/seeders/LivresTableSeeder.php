<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;

class LivresTableSeeder extends Seeder
{
    public function run(): void
    {
        Livre::create([
            'titre' => 'Dune',
            'auteur' => 'Frank Herbert',
           
            'evaluation' => 4.8,
        ]);

        Livre::create([
            'titre' => '1984',
            'auteur' => 'George Orwell',
            
            'evaluation' => 4.7,
        ]);
    }
}
