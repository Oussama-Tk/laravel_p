<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all() ;
        return view('produits.index' , compact('produits')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'qte_stock' => 'required|integer' ,
            'prix' => 'required' ,
            'image' => 'required|image|max:2048' ,
        ]) ;

        if($request->hasFile('image')){
            $file = $request->file('image') ;
            $path = $file->storeAs('produits' , $file->getClientOriginalName() , 'public') ;

            $validated['image'] = $path ;
        }

        Produit::create($validated) ;
        return redirect()->route('produits.index') ;

    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produits.show') ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit' , compact('produit')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255' ,
            'qte_stock' => 'required|integer' ,
            'prix' => 'required' ,
            'image' => 'required|image|max:2048' ,
        ]);

        if($request->hasFile('image')){
            if($produit->image){
                $path = public_path('storage/'.$produit->image) ;
                if(file_exists($path)){
                    File::delete($path) ;
                }
            }
            $file = $request->file('image') ;
            $validated['image'] = $file->storeAs('produits' , $file->getClientOriginalName() , 'public') ;
        }
        else{
            unset($validated['image']) ;
        } ;

        $produit->update($validated) ;
        return redirect()->route('produits.index') ;
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $path = public_path('storage/'.$produit->image) ;
        if(file_exists($path)){
            File::delete($path) ;
        }

        $produit->delete() ;
        return redirect()->route('produits.index') ;
    }

}
