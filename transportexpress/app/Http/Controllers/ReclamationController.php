<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\User;
use App\Http\DAOs\Interfaces\ReclamationInterface;
use App\Http\DAOs\Repositories\ReclamationRepository;


class ReclamationController extends Controller
{
       protected $ReclamationRepository;
        public function __construct(ReclamationInterface $ReclamationRepository)
        {
            $this->ReclamationRepository = $ReclamationRepository;
        }

    public function afficherReclamations()
    { 
        $reclamations=$this->ReclamationRepository->afficherReclamations();

        return view('Reclamations', compact('reclamations'));

    }
    public function supprimerReclamations($id)
    { 
        $this->ReclamationRepository->afficherReclamations($id);
        return redirect()->back();

    }
    public function modifierReclamations($id)
    { 

        $reclamation=Reclamation::find($id);
                $reclamation->status='traité';
                $reclamation->save();
                return redirect()->back();

    }

    public function reclamer(Request $request, $id)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Reclamation::create([
        'titre' => $request->input('titre'),
        'description' => $request->input('description'),
        'auteur_id' => auth()->id(),
        'cible_id' => $id,
        'status' => 'en cours',
    ]);

    return redirect()->back();
}
}
