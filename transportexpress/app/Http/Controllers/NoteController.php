<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;


class NoteController extends Controller
{
    // public function afficherCommentaires($id)
    // { 
    //     // $notes = Note::where('cible_id', $id)->with('cible')->get();
    //     $compte = User::findOrFail($id); 
    //     $count=Note::where('cible_id',$id)->count('valeur');

    //     return view('Profile', compact('notes', 'compte'));
        
    // }
    

    // public function storeOrUpdate(Request $request)
    // {
    //     $request->validate([
    //         'valeur' => 'required|integer|min:1|max:10',
    //     ]);
    
    //     $user = auth()->user();
    
    //     // Cherche une note existante de cet auteur vers cette cible
    //     $note = Note::firstOrNew([
    //         'auteur_id' => $user->id,
    //         'cible_id' => $request->cible_id,
    //     ]);
    
    //     $note->valeur = $request->valeur;
    //     $note->save();
    
    //     return back()->with('success', 'Note enregistrée.');
    // }
    

}
