<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commentaire;


class CommentaireController extends Controller
{


    public function afficherCommentaires($id)
{ 
    $commentaires = Commentaire::where('cible_id', $id)->with('cible')->get();
    $compte = User::findOrFail($id); 

    return view('Profile', compact('commentaires', 'compte'));
    
}

    
}