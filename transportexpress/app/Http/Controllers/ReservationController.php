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
    $reservation = Reservation::create([
        'user_id' => Auth::id(),
        'publication_id' => $id,
        'localisation' => $request->localisation,
        'autre_id' => $autre_id,
    ]);

    $user = Auth::user();
    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    
    Notification::create([
        'auteur_id' => Auth::id(),
        'cible_id' => $autre_id,
        'publication_id' => $id, 
        'reservation_id' => $reservation->id, 
        'type'=>"reservation"  
 
    ]);

        return $pdf->download('reservation_'.$reservation->id.'.pdf');
    }



    public function telechargerPDF($id)
{
    $reservation = Reservation::with('publication')->findOrFail($id);
    $user = auth()->user();

    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    return $pdf->download('reservationn_' . $reservation->id . '.pdf');
}
public function telechargerPDF2($id)
{
    $reservation = Reservation::with('publication')->findOrFail($id);
    $user = auth()->user();

    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    return $pdf->download('propositionn_' . $reservation->id . '.pdf');
}

   

    // public function reserver_notifier_inserer(Request $request, $id, $autre_id)
    // {
    //     $reservation = Reservation::create([
    //         'user_id' => Auth::id(),
    //         'publication_id' => $id,
    //         'localisation' => $request->localisation,
    //         'autre_id' => $autre_id,
    //     ]);
    
    //     $user = Auth::user();
    //     $pdf = Pdf::loadView('pdf.reservation', [
    //         'reservation' => $reservation,
    //         'user' => $user
    //     ]);
    
        
    //     Notification::create([
    //         'auteur_id' => Auth::id(),
    //         'cible_id' => $autre_id,
    //         'publication_id' => $id, 
    //         'reservation_id' => $reservation->id,  
    //     ]);
    
    //         return $pdf->download('reservation_'.$reservation->id.'.pdf');
    //     }

    public function reserver_notifier_inserer2(Request $request, $id, $autre_id)
{
    $reservation = Reservation::create([
        'user_id' => Auth::id(),
        'publication_id' => $id,
        'localisation' => $request->localisation,
        'autre_id' => $autre_id, 
    ]);

    $user = Auth::user();

    $pdf = Pdf::loadView('pdf.reservation', [
        'reservation' => $reservation,
        'user' => $user
    ]);

    Notification::create([
        'auteur_id' => Auth::id(),
        'cible_id' => $autre_id, 
        'publication_id' => $id,
        'reservation_id' => $reservation->id,
        'type' => "proposition"
    ]);

    return $pdf->download('proposition_' . $reservation->id . '.pdf');
}
}
