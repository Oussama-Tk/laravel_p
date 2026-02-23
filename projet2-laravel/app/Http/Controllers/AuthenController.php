<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function inscrireForm(){
        return view('authn.inscrire') ;
    }

    public function inscrire(Request $request){
        $validated = $request->validate([
            'nom' => 'required|max:80' ,
            'prenom' => 'required|max:80' ,
            'email' => 'required|email|unique:clients,email' ,
            'password' => 'required|min:8' ,
        ]) ;

        Client::create([
            'nom' => $validated['nom'] ,
            'prenom' => $validated['prenom']  ,
            'email' => $validated['email']  ,
            'password' => Hash::make($validated['nom'])  ,
        ]) ;

        return redirect()->route('login')->with('success' , 'client cree avec success !') ;
    }

    public function connexionForm(){
        return view('authn.connexion') ;
    }

    public function connexion(Request $request){
        $validated = $request->validate([
            'nom' => 'required|max:80' ,
            'prenom' => 'required|max:80' ,
            'email' => 'required|email|unique:clients,email' ,
            'password' => 'required|min:8' ,
        ]) ;

        $client = Client::where('email' , $validated['email'])->first() ;

        if($client && Hash::check($client->password , $validated['password'])){
            session(['currentClient' => $client]) ;
            session()->regenerate() ;
            return redirect()->route('livres.index')->with('success', 'Heureux de vous revoir !');
        }

        return back()->with('error' , 'Identifiants incorrect !') ;
    }

    public function logout(){
        session()->invalidate() ;
    }
}
