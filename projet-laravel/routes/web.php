<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\InvokeController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\TestController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

/////////////////////////////////////////////////////////////////////////////////////////// TP 1 : 

///// 1 :

    Route::get('/home' , function(){
        return 'Bounjour Laravel' ;
    }) ;

///// 2 : 

    Route::get('/accuil' , function(){
        return view('accuil') ;
    })->name('accuil') ;

///// 6 :

    Route::get('/index' , [TestController::class , 'index']) ;

///// 8 :

    Route::get('/index' , [TestController::class , 'show']) ;

///// 10 : 

    Route::view('/view' , 'accuil') ;

/// Paramètres de Route : 
// 1 : 

    Route::get('home/{nom}' , function($nom = 'yahya') {
        return 'Bonjour ' . $nom ;
    });

// 2 : 

    Route::get('home/{nom}/{age?}' , function($nom , $age) {
        return 'Bonjour '. $nom .' votre Age est ' . $age .' ans .'  ;
    });

// 3 : 

    Route::get('home2/{nom}/{age?}' , function($nom = 'yahya' , $age = 7) {
        return 'Bonjour '. $nom .' votre Age est ' . $age .' ans .'  ;
    });

///// or : 

    Route::get('home2/{nom}/{age?}' , function($nom = 'yahya' , $age = null) {
        if($age){
            return 'Bonjour '. $nom .' votre Age est ' . $age .' ans .'  ;
        }
        return 'Bonjour ' . $nom ;
    });

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////// 2 TP Manipulation des Controllers : 


/// Ajouter une méthode Afficher() qui récupérer les données passé en paramètre et qui retourne la vue afficher : 

    Route::get('afficher/{nom}/{age}' , [BaseController::class , 'afficher']) ;
    Route::get('/one' , [BaseController::class , 'oneMethode']) ;

/// Créer un contrôleur avec le nom InvokeController : 

    // php artisan make:controller InvokeController --invokable

/// Ajouter une route qui permet de retourner le message de la méthode invoke du Contrôleur InvokeController ? (http://127.0.0.1 :8000/oneAction) : 

    Route::get('/oneAction' , InvokeController::class) ;

/// 1)	Ajouter la route qui permet de retourner les méthodes du Contrôleur RessourceController ? (http://127.0.0.1 :8000/MaRessource)

    // php artisan make:controller RessourceController --resource

    Route::resource('/MaRessource' , RessourceController::class) ;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////// 3 TP Manipulation des Middlewares : 


    Route::view('/accuil/{age}' , 'accuil2')->middleware('age') ;
    Route::view('/contact/{nom}' , 'contact')->middleware('user') ;
    Route::view('/test/{age}/{nom}' , 'test2')->middleware('test') ;


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////// 4 TP Manipulation des Views : 


    Route::get('/calcul/{nombre}' , [GestionController::class , 'calcul']) ;
    Route::get('/moyenne/{nom}/{note}' , [GestionController::class , 'moyenne']) ;
    Route::get('/notes' , [GestionController::class , 'notes']) ;



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////// 5 TP Template Blade :


    Route::view('/HomeTemplate' , 'pages.home') ;
    Route::view('/ProduitTemplate' , 'pages.produit') ;
    Route::view('/ContactTemplate' , 'pages.contact') ;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////// 7 TP Blade Components  :

    Route::view('/dashboard' , 'pages.dashboard') ;





////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////  TP Query Builder  :


    Route::get('/QueryTest' , [FilmController::class , 'TpBuilder']) ;