<?php

namespace App\Http\Controllers;
use App\Models\LivreGenre;

use Illuminate\Http\Request;

class LivreGenreController extends Controller
{
    public function index()
    {
        $livreGenre = LivreGenre::all(); 
        return response()->json($livreGenre); 
    }
}
