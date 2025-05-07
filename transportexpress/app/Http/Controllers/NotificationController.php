<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotification(){
        $id=Auth::id();
        $notifications=Notification::where('cible_id',$id)->get();
        return view('Client/Home',compact('notifications'));
    }



public function NotifClient($id, $autre_id){
    Notification::create([
        'auteur_id' => Auth::id(),
        'cible_id' => $autre_id,
        'publication_id' => $id, 
    ]);
    return redirect()->back();
}   

}
