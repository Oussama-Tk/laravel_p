<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('OneMiddleware')->only('oneMethode');
        $this->middleware('TwoMiddleware')->except('oneMethode');
        $this->middleware('ThreeMiddleware')->except(['oneMethode' , 'twoMethode']);
    }

    public function Afficher($nom , $age){

        return view( 'afficher' , ['nom' => $nom , 'age' => $age]) ;

        
    }

    public function oneMethode(){

        return 'je suis la méthode oneMethode';

    }

    public function twoMethode(){

        return 'je suis la méthode twoMethode';

    }

    public function index(){

        return 'je suis le contrôleur BaseController';

    }
    
}
