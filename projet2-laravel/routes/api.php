<?php

use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// --- Routes Publiques (Tout le monde peut y accéder) ---
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// --- Routes Protégées (Il faut un Token valide) ---
// Le middleware 'auth:sanctum' fait office de vigile
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Exemple d'autre route protégée
    Route::get('/profile', [AuthController::class, 'profile']) ;
    
});