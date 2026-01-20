<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::with('client')->paginate(10);
        return view('commandes.index' , compact('commandes')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all() ;
        return view('commandes.create' , compact('clients')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date' ,
            'client_id' => 'required|exists:clients,id'
        ]) ;

        Commande::create($validated) ;
        return Redirect()->route('commandes.index')->with('success', 'Commande ajoutée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        return view('commandes.edit' , compact('commande')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $validated = $request->validate([
            'date' => 'required|date' ,
            'client_id' => 'required|exists::clients,id'
        ]) ;

        $commande->update($validated) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete() ;
        return Redirect()->route('commandes.index')->with('success', 'Commande supprimée !');
    }
}
