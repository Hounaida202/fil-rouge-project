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

        public function showcomptes(Request $request)
        {
            $search = $request->input('search');
            $role = $request->input('role');
            $ville = $request->input('ville');
        
            $Actifs = User::where('status', 'valide')
                          ->when($search, function ($query, $search) {
                              return $query->where('name', 'like', "%$search%");
                          })
                          ->when($role, function ($query, $role) {
                              return $query->where('role', $role);
                          })
                          ->when($ville, function ($query, $ville) {
                              return $query->where('ville', $ville);
                          })
                          ->get();
        
            return view('AdminComptes', compact('Actifs'));
        }
        
        
// public function showcomptes(Request $request)
// {
//     $search = $request->input('search');

//     $Actifs = User::where('status', 'valide')
//                   ->when($search, function ($query, $search) {
//                       return $query->where('name', 'like', "%$search%");
//                   })
//                   ->get();

//     return view('AdminComptes', compact('Actifs', 'search'));
// }

        public function ValideRole($id)
        {
            $enattente = User::find($id);
            $enattente->status = 'valide';
            $enattente->save();
            return redirect()->back();

        }
        public function InvalideRole($id)
        {
            $enattente=User::find($id);
            $enattente->status='Invalide';
            $enattente->save();
            return redirect()->back();

        }
        public function Desactiver($id)
        {
            $actif=User::find($id);
            $actif->compte='Suspendu';
            $actif->save();
            return redirect()->back();

        }
       
        public function Supprimer($id)
            {
            $actif=User::find($id);
            $actif->delete();
            return redirect()->back();

            }

      

         public function Activer($id)
            {
                $actif=User::find($id);
                $actif->compte='Actif';
                $actif->save();
                return redirect()->back();
        
        }   
        
        public function afficherlescomptes(){
         return view('AdminComptes');
        }



        public function afficherlesreclamations(){
            return view('Reclamations');
           }





    

   

}
