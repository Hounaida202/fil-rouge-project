<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function show(){
        return  view('Accueil'); 
    }
    public function inscription(){
        return  view('SignUp'); 
    }
    public function connexion(){
        return  view('LogIn'); 
    }
    public function ShowReussiteMsg()
    {
        return view('Message');
     }
     public function ShowinvalideMsg()
     {
         return view('MessageInvalide');
     }
     public function index(){
        return  view('Dashboard'); 
    }
 
}
