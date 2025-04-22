<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\DAOs\Interfaces\UserInterface;
use App\Http\DAOs\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
         protected $UserRepository;

        public function __construct(UserInterface $UserRepository)
        {
            $this->UserRepository = $UserRepository;
        }

        public function showUsers(Request $request)
        {
            $perPage = $request->input('per_page', 3);
            $enAttentes = $this->UserRepository->showEnAttente($perPage);
            $Actifs = $this->UserRepository->showActifs($perPage);
            return view('Dashboard', compact('enAttentes', 'Actifs'));
        }
        public function ValideRole($id)
        {
            $enattente = $this->UserRepository->validerCompte($id);
            $enattente->status = 'valide';
            $enattente->save();
            return redirect()->back();
        }
        public function InvalideRole($id)
        {
            $enattente = $this->UserRepository->invaliderCompte($id);
            $enattente->status='Invalide';
            $enattente->save();
            return redirect()->back();
        }
}
