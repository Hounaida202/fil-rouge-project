<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function show(){
        return  view('Accueil'); 
    }
    public function ShowSignupForm(){
        return  view('SignUp'); 
    }
    public function ShowLoginForm(){
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
     public function ShowEncoursMsg()
     {
         return view('MessageEncours');
     }
     public function ShowStatisticsPage()
     {
         return view('AdminStatistiques');
     }
    
}
