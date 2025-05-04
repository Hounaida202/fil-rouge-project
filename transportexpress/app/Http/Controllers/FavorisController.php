<?php
namespace App\Http\Controllers;
use App\Models\Favoris;
use App\Models\Publication;

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
          return redirect()->back();
        }

        public static function siExiste($publication_id)
        {   $user_id=Auth::id();
            $favoris=Favoris::where('publication_id', $publication_id)->where('user_id', $user_id)->exists(); 
            return $favoris;
        }
        public function afficherFavoris(){
            $user_id=Auth::id();
            $mesFavoris=Favoris::with('publication.user')
            ->where('user_id', $user_id)
            ->get();
            return view('Client/Favoris',compact('mesFavoris'));
        }
}
