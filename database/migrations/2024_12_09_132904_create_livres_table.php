<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id('idLivre');
            $table->string('titre');
            $table->string('auteur');
            $table->float('evaluation')->default(0);
                // Champ pour stocker le chemin de l'image
                $table->string('photo')->nullable(); 

                // Champ pour stocker le chemin du fichier PDF
                $table->string('fichier_pdf')->nullable(); 

            // Clé étrangère vers la table utilisateurs
            $table->foreignId('idUtilisateur')->constrained('users', 'id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
