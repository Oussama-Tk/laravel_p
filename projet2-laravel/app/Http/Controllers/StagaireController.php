<?php

namespace App\Http\Controllers;

use App\Models\Stagaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StagaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagaires = Stagaire::all() ;
        return view('stagaires.index' , compact('stagaires')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagaires.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Stagaire = new Stagaire() ;
        $Stagaire->nom = $request->nom ;
        $Stagaire->prenom = $request->prenom ;
        $Stagaire->date_naissance = $request->date_naissance ;

        $Stagaire->save() ;
        return Redirect()->route('stagaires.index')->with('succes' ,  'Stagiaire créé. ') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagaire $stagaire)
    {
        return view('stagaires.show' ,compact('stagaire')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagaire $stagaire)
    {
        return view('stagaires.edit' , compact('stagaire')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagaire $stagaire)
    {
        $stagaire->nom = $request->nom ;
        $stagaire->prenom = $request->prenom ;
        $stagaire->date_naissance = $request->date_naissance ;
        $stagaire->save() ;
        return Redirect()->route('stagaires.index') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagaire $stagaire)
    {
        $stagaire->delete();
        return Redirect()->route('stagaires.index');
    }
}
