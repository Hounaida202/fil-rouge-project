<?php

namespace App\Http\Controllers;

use App\Http\DAOs\Interfaces\PublicationInterface;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\User;
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
        $data=[
            'titre' => $request->titre,
            'ville_depart' => $request->ville_depart,
            'adresse_depart' => $request->adresse_depart,
            'ville_arrivee' => $request->ville_arrivee,
            'adresse_arrivee'=>$request->adresse_arrivee,
            'date_depart'=>$request->date_depart,
            'type'=>$request->type,
            'poids'=>$request->poids,
            'description'=>$request->description,
            'image' => $request->image,
            'prix' => $request->prix,
            'localisation' => $request->localisation,
            'user_id' => $user_id,

    ];

    $this->PublicationRepository->ajouterPublication($data);
        return view('Client/Publication');
    }

    public function HistoriquesClient(){
        return view('Client/Historique');
    }

    public function afficherAllPublications(Request $request)
    {
        $data = $request->only([ 'ville_depart','type', 'etat']);

   
  
        // $data=Publication::with('user')
        // ->whereHas('user', function ($query) {
        //     $query->where('role', 'Transporteur');
        // })->get();
  
        // $data= Publication::when($data['ville_depart'] ?? null, function ($query, $ville) {
        //     return $query->where('ville_depart', $ville);
        // })
        // ->when($data['type'] ?? null, function ($query, $type) {
        //     return $query->where('type', $type);
        // })
        // ->when($data['etat'] ?? null, function ($query, $etat) {
        //     return $query->where('etat', $etat);
        // })
        // ->get();

        $filters = request()->only(['ville_depart', 'type', 'etat']); // ou récupérés d'une autre source

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

        return view('Client.Home', ['publications' => $data]);
    }
}
