<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('sign_up', [RegisterController::class, 'index'])->name('register');
Route::post('sign_up', [RegisterController::class, 'store']);

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');


Route::get('offre', [OfferController::class, 'index'])->name('offer');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'check']);




Route::get('/demande', function () {
    return view('demande',[
        'demande' => 'demande'
    ]);
});

