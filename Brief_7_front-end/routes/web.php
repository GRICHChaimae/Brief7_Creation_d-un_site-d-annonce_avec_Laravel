<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OfferController;

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

Route::get('offre', [OfferController::class, 'index'])->name('offer');

Route::get('/', [RegisterController::class, 'index'])->name('login');
Route::post('/', [RegisterController::class, 'check']);

// Route::get('/', function () {
//     return view('log_in',[ 
//         'log_in' => 'log_in'
//     ]);
// });

// Route::get('/offre', function () {
//     return view('offre',[
//         'offre' => 'offre'
//     ]);
// });

Route::get('/demande', function () {
    return view('demande',[
        'demande' => 'demande'
    ]);
});

