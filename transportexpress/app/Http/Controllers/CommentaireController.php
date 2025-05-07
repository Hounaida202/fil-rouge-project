<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commentaire;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;


class CommentaireController extends Controller
{


//     public function afficherCommentaires($id)
// { 
//     $compte = User::findOrFail($id); 
//     $commentaires = Commentaire::where('cible_id', $id)->with('cible')->get();
//     // $count=Note::where('cible_id',$id)->count('valeur');
//     // $avg=Note::where('cible_id',$id)->avg('valeur');

//     return view('Profile', compact('commentaires'));
    
// }

public function postCommentaire(Request $request ,$id){

    Commentaire::create([
        'description'=>$request->description,
        'auteur_id'=>Auth::id(),
        'cible_id'=>$id,
    ]);
    return redirect()->back();

}

    
}