<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Remarque;

class StatisticController extends Controller
{
    public function coutComptes() {
        $total = User::count();
        $enAttente = User::where('status', 'en attente')->count();
        $actives = User::where('compte', 'Actif')->count();
        $desactives = User::where('compte', 'Suspendu')->count();
        $remarques=Remarque::all();

        return view('AdminStatistiques', compact('total', 'enAttente', 'actives', 'desactives','remarques'));
    }
   
}
