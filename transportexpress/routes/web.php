<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\NotificationController;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

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
Route::get('/message/encours',[AccueilController::class,'showENcoursMsg'])->name('message_encours');
Route::get('/message/invalide',[AccueilController::class,'ShowinvalideMsg'])->name('message_invalide');
Route::put('/valide/{id}', [UserController::class, 'ValideRole'])->name('Valide');
Route::put('/invalide/{id}', [UserController::class, 'InvalideRole'])->name('Invalide');
Route::put('/desactiver/{id}', [UserController::class, 'Desactiver'])->name('Desactiver');
Route::put('/activer/{id}', [UserController::class, 'Activer'])->name('activer');
Route::delete('/supprimer/{id}', [UserController::class, 'Supprimer'])->name('Supprimer');

// pour la page des comptes ******
Route::get('/admin_comptes',[UserController::class,'showcomptes'])->name('comptes');
Route::get('/detaille/{id}', [UserController::class, 'ConsulterDetailles'])->name('detailles');
Route::get('/dashboard', [UserController::class, 'showUsers'])->name('dashboard');
Route::get('/admin_reclamations/reclamations', [ReclamationController::class, 'afficherReclamations'])->name('reclamation');
Route::DELETE('/admin_reclamations/supression/{id}', [ReclamationController::class, 'supprimerReclamations'])->name('supression');
Route::PUT('/admin_reclamations/modification/{id}', [ReclamationController::class, 'modifierReclamations'])->name('modification');
Route::GET('/Client_PageHome', [PublicationController::class, 'afficherAllPublications'])->name('filtrerPublications');
Route::GET('/formulaire', function(){
    return view('Client/Publication');
})->name('formulaire');

Route::POST('/ajouterPublication', [PublicationController::class, 'ajouterPublication'])->name('ajouterPublication');
Route::get('/HistoriquesClient', [PublicationController::class, 'HistoriquesClient'])->name('HistoriquesClient');
Route::get('/statistics', [StatisticController::class, 'coutComptes'])->name('statistics');
Route::get('/preuve/{id}', [UserController::class, 'EnAttenteDetailles'])->name('preuve');
Route::POST('/ajouterFavoris/{id}', [FavorisController::class, 'ajouterAuxFavoris'])->name('ajouterFavoris');
Route::delete('/retirerFavoris/{id}', [FavorisController::class, 'retirerFavoris'])->name('retirerFavoris');
Route::get('/siExiste/{id}', [FavorisController::class, 'siExiste'])->name('siExiste');
Route::get('/afficherFavoris', [FavorisController::class, 'afficherFavoris'])->name('afficherFavoris');
Route::get('/autreprofile/{id}', [UserController::class, 'AutreProfile'])->name('autreprofile');
Route::POST('/postCommentaire/{id}', [CommentaireController::class, 'postCommentaire'])->name('postCommentaire');
Route::post('/notes', [NoteController::class, 'storeOrUpdate'])->name('note.store')->middleware('auth');
Route::post('/reserver/{id}/{autre_id}', [ReservationController::class, 'reserver_notifier_inserer'])->name('reserver');
Route::get('/siExiste/{id}', [ReservationController::class, 'siExiste'])->name('siExiste');
Route::get('/isEnvoyer/{id}', [NotificationController::class, 'isEnvoyer'])->name('isEnvoyer');
Route::post('/reserver2/{id}/{autre_id}', [ReservationController::class, 'reserver_notifier_inserer2'])->name('reserver2');
Route::get('/pubreserver/{reservation_id}/{notification_id}', [PublicationController::class, 'PublicationReserver'])->name('pubreserver');
Route::get('/reservationn/{id}/pdf', [ReservationController::class, 'telechargerPDF'])->name('reservationn.telecharger_pdf');
Route::post('/proposition/{id}/{autre_id}', [NotificationController::class, 'NotifClient'])->name('proposition');
Route::get('/pubproposer/{notification_id}/{transport_id}', [PublicationController::class, 'PublicationProposer'])->name('pubproposer');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/reserver/{id}/{autre_id}', [ReservationController::class, 'reserver_notifier_inserer'])->name('reserver');
Route::delete('/supprimerpub/{id}', [PublicationController::class, 'supprimerPub'])->name('supprimerpub');
Route::delete('/supprimercomment/{id}', [CommentaireController::class, 'supprimerComment'])->name('supprimercomment');
Route::post('/reclamer/{id}', [ReclamationController::class, 'reclamer'])->name('reclamer');
