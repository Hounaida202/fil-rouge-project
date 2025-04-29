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
    public function afficherAllPublications()
    {
        return Publication::with('user')->get();
    }
}