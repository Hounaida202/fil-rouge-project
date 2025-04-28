<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
use App\Models\Commentaire;
use App\Http\DAOs\Interfaces\CommentaireInterface;

class CommentaireRepository implements CommentaireInterface{

    public function afficherCommentaires($id)
    {
        return  Commentaire::where('cible_id', $id)->with('cible')->get();
    }
    public function count($id)
    {
        return Commentaire::where('cible_id', $id)->count();
    }

}