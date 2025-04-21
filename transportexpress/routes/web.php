<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\PublicationController;


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

// Route::get('/accueil',[AccueilController::class,'show'])->name('accueil');
// Route::get('/inscriptionn',[AccueilController::class,'inscription'])->name('inscription');
// Route::get('/connexion',[AccueilController::class,'connexion'])->name('connexion');
// Route::get('/message/reussite',[AccueilController::class,'showReussiteMsg'])->name('message_reussite');
// Route::get('/message/invalide',[AccueilController::class,'ShowinvalideMsg'])->name('message_invalide');
// Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', [AdminController::class, 'show'])->name('dashboard');
// routes/web.php
// Route::put('/valide/{id}', [AdminController::class, 'ValideRole'])->name('Valide');
// Route::put('/invalide/{id}', [AdminController::class, 'InvalideRole'])->name('Invalide');
// Route::put('/desactiver/{id}', [AdminController::class, 'Desactiver'])->name('Desactiver');
// Route::put('/activer/{id}', [AdminController::class, 'Activer'])->name('activer');

// Route::delete('/supprimer/{id}', [AdminController::class, 'Supprimer'])->name('Supprimer');
// Route::get('/detaille/{id}', [CommentaireController::class, 'afficherCommentaires'])->name('profile');
// Route::get('/admin_comptes',[AdminController::class,'showcomptes'])->name('comptes');
// Route::get('/admin_reclamations',[AdminController::class,'afficherlesraclamations'])->name('afficherlesraclamations');
Route::get('/admin_reclamations/reclamations', [ReclamationController::class, 'afficherReclamations'])->name('reclamation');
Route::DELETE('/admin_reclamations/supression/{id}', [ReclamationController::class, 'supprimerReclamations'])->name('supression');
Route::PUT('/admin_reclamations/modification/{id}', [ReclamationController::class, 'modifierReclamations'])->name('modification');
// Route::GET('/detaille/pub/{id}', [PublicationController::class, 'afficherPublications'])->name('pub');

// Route::get('/comptes', [AdminController::class, 'showcomptes'])->name('comptes');
