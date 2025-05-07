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

//     public function lire($id)
// {
//     $notification = Notification::where('id', $id)
//         ->where('user_id', auth()->id())
//         ->firstOrFail();

//     $notification->is_read = true;
//     $notification->save();

//     return redirect()->back();
// }



}
