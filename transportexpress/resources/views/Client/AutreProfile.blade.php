<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100  font-sans">
<nav class="bg-[#18534F] text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <span class="font-bold text-xl">TransportExpress</span>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="" class="hover:text-blue-200">Accueil</a>
                <a href="" class="hover:text-blue-200">Services</a>
                <a href="" class="hover:text-blue-200">À propos</a>
                <a href="" class="hover:text-blue-200">Contact</a>
            </div>
            <div>
              <a href="" class="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                  </svg>
              </a>
          </div>
        </div>
    </nav>
    <section class="py-8">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-6">
           <!-- ----------un coté pour le profil et ses commenatirs ---------- -->
           <div class="md:w-1/3 w-full">
            <div>

              
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6"> 
                <!-- --------------------**** -->
                <div class="bg-[#4C956C] p-6 relative">
    <!-- Profil -->
    <div class="flex flex-col items-center">
    <div class="mb-4">
        <img src="{{$compte->image ?? 'https://www.pngitem.com/pimgs/m/52-526033_unknown-person-icon-png-transparent-png.png' }}" alt="" class="rounded-full h-24 w-24 border-4 border-white">
    </div>
    <div class="text-center">
        <h1 class="text-xl font-bold text-white mb-2">{{$compte->name}}</h1>
        <div class="text-blue-200 mb-2">{{$compte->role}}</div>
        
    </div>
    
   
</div>
</div>


<!-- --------------------**** -->
                        <div class="p-4">
                            <h2 class="text-lg font-bold mb-3 text-gray-700">Informations du compte</h2>
                            
                            <div class="space-y-3">
                                <div>
                                    <div class="text-sm text-gray-500">Email</div>
                                    <div class="font-medium">{{$compte->email}}</div>
                                </div>
                                
                                <div>
                                    <div class="text-sm text-gray-500">Téléphone</div>
                                    <div class="font-medium">{{$compte->tel}}</div>
                                </div>

                              
                                
                                <div>
                                    <div class="text-sm text-gray-500">Ville</div>
                                    <div class="font-medium">{{$compte->ville}}</div>
                                </div>
                                
                                <div>
                                    <div class="text-sm text-gray-500">Membre depuis</div>
                                    <div class="font-medium">le {{$compte->created_at}}</div>
                                </div>
                            </div>
                            <h2 class="text-lg font-bold mb-3 mt-4 text-gray-700">Statistiques</h2>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="p-2 bg-blue-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-blue-600">58</div>
                                    <div class="text-xs text-gray-600">Livraisons</div>
                                </div>
                                <div class="p-2 bg-green-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-green-600">97%</div>
                                    <div class="text-xs text-gray-600">À l'heure</div>
                                </div>
                                <div class="p-2 bg-yellow-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-yellow-600">3</div>
                                    <div class="text-xs text-gray-600">En cours</div>
                                </div>
                            </div>
                        </div>
                     
                </div>
                <!-- ----les commenatires-------- -->
                <div class="bg-white rounded-lg shadow-md p-4">
    <h2 class="text-lg font-bold mb-4 text-gray-700">Commentaires ({{$countcommentaires}})</h2>
    
    <!-- Existing comments -->
    @forelse($commentaires as $commentaire)
    <div class="mb-6 pb-6 border-b border-gray-200">
        <div class="flex items-start mb-3">
            <img src="{{ $commentaire->auteur->image ?? 'https://www.pngitem.com/pimgs/m/52-526033_unknown-person-icon-png-transparent-png.png' }}" 
                 alt="" class="rounded-full h-10 w-10 mr-3">
            <div>
                <div class="font-bold">{{ $commentaire->auteur->name ?? 'Utilisateur inconnu' }}</div>
                <div class="text-sm text-gray-500">Posté il y a {{ $commentaire->created_at->diffForHumans() }}</div>
            </div>
        </div>
        <p class="text-gray-700">
            {{ $commentaire->description }}
        </p>
    </div>
    @empty
    <p class="text-gray-500">Aucun commentaire pour cet utilisateur.</p>
    @endforelse

    <!-- Simple Facebook-like comment form -->
    <form action="{{route('postCommentaire',$compte->id)}}" method="POST" class="mt-4 flex items-center">
        @csrf
        <!-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> -->
        <div class="flex-grow relative">
            <input type="text" 
                   name="description" 
                   class="w-full pl-10 pr-16 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-1 focus:ring-blue-500" 
                   placeholder="Écrire un commentaire..." 
                   required>
        </div>
        <button type="submit" 
                class="ml-2 px-3 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
        </button>
    </form>
</div>
                 <!-- -------- -->
            </div>
            </div>
           <!-- -------------------------------------------------------------- -->
           <div class="md:w-2/3 w-full">
            <div>
                <div class="bg-white rounded-lg shadow-md p-6">
                   <h2 class="text-xl font-bold mb-6 text-gray-700">Publications récentes</h2>
                   @foreach($publications as $publication)
                     <div class="mb-8 pb-6 border-b border-gray-200">
                          <!-- les infos de compte auteur et temps -->
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="" alt="Photo de profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <a href="" class="font-semibold text-blue-600 hover:underline"></a>
                                    <p class="text-gray-500 text-sm">Transporteur • Publié il y a 2 heures</p>
                                </div>
                            </div>
                              <h2 class="text-xl font-bold mb-4">Transport de meubles Paris-Lyon</h2>
                              <div class="mb-4">
                                <div>
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville de départ :</span>
                                            <span>Paris</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Adresse départ :</span>
                                            <span>15 Rue de la République, 75001</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville d'arrivée :</span>
                                            <span>Lyon</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Adresse arrivée :</span>
                                            <span>8 Place Bellecour, 69002</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Date de départ :</span>
                                            <span>15/04/2025</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Type de marchandise :</span>
                                            <span>Meubles</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Poids estimé :</span>
                                            <span>350 kg</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Capacité :</span>
                                            <span>800 kg disponible</span>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="mb-6">
                                <h3 class="font-medium mb-2">Description :</h3>
                                <p class="text-gray-600">
                                    {{$publication->description}}
                                </p>
                            </div>
                            <div class="mb-6">
                                <img src="" alt="" class="w-full h-auto object-cover rounded-md">
                            </div>
                     </div>
                     @endforeach
                </div>
            </div>
            </div>
          <!-- ------la fin de partie des publications---- -->

        </div>
      </div>
    </section>


</body>
</html>