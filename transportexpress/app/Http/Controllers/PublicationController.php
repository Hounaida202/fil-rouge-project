<?php

namespace App\Http\Controllers;

use App\Http\DAOs\Interfaces\PublicationInterface;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\User;


class PublicationController extends Controller
{
        protected $PublicationRepository;
        public function __construct(PublicationInterface $PublicationRepository)
        {
            $this->PublicationRepository = $PublicationRepository;
        }
 
    public function afficherPublications($id){
        $publications=$this->PublicationRepository->afficherPublications($id);
        return view('Profile',compact('publications'));
    }
}
