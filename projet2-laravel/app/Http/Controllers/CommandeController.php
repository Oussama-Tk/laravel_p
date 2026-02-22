<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommandeController extends Controller
{

    public function __construct()
    {
        $this->middleware('dateLimit') ;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = Client::all() ;
        $commandes = Commande::with('client') ;
        if($request->has('client_id') && $request->client_id !=""){
            $commandes = $commandes->where('client_id' , $request->client_id) ;
        }
        $commandes = $commandes->paginate(10) ;
        return view('commandes.index' , compact('commandes' , 'clients')) ;
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
            'client_id' => 'required|exists:clients,id']) ;

        Commande::create($validated) ;
        return Redirect()->route('commandes.index')->with('success', 'Commande ajoutée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        $commande->load(['client' , 'produits']) ;
        $produits = Produit::all() ;
        return view('commandes.show' , compact('commande' , 'produits')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        $clients = Client::all() ;
        return view('commandes.edit' , compact('commande' , 'clients')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $validated = $request->validate([
            'date' => 'required|date' ,
            'client_id' => 'required|exists:clients,id'
        ]) ;

        $commande->update($validated) ;
        return Redirect()->route('commandes.index')->with('success' , 'Commande Modifiee !') ;
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete() ;
        return Redirect()->route('commandes.index')->with('success', 'Commande supprimée !');
    }

    public function ajouter_produits(Request $request , Commande $commande){
        $request->validate([
            'produit_id' => 'required|exists:produits,id' ,
            'qte_cmd' => 'required|integer|min:1'
        ]);

        $commande->produits()->attach($request->produit_id , ['qte_cmd' => $request->qte_cmd]) ;
        return back() ;
    }
    
    public function search(Request $request){
        $query = Commande::with('client') ;
        if($request->has('client_id') && $request->client_id != ''){
            $query->where('client_id' , $request->client_id) ;
        }

        $commandes = $query->paginate(10) ;
        $clients = Client::all() ;

        return view('commandes.search' , compact('commandes' , 'clients')) ;

    }
}
