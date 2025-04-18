<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\User;

class ReclamationController extends Controller
{
    public function afficherReclamations()
    { 
        $reclamations=Reclamation::all();
    
        return view('Reclamations', compact('reclamations'));

    }
    public function supprimerReclamations($id)
    { 
        $reclamation=Reclamation::find($id);
        $reclamation->delete();

        return redirect()->back();

    }
    public function modifierReclamations($id)
    { 

        $reclamation=Reclamation::find($id);
                $reclamation->status='traité';
                $reclamation->save();
                return redirect()->back();

    }
}
