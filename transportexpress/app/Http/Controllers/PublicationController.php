<?php

namespace App\Http\Controllers;

use App\Http\DAOs\Interfaces\PublicationInterface;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Notification;
use App\Models\Commentaire;
use App\Models\User;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
        protected $PublicationRepository;
        public function __construct(PublicationInterface $PublicationRepository)
        {
            $this->PublicationRepository = $PublicationRepository;
        }
 
    public function afficherPublications($id){
        $publications=$this->PublicationRepository->afficherPublications($id);
        return view('Profile',compact('publications'));
    }

    // public function afficherAllPublications(){
    //     $publications=$this->PublicationRepository->afficherAllPublications();
    //         return view('Client/Home',compact('publications'));
    // }
    public function ajouterPublication(Request $request){
        $user_id = Auth::id();
        $path=null;
                if($request->hasFile('image')){
                    $path=$request->file('image')->store('publications','public');
                }
                
        $data=[
            'titre' => $request->titre,
            'ville_depart' => $request->ville_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'date_depart'=>$request->date_depart,
            'type'=>$request->type,
            'poids'=>$request->poids,
            'description'=>$request->description,
            'image' => $path,
            'prix' => $request->prix,
            'user_id' => $user_id,

    ];

    $this->PublicationRepository->ajouterPublication($data);
        return view('Client/Publication');
    }

    public function HistoriquesClient(){

        $id=Auth::id();
        $publications=Publication::where('user_id',$id)->get();
        $commentaires=Commentaire::where('auteur_id',$id)->get();
        $reservations=Reservation::where('user_id',$id)->get();

        return view('Client/Historique',compact('publications','commentaires','reservations'));
    }

    public function afficherAllPublications(Request $request)
    {
        $data = $request->only([ 'ville_depart','type', 'etat']);
        $filters = request()->only(['ville_depart', 'type', 'etat']);
        $user=Auth::user();
       if($user->role=='Client'){
           $data = Publication::with('user')
       ->whereHas('user', function ($query) {
           $query->where('role', 'Transporteur');
       })
       ->when($filters['ville_depart'] ?? null, function ($query, $ville) {
           return $query->where('ville_depart', $ville);
       })
       ->when($filters['type'] ?? null, function ($query, $type) {
           return $query->where('type', $type);
       })
       ->when($filters['etat'] ?? null, function ($query, $etat) {
           return $query->where('etat', $etat);
       })
       ->get();
       }
       if($user->role=='Transporteur'){
        $data = Publication::with('user')
        ->whereHas('user', function ($query) {
            $query->where('role', 'Client');
        })
        ->when($filters['ville_depart'] ?? null, function ($query, $ville) {
            return $query->where('ville_depart', $ville);
        })
        ->when($filters['type'] ?? null, function ($query, $type) {
            return $query->where('type', $type);
        })
        ->when($filters['etat'] ?? null, function ($query, $etat) {
            return $query->where('etat', $etat);
        })
        ->get();
       }

       
        $id=Auth::id();
        $notifications=Notification::where('cible_id',$id)->get();

       $countNotif=Notification::where('cible_id', $id)
       ->where('is_read', false)
       ->count();


       return view('Client/Home', [
        'publications' => $data,
        'notifications' => $notifications,
        'countNotif' => $countNotif
    ]);    }

    public static function siExiste($publication_id)
        {   $user_id=Auth::id();
            $publication=Reservation::where('publication_id', $publication_id)->where('user_id', $user_id)->exists(); 
            return $publication;
        }

   
    public function PublicationReserver($reservation_id, $notification_id = null)
{
    if ($notification_id) {
        $notification = Notification::where('id', $notification_id)
            ->where('cible_id', auth()->id())
            ->first();

        if ($notification && !$notification->is_read) {
            $notification->is_read = true;
            $notification->save();
        }
    }

    $reservation = Reservation::findOrFail($reservation_id);

    return view('Client/PubReservé', compact('reservation'));
}  

// public function PublicationProposer( $notification_id ,$auteur_id )
// {
//     $notification=Notification::findOrFail($notification_id);
//     $auteur=Notification::findOrFail($auteur_id);

//     if ($notification_id) {
//         $notification = Notification::where('id', $notification_id)
//             ->where('cible_id', auth()->id())
//             ->first();

//         if ($notification && !$notification->is_read) {
//             $notification->is_read = true;
//             $notification->save();
//         }
//     }
//     return view('Client/PubProposition',compact('notification','auteur'));
// }
public function PublicationProposer($notification_id, $transport_id)
{
    $notification = Notification::where('id', $notification_id)
        ->where('cible_id', auth()->id())
        ->firstOrFail();

    if (!$notification->is_read) {
        $notification->is_read = true;
        $notification->save();
    }

    $auteur = User::findOrFail($transport_id);

    return view('Client/PubProposition', compact('notification', 'auteur'));
}

public function supprimerPub($id)
{
    $publication = Publication::findOrFail($id);
    $publication->delete();
        return redirect()->back();
}


}
