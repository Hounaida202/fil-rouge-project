<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatisticController;
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
    return view('Accueil');
});

Route::get('/accueil',[AccueilController::class,'show'])->name('accueil');
Route::get('/inscription',[AccueilController::class,'ShowSignupForm'])->name('inscription');
Route::get('/connexion',[AccueilController::class,'ShowLoginForm'])->name('connexion');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/message/reussite',[AccueilController::class,'showReussiteMsg'])->name('message_reussite');
Route::get('/message/invalide',[AccueilController::class,'ShowinvalideMsg'])->name('message_invalide');
Route::put('/valide/{id}', [UserController::class, 'ValideRole'])->name('Valide');
Route::put('/invalide/{id}', [UserController::class, 'InvalideRole'])->name('Invalide');
Route::put('/desactiver/{id}', [UserController::class, 'Desactiver'])->name('Desactiver');
Route::put('/activer/{id}', [UserController::class, 'Activer'])->name('activer');
Route::delete('/supprimer/{id}', [UserController::class, 'Supprimer'])->name('Supprimer');

// pour la page des comptes ******
Route::get('/admin_comptes',[UserController::class,'showcomptes'])->name('comptes');
Route::get('/detaille/{id}', [UserController::class, 'ConsulterDetailles'])->name('detailles');

// Route::get('/detaille/{id}', [CommentaireController::class, 'afficherCommentaires'])->name('detailles');

// Route::get('/dashboard', [AccueilController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [UserController::class, 'showUsers'])->name('dashboard');
// routes/web.php

// Route::get('/detaille/{id}', [CommentaireController::class, 'afficherCommentaires'])->name('profile');
// Route::get('/admin_reclamations',[AdminController::class,'afficherlesraclamations'])->name('afficherlesraclamations');
Route::get('/admin_reclamations/reclamations', [ReclamationController::class, 'afficherReclamations'])->name('reclamation');
Route::DELETE('/admin_reclamations/supression/{id}', [ReclamationController::class, 'supprimerReclamations'])->name('supression');
Route::PUT('/admin_reclamations/modification/{id}', [ReclamationController::class, 'modifierReclamations'])->name('modification');
Route::GET('/Client_PageHome', [PublicationController::class, 'afficherAllPublications'])->name('publications');
Route::GET('/formulaire', function(){
    return view('Client/Publication');
})->name('formulaire');
Route::POST('/ajouterPublication', [PublicationController::class, 'ajouterPublication'])->name('ajouterPublication');

// Route::get('/comptes', [AdminController::class, 'showcomptes'])->name('comptes');
Route::get('/statistics', [StatisticController::class, 'coutComptes'])->name('statistics');
Route::get('/preuve/{id}', [UserController::class, 'EnAttenteDetailles'])->name('preuve');

