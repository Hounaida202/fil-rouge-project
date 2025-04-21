<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\User;


class PublicationController extends Controller
{
 
    public function afficherPublications($id){
        $compte = User::find($id);
        $publications=Publication::where('user_id',$id)->get();
        return view('Profile',compact('publications','compte'));
    }
}
