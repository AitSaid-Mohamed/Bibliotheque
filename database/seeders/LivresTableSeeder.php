<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;
use App\Models\User;
use Faker\Factory as Faker;

class LivresTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        if (!$user) {
            echo "Aucun utilisateur trouvé pour associer le livre.";
            return;
        }

        $faker = Faker::create();

        // Tableau de données pour les livres
        $livres = [
            ['titre' => 'Dune', 'auteur' => 'Frank Herbert', 'evaluation' => 4.8],
            ['titre' => 'Le Seigneur des anneaux', 'auteur' => 'J.R.R. Tolkien', 'evaluation' => 4.9],
            // Ajoutez d'autres livres ici
        ];

        foreach ($livres as $livreData) {
            try {
                Livre::create([
                    'titre' => $livreData['titre'],
                    'auteur' => $livreData['auteur'],
                    'evaluation' => $livreData['evaluation'],
                    'idUtilisateur' => $user->id,
                    // Ajoutez d'autres champs ici, comme 'photo', 'fichier_pdf', 'date_publication'
                    'photo' => $faker->imageUrl(), // Exemple d'image aléatoire
                ]);
            } catch (\Exception $e) {
                echo "Erreur lors de la création du livre : " . $e->getMessage();
            }
        }
    }
}