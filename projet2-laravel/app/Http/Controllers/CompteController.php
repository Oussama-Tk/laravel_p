<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class CompteController extends Controller
{
    public function inscrire(){
        return view('comptes.inscription') ;
    }

    public function logicInscrire(Request $request){
        $validated = $request->validate([
            'login' => 'required|unique:comptes',
            'mot_passe' => 'required|min:5'
        ]) ;

        Compte::create([
            'login' => $request->login ,
            'mot_passe' => Hash::make($request->mot_passe) ,
            'profil' => $request->profil ,
        ]) ;
        return redirect()->route('connexion')->with('success' , 'Compte cree avec success !') ;
    }

    public function connexion(){
        return view('comptes.connexion') ;
    }

    public function logicConnexion(Request $request){

        $currentUser = Compte::where('login' , $request->login)->first() ;
        if($currentUser && Hash::check($request->mot_passe , $currentUser->mot_passe)){
            session(['currentUser' => Compte::where('login' , $request->login)->first()]) ;
            return redirect('profil');
        }

        // $infos = $request->validate([
        //     'login' => 'required|unique:comptes',
        //     'mot_passe' => 'required|min:5'
        // ]);

        // if(Auth::attempt($infos)){
        //     $request->session()->regenerate() ;
        //     session(['currentUser' => Compte::where('login' , $request->login)->first()]) ;

        //     // return redirect()->route('profil') ;
        //     return redirect()->intended(route('profil')) ;
        // }
        return back()->with('error', 'Identifiants incorrects.');
    }

    public function profil(){
        if(!session()->has('currentUser')){
            return redirect()->route('connexion')->with('error' , 'Veuillez vous connecter !') ;
        }
        $currentUser = session('currentUser') ;
        return view('comptes.profil' , compact('currentUser')) ;
    }

    public function logout(){
        session()->flush() ;

        return redirect()->route('connexion') ;
    }
}
