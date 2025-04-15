<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentaireController;


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
// Route::get('/dashboard/attente', [AdminController::class, 'showattente'])->name('showattente');
// Route::get('/dashboard/actif', [AdminController::class, 'showactif'])->name('showactif');
Route::get('/dashboard', [AdminController::class, 'show'])->name('dashboard');
// routes/web.php
Route::put('/valide/{id}', [AdminController::class, 'ValideRole'])->name('Valide');
Route::put('/invalide/{id}', [AdminController::class, 'InvalideRole'])->name('Invalide');
Route::put('/desactiver/{id}', [AdminController::class, 'Desactiver'])->name('Desactiver');
Route::put('/activer/{id}', [AdminController::class, 'Activer'])->name('activer');

Route::delete('/supprimer/{id}', [AdminController::class, 'Supprimer'])->name('Supprimer');
Route::get('/detaille/{id}', [CommentaireController::class, 'afficherCommentaires'])->name('profile');
