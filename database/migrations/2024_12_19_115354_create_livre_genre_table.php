<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreGenreTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('livre_genres', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->date('dateAquit'); // Date d'acquisition
            $table->integer('rangGenre'); // Rang du genre
            $table->unsignedBigInteger('idLivre'); // Clé étrangère vers Livre
            $table->unsignedBigInteger('idGenre'); // Clé étrangère vers Genre

            // Contraintes de clé étrangère
            $table->foreign('idLivre')->references('idLivre')->on('livres')->onDelete('cascade');
            $table->foreign('idGenre')->references('idGenre')->on('genres')->onDelete('cascade');

            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livre_genres');
    }
}

