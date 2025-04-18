<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAOs\AdminInterface;
use App\DAOs\AdminRepository;
use App\Models\User;

class AdminController extends Controller
{

    // protected $AdminRepository;



    //     public function __construct(AdminInterface $AdminRepository)
    //     {
    //         $this->AdminRepository = $AdminRepository;
    //     }


        public function show(Request $request)
        {
            $perPage = $request->input('per_page', 3);
            $enAttentes = User::where('status', 'en attente')->paginate($perPage);
            $Actifs = User::where('status', 'valide')->paginate($perPage);
            
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

        public function ShowCompteDetaille($id){

            $compte = User::find($id); 
            return view('Profile', compact('compte')); 
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
