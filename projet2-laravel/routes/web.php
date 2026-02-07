<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

// // Home page for authenticated users
// Route::get('/home', function () {
//     return view('home');
// })->name('home')->middleware('auth');

// // Show login form and allow POST login
// // Route::view('/login', 'auth.login')->name('login');


// // Show register form and handle registration POST
// Route::view('/register', 'auth.register')->name('register');
// Route::post('/register', [AuthController::class, 'register']); // Si tu as ajouté la méthode register

// // Routes Protégées (Besoin du cookie)
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });