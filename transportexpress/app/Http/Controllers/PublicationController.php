<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function afficherPublications($id){
        $publications=Publication::where('user_id',$id)->get();
        return view('Profile',compact('publications'));
    }
}
