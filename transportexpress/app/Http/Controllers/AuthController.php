<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use App\DAOs\AuthInterface;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request as FacadesRequest;
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
                $data=[
                        'name' => $request->name,
                        'email' => $request->email,
                        'tel' => $request->tel,
                        'ville' => $request->ville,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
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
    
    
    
// return redirect()->route('SignUp');
// auth()->login($user);

// ------------------------------------------------

    public function showLoginForm(){
       return view('index');
    }
    public function messages()
{
    return [
        'email.exists' => 'Cet email n existe pas.', 
        'password.confirmed' => 'Les mots de passe est incorecte.',
    ];
}

    public function login(Request $request){

        // dd($request);
        // exit;
      //chercher le user si existe
    
    $email = $request->email;
    $password = $request->password;
    
    $user=$this->AuthRepository->login($email);
    // dd($user);
    
 //la clareté , ce que ma rendu voire les chose bizzare ,  calvère, 
    //comparer le mot de passe
    if($user && !Hash::check($password, $user->password)){
         
    }
    if($user && Hash::check($password, $user->password)){
        //   creer la session
        if($user->status == "en attente"){
            return back()->with('error', 'Votre compte est en cours de traitement.');
        }
        if($user->status == "valide"){
            return redirect()->route('message_invalide');
        }
        if ($user->status == "invalide") {
            
            if ($user->role = 'admin') {
                Auth()->login($user);
                return redirect()->route('dashboard');
            }
        }                    
      }
    }








//     public function login(Request $request){
//             $isvalid = $request->validate([
//             'email' => ['required', 'email'],
//             'password' => ['required'],
//         ]);

//         $user = User::where('email', $isvalid['email'])->first();

//         if ($user && Hash::check($isvalid['password'], $user->password)) {

//             auth()->login($user);


//             if ($user->role == 'tourist') {  
//                 return redirect()->route('tourist');  
//             } 
//             if ($user->role == 'proprietaire') {  
//                 return redirect()->route('proprietaire');  
//             }
//         }
//         return back()->withErrors(['email' => 'Identifiants incorrects'])->withInput();
//    }

}
