<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importer Storage pour gérer les fichiers

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all(); 
        return response()->json($livres); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'string|max:255', // Validation optionnelle pour le titre
            'description' => 'string', // Validation optionnelle pour la description
            'photo' => 'image|nullable', // Validation pour l'image (optionnelle)
            'fichier_pdf' => 'mimes:pdf|nullable', // Validation pour le PDF (optionnelle) 
        ]);

        $livre = new Livre;
        $livre->titre = $request->input('titre');
        $livre->description = $request->input('description');

        // Gestion de l'upload de l'image
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/livres'); // Stocker l'image dans le dossier public/livres
            $livre->photo = $path;
        }

        // Gestion de l'upload du PDF
        if ($request->hasFile('fichier_pdf')) {
            $path = $request->file('fichier_pdf')->store('public/livres'); // Stocker le PDF dans le dossier public/livres
            $livre->fichier_pdf = $path;
        }

        $livre->save();

        return response()->json($livre, 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livre = Livre::findOrFail($id);
        return response()->json($livre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'string|max:255', // Validation optionnelle pour le titre
            'description' => 'string', // Validation optionnelle pour la description
            'photo' => 'image|nullable', // Validation pour l'image (optionnelle)
            'fichier_pdf' => 'mimes:pdf|nullable', // Validation pour le PDF (optionnelle)
        ]);

        $livre = Livre::findOrFail($id);

        $livre->titre = $request->input('titre');
        $livre->description = $request->input('description');

        // Gestion de la mise à jour de l'image
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image s'il y en a une
            if ($livre->photo) {
                Storage::delete($livre->photo);
            }
            // Stocker la nouvelle image
            $path = $request->file('photo')->store('public/livres');
            $livre->photo = $path;
        }

        // Gestion de la mise à jour du PDF
        if ($request->hasFile('fichier_pdf')) {
            // Supprimer l'ancien PDF s'il y en a un
            if ($livre->fichier_pdf) {
                Storage::delete($livre->fichier_pdf);
            }
            // Stocker le nouveau PDF
            $path = $request->file('fichier_pdf')->store('public/livres');
            $livre->fichier_pdf = $path;
        }

        $livre->save();

        return response()->json($livre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livre = Livre::findOrFail($id);

        // Supprimer l'image si elle existe
        if ($livre->photo) {
            Storage::delete($livre->photo);
        }

        // Supprimer le PDF si il existe
        if ($livre->fichier_pdf) {
            Storage::delete($livre->fichier_pdf);
        }

        $livre->delete();

        return response()->json(null, 204);
    }
}