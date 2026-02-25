<?php

use Illuminate\Support\Facades\Mail;
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

Route::get('/test-mail', function () {
    Mail::raw('Test email Laravel', function ($message) {
        $message->to('oussamatkitak8@gmail.com')
                ->subject('Test Mail');
    });

    return 'Email sent successfully!';
});
