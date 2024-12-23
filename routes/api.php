<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LivreGenreController;
use App\Http\Controllers\AuthentificationController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Or if you only need the index route:
    Route::get('/livres', [LivreController::class, 'index']);

    // If you need other routes individually:
    Route::get('/livres/{livre}', [LivreController::class, 'show']);
    Route::post('/livres', [LivreController::class, 'store']);
    Route::put('/livres/{livre}', [LivreController::class, 'update']);
    Route::delete('/livres/{livre}', [LivreController::class, 'destroy']); 

// Routes pour le UserController
Route::get('/users', [UtilisateurController::class, 'index']);

// Routes pour le AdminController
Route::get('/admin', [AdministrateurController::class, 'index']);

// Routes pour le GenreController
Route::get('/genre', [GenreController::class, 'index']);

// Routes pour le livreGenreController
Route::get('/livreGenre', [LivreGenreController::class, 'index']);


// Routes pour l'AuthentificationController
Route::post('/login', [AuthentificationController::class, 'login']);
Route::post('/register', [AuthentificationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthentificationController::class, 'logout']);
});