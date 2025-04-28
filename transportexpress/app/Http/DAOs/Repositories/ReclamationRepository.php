<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
use App\Models\User;
use App\Http\DAOs\Interfaces\ReclamationInterface;
use App\Models\Reclamation;

class ReclamationRepository implements ReclamationInterface{

    public function afficherReclamations()
    {
        return Reclamation::All();
    }
    public function supprimerReclamations($id){
        $reclamation=Reclamation::find($id);
        $reclamation->delete();
        return $reclamation;
    }
    public function modifierReclamations($id){

    }
}