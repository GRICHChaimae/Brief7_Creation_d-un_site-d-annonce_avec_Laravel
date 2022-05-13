<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('log_in',[
        'log_in' => 'log_in'
    ]);
});

Route::get('/offre', function () {
    return view('offre',[
        'offre' => 'offre'
    ]);
});

Route::get('/demande', function () {
    return view('demande',[
        'demande' => 'demande'
    ]);
});

Route::get('/sign_up', function () {
    return view('sign_up',[
        'sign_up' => 'sign_up'
    ]);
});
