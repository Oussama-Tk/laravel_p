<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StagaireController;
use App\Models\Stagaire;
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


Route::get('/commandes/search' , [CommandeController::class , 'search'])->name('commandes.search') ;
Route::resource('commandes' , CommandeController::class) ;
Route::resource('produits' , ProduitController::class) ;
Route::post('/commandes/{commande}/ajouter-produit',[CommandeController::class , 'ajouter_produits'])->name('commandes.ajouterProduit');