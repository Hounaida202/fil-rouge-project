<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;


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
    return view('welcome');
});

Route::get('/accueil',[AccueilController::class,'show'])->name('accueil');
Route::get('/inscriptionn',[AccueilController::class,'inscription'])->name('inscription');
Route::get('/connexion',[AccueilController::class,'connexion'])->name('connexion');
Route::get('/message/reussite',[AccueilController::class,'showReussiteMsg'])->name('message_reussite');
Route::get('/message/invalide',[AccueilController::class,'ShowinvalideMsg'])->name('message_invalide');
Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');

