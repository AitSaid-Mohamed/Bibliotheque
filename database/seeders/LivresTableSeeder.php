<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;
use App\Models\User;

class LivresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Vérifier qu'un utilisateur existe
        $user = User::first();
        if ($user) {
            Livre::create([
                'titre' => 'Dune',
                'auteur' => 'Frank Herbert',
                'evaluation' => 4.8,
                'idUtilisateur' => $user->id, // Associe l'utilisateur existant
            ]);
        } else {
            echo "Aucun utilisateur trouvé pour associer le livre.";
        }
    }
}
