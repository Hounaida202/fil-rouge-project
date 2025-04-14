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

}
