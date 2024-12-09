<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'idUtilisateur' => 1, // ID du User correspondant
        ]);
    }
}
