<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use App\Http\DAOs\Interfaces\AuthInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // ------------------------------------------------

// ~~~~~~~~~~~~
    protected $AuthRepository;


    public function __construct(AuthInterface $AuthRepository)
    {
        $this->AuthRepository = $AuthRepository;
    }


                public function register(SignupRequest $request)
            {   
                $path=null;
                if($request->hasFile('preuve')){
                    $path=$request->file('preuve')->store('preuves','public');
                }
                if($request->hasFile('image')){
                    $img=$request->file('image')->store('images','public');
                }
                $data=[
                        'name' => $request->name,
                        'email' => $request->email,
                        'tel' => $request->tel,
                        'ville' => $request->ville,
                        'image'=>$img,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        'preuve'=>$path,
                ];

                $this->AuthRepository->register($data);

                return redirect()->route('message_reussite');
            }



            public function ShowReussiteMsg()
            {
                return view('Message');
            }
            public function ShowinvalideMsg()
            {
                return view('MessageInvalide');
            }
    


    public function login(Request $request){

      //--- chercher le user si existe
    
    $email = $request->email;
    $password = $request->password;
    
    $user=$this->AuthRepository->login($email);

    if (!$user) {
        return back()->withErrors(['email' => 'Email non trouvé'])->withInput();
    }
    if($user && !Hash::check($password, $user->password)){
        return back()->withErrors(['password' => 'le mot de passe incorrect'])->withInput();

    }
    if($user && Hash::check($password, $user->password)){
        //   creer la session
        if($user->status == "en attente"){
            return redirect()->route('message_encours');
        }
        if($user->status == "invalide"){
            return redirect()->route('message_invalide');
        }
        if ($user->status == "valide") {
            
            if ($user->role == 'admin') {
                Auth()->login($user);
                return redirect()->route('dashboard');
            }
            
            else {
                Auth()->login($user);
                return redirect()->route('filtrerPublications');
            }

        }                    
      }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('connexion'); 
    }
}
