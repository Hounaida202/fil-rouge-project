<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Notification;

use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function reserver_notifier_inserer(Request $request, $id, $autre_id)
{
    // Créer la réservation
    $reservation = Reservation::create([
        'user_id' => Auth::id(),
        'publication_id' => $id,
        'localisation' => $request->localisation,
        'autre_id' => $autre_id,
    ]);

    // Générer le PDF (si nécessaire)
    $user = Auth::user();
    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    
    Notification::create([
        'auteur_id' => Auth::id(),
        'cible_id' => $autre_id,
        'publication_id' => $id, // Ou définir selon la logique de ton projet
        'reservation_id' => $reservation->id,  // Utiliser l'ID de la réservation créée
    ]);

        return $pdf->download('reservation_'.$reservation->id.'.pdf');
    }



    public function telechargerPDF($id)
{
    $reservation = Reservation::with('publication')->findOrFail($id);
    $user = auth()->user();

    // Vérifier que l'utilisateur a le droit de voir cette réservation
    if ($reservation->user_id !== $user->id && $reservation->autre_id !== $user->id) {
        abort(403, 'Accès non autorisé');
    }

    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    return $pdf->download('reservationn_' . $reservation->id . '.pdf');
}

    public static function isEnvoyer($publication_id){
        $user_id=Auth::id();
        $publication=Notification::where('publication_id', $publication_id)->where('auteur_id', $user_id)->exists(); 
        return $publication;
    }

    
}
