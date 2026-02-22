<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10) ;
        return view('livres.index' , compact('livres')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auteurs = Auteur::all() ;
        return view('livres.create' , compact('auteurs')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:200' ,
            'annee_pub' => 'required|numeric|gt:1900' ,
            'nb_pages' => 'required|numeric' ,
            'auteur_id' => 'required|exists:auteurs , id' ,
        ]) ;

        Livre::create($validated) ;
        return redirect()->route('livres.index')->with('success' , 'livre cree avec success') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        $livre->load('auteur') ;

        return view('livres.show' , compact($livre)) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        $livre->load('auteur') ;
        return view('livres.edit' , compact('livre')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $validated = $request->validate([
            'titre' => 'required|max:200' ,
            'annee_pub' => 'required|numeric|gt:1900' ,
            'nb_pages' => 'required|numeric' ,
            'auteur_id' => 'required|exists:auteurs , id' ,
        ]) ;

        $livre->update($validated) ;
        return redirect()->route('livres.index')->with('success' , 'livre modifiee avec success') ;
    }

    public function confirmDestroy(Livre $livre){
        return view('livres.supprimer' , compact('livre')) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->delete() ;
        return redirect()->route('livres.index')->with('success' , 'livre supprimee avec success') ;
    }
}
