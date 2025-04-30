<?php

namespace App\Http\Controllers;
use App\Models\Favoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavorisController extends Controller
{
    public function ajouterAuxFavoris($publication_id){
        $user_id=Auth::id();
        Favoris::create([
            'user_id'=>$user_id,
            'publication_id'=>$publication_id,
          ]);
          
    }
}
