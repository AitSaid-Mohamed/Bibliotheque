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
            $table->id(); 
            $table->date('dateAquit');
            $table->integer('rangGenre');
            $table->unsignedBigInteger('idLivre'); 
            $table->unsignedBigInteger('idGenre'); 

            $table->foreign('idLivre')->references('idLivre')->on('livres')->onDelete('cascade');
            $table->foreign('idGenre')->references('idGenre')->on('genres')->onDelete('cascade');

            $table->timestamps(); 
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

