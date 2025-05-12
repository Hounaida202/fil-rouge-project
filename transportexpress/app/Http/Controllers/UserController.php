<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\DAOs\Interfaces\UserInterface;
use App\Http\DAOs\Interfaces\CommentaireInterface;
// use App\Http\DAOs\Interfaces\NoteInterface;
use App\Http\DAOs\Interfaces\PublicationInterface;
use App\Models\Publication;
use App\Models\User;
use App\Models\Remarque;
use App\Models\Reservation;

class UserController extends Controller
{
         protected $UserRepository;
         protected $CommentaireRepository;
         protected $NoteRepository;
         protected $PublicationRepository;


        public function __construct(UserInterface $UserRepository ,CommentaireInterface $CommentaireRepository ,PublicationInterface $PublicationRepository)
        {
            $this->UserRepository = $UserRepository;
            $this->CommentaireRepository = $CommentaireRepository;
            $this->PublicationRepository = $PublicationRepository;

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
            return redirect('dashboard');
        }
        public function InvalideRole($id)
        {
            $enattente = $this->UserRepository->invaliderCompte($id);
            $enattente->status='invalide';
            $enattente->save();
            return redirect('dashboard');
        }
        public function Desactiver(Request $request,$id)
        {
            Remarque::create([
                'titre' => $request->input('titre'), 
                'description' => $request->input('description'), 
            ]);
            $actif=$this->UserRepository->DesactiverCompte($id);
            $actif->compte='Suspendu';
            $actif->save();
            return redirect()->back();
        }
        
        public function Activer($id)
        {
            $actif=$this->UserRepository->ActiverCompte($id);
            $actif->compte='Actif';
            $actif->save();
            return redirect()->back();
        } 

            public function Supprimer(Request $request,$id)
            {
                Remarque::create([
                    'titre' => $request->input('titre'), 
                    'description' => $request->input('description'), 
                ]);
            $this->UserRepository->SupprimerCompte($id);
            return redirect()->route('dashboard');

            }

            // ------dans les comptes a afficher chez l admin

            public function showcomptes(Request $request)
            {
                $data = $request->only(['search', 'role', 'ville']);
                $Actifs = $this->UserRepository->ShowComptes($data);

                return view('AdminComptes', compact('Actifs'));
            }

            public function ConsulterDetailles($id){
                $compte=User::find($id);
                $commentaires=$this->CommentaireRepository->afficherCommentaires($id);
                $countcommentaires=$this->CommentaireRepository->count($id);
                $publications=$this->PublicationRepository->afficherPublications($id);
                $countpub=Publication::where('user_id',$id)->count();
                $countreservation=Reservation::where('user_id',$id)->count();

                return view('Profile', compact('compte','commentaires','countcommentaires','publications','countpub','countreservation'));

            }
           
            public function EnAttenteDetailles($id){
                $enAttente=User::find($id);
                return view('EnAttenteDetailles',compact('enAttente'));
            }
            public function AutreProfile($id){
                $compte=User::find($id);
                $commentaires=$this->CommentaireRepository->afficherCommentaires($id);
                $countcommentaires=$this->CommentaireRepository->count($id);

                $publications=$this->PublicationRepository->afficherPublications($id);
                return view('Client/AutreProfile',compact('compte','commentaires','countcommentaires','publications'));
            }
            
}
