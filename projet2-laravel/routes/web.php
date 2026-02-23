<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\LivreController;
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

Route::get('/livres/{livre}/confirmationDelete' , [LivreController::class , 'confirmationDelete'])->name('livres.confirmationDelete') ;

Route::get('/inscription' , [AuthenController::class, 'inscrireForm'])->name('register') ;
Route::post('/inscription' , [AuthenController::class, 'inscrire'])->name('register.post') ;
Route::get('/connexion' , [AuthenController::class, 'connexionForm'])->name('login') ;
Route::post('/connexion' , [AuthenController::class, 'connexion'])->name('login.post') ;
Route::post('/logout' , [AuthenController::class, 'logout'])->name('logout') ;

Route::resource('livres' , LivreController::class)->middleware('Authen') ;