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

    public function afficherAllPublications(){
        $publications=$this->PublicationRepository->afficherAllPublications();
            return view('Client/Home',compact('publications'));
        
    }
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
}
