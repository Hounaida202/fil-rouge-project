<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;


class NoteController extends Controller
{
    public function afficherCommentaires($id)
    { 
        $notes = Note::where('cible_id', $id)->with('cible')->get();
        $compte = User::findOrFail($id); 
    
        return view('Profile', compact('notes', 'compte'));
        
    }
    public function compter($id){
        $count=Note::where('cible_id',$id)->count('valeur');
        return view('Profile', $count);
    }

}
