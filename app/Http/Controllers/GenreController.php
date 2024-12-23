<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::all(); 
        return response()->json($genre); 
    }
}
