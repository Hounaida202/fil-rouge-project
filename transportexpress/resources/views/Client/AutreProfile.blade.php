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
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center w-full md:w-auto justify-between">
                <span class="font-bold text-xl">TransportExpress</span>
                <button id="menuButton" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            <div id="mobileMenu" class="hidden md:flex flex-col md:flex-row w-full md:w-auto space-y-3 md:space-y-0 md:space-x-6 mt-4 md:mt-0">
                <a href="{{route('filtrerPublications')}}" class="hover:text-blue-200 font-medium block">Home</a>
                <a href="{{route('HistoriquesClient')}}" class="hover:text-blue-200 font-medium block">Historique</a>
                <a href="{{route('afficherFavoris')}}" class="hover:text-blue-200 font-medium block">Favoris</a>
            </div>
            <div  class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-8 h-8  rounded-full ">
                <form action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <i class="fas fa-power-off" style="font-size: 20px; color: #333;"></i>
                    </button>
                </form>
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
                <button onclick="openModalDesactivation('{{ $compte->id }}')" class="desactive-btn text-white hover:text-yellow-400" title="Ajouter une réclamation">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2a10 10 0 1010 10A10.01142 10.01142 0 0012 2zm5.65685 14.14214L7.85786 6.34315a8 8 0 0110.79899 10.79899zM6.34315 7.85786l9.79899 9.79899a8 8 0 01-10.79899-10.79899z"/>
                                    </svg>
                                </button>
    <!-- Profil -->
                <div class="flex flex-col items-center">
                <div class="mb-4">
                    <img src="{{asset('storage/'.$compte->image)}}" alt="" class="rounded-full h-24 w-24 border-4 border-white">
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
                            
                        </div>
                     
                </div>
                <!-- ----les commenatires-------- -->
                <div class="bg-white rounded-lg shadow-md p-4">
    <h2 class="text-lg font-bold mb-4 text-gray-700">Commentaires ({{$countcommentaires}})</h2>
    @forelse($commentaires as $commentaire)
    <div class="mb-6 pb-6 border-b border-gray-200">
        <div class="flex items-start mb-3">
            <img src="{{asset('storage/'.$commentaire->auteur->image)}}" 
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

    <form action="{{route('postCommentaire',$compte->id)}}" method="POST" class="mt-4 flex items-center">
        @csrf
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
                   @forelse($publications as $publication)
                            <div class="mb-8 pb-6 border-b border-gray-200">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                        <img src="{{asset('storage/'.$publication->user->image)}}" alt="Photo de profil" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div class="font-semibold ">{{$compte->name}}</div>
                                        <p class="text-gray-500 text-sm">Transporteur • Publié il y a 2 heures</p>
                                    </div>
                                </div>
                                <h2 class="text-xl font-bold mb-4">Transport de meubles {{$publication->ville_depart}}-{{$publication->ville_arrivee}}</h2>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville de départ : </span>
                                            <span>{{$publication->ville_depart}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville d'arrivée : </span>
                                            <span>{{$publication->ville_arrivee}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Date de départ : </span>
                                            <span>{{$publication->date_depart}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Catégorie : </span>
                                            <span>{{$publication->type}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Poids maximum : </span>
                                            <span>{{$publication->poids}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-4">
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Prix : </span>
                                            <span>{{$publication->prix}} DH</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="mb-6">
                                    <h3 class="font-medium mb-2">Description :</h3>
                                    <p class="text-gray-600">{{$publication->description}}</p>
                                </div>
                                @if($publication->image!=null)
                                <div class="mb-6">
                                    <img src="{{$publication->image}}" alt="" class="w-full h-auto object-cover rounded-md">
                                </div>
                                @endif
                            </div>
                            @empty
                            <p class="text-gray-500">Aucun publication pour cet utilisateur.</p>
                            @endforelse
                        </div>
                </div>
            </div>
            </div>
          <!-- ------la fin de partie des publications---- -->

        </div>
      </div>
    </section>
    <div id="desactivation-{{ $compte->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50 transition-opacity duration-300" style="display:none;">
    <div class="modal-content bg-white rounded-xl shadow-2xl p-6 w-[600px] mx-auto border-l-4 border-red-600">
        <div class="flex items-center justify-center mb-4">
            <h2 class="text-xl font-bold text-red-700">Soumettre une réclamation</h2>
        </div>

        <p class="text-center font-medium text-base text-gray-700 mb-4">
            Merci d'indiquer les informations concernant votre réclamation :
        </p>

        <form action="/reclamer/{{ $compte->id }}" method="POST">
            @csrf
            

            <div class="mb-4">
                <input name="titre" type="text" class="w-full px-4 py-2 text-gray-800 border border-red-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Titre de la réclamation">
            </div>
            <div class="mb-4">
                <textarea name="description" rows="4" class="w-full px-4 py-2 text-gray-800 border border-red-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 resize-none" placeholder="Expliquez clairement votre réclamation..."></textarea>
            </div>

            <div class="modal-buttons flex justify-between mt-6">
                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm font-medium transition-all duration-200 flex-grow mr-2" onclick="closeModalDesactivation('{{ $compte->id }}')">
                    Annuler
                </button>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium transition-all duration-200 w-full flex items-center justify-center">
                    Envoyer la réclamation
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModalDesactivation(id){
            document.getElementById('desactivation-'+id).style.display='flex';}
    
    function closeModalDesactivation(id){
        document.getElementById('desactivation-'+id).style.display='none';
    }  
</script>

</body>
</html>