<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
use App\Models\Publication;
use App\Http\DAOs\Interfaces\PublicationInterface;

class PublicationRepository implements PublicationInterface{

    public function afficherPublications($id)
    {
        return Publication::where('user_id',$id)->with('cible')->get();
    }
    public function afficherAllPublicationspourClient()
    {   
        return Publication::with('user')
        ->whereHas('user', function ($query) {
            $query->where('role', 'Transporteur');
        })->get();   
     }
     public function afficherAllPublicationspourTransport()
    {   
        return Publication::with('user')
        ->whereHas('user', function ($query) {
            $query->where('role', 'Transporteur');
        })->get();   
     }

     public function ajouterPublication($data){
        return Publication::create($data);

     }
}