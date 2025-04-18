<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commentaire;
use App\Models\Note;


class CommentaireController extends Controller
{


    public function afficherCommentaires($id)
{ 
    $commentaires = Commentaire::where('cible_id', $id)->with('cible')->get();
    $compte = User::findOrFail($id); 
    $count=Note::where('cible_id',$id)->count('valeur');
    $avg=Note::where('cible_id',$id)->avg('valeur');

    return view('Profile', compact('commentaires', 'compte', 'count','avg'));
    
}

    
}