<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<nav class="bg-[#18534F] text-white p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center w-full md:w-auto justify-between">
                <span class="font-bold text-xl">TransportExpress</span>
                <button id="menuButton" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            <div id="mobileMenu" class="hidden md:flex flex-col md:flex-row w-full md:w-auto space-y-3 md:space-y-0 md:space-x-6 mt-4 md:mt-0">
                <a href="{{route('dashboard')}}" class="hover:text-blue-200 font-medium block">Dashboard</a>
                <a href="{{route('comptes')}}" class="hover:text-blue-200 font-medium block">Comptes</a>
                <a href="{{route('reclamation')}}" class="hover:text-blue-200 font-medium block">Réclamations</a>
                <a href="{{route('statistics')}}" class="hover:text-blue-200 font-medium block">Statistiques</a>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>Admin</span>
                <img src="https://img.freepik.com/photos-premium/personnage-tres-mignon-nuage-personnage-enfant-mignon_454018-1392.jpg" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>
    <section class="py-8">
        <div class="container mx-auto px-4 overflow-hidden">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3 w-full" style="height: 900px;">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">

                        <div class="bg-[#4C956C] p-6 rounded-lg shadow-md relative">
                            <div class="absolute top-6 left-4 flex flex-col space-y-4">
                                <button onclick="openModal('{{ $compte->id }}')" class="delete-btn text-white hover:text-red-500" title="Supprimer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H3.5a.5.5 0 000 1H4v11a2 2 0 002 2h8a2 2 0 002-2V5h.5a.5.5 0 000-1H15V3a1 1 0 00-1-1H6zm1 5a.5.5 0 011 0v7a.5.5 0 01-1 0V7zm4 0a.5.5 0 011 0v7a.5.5 0 01-1 0V7z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                @if($compte->compte=='Actif')
                                <button onclick="openModalDesactivation('{{ $compte->id }}')" class="desactive-btn text-white hover:text-yellow-400" title="Désactiver">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2a10 10 0 1010 10A10.01142 10.01142 0 0012 2zm5.65685 14.14214L7.85786 6.34315a8 8 0 0110.79899 10.79899zM6.34315 7.85786l9.79899 9.79899a8 8 0 01-10.79899-10.79899z"/>
                                    </svg>
                                </button>
                                @else
                                <form method="POST" action="{{ route('activer', $compte->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button class="text-white hover:text-green-400" title="Activer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L9 14.414 5.293 10.707a1 1 0 011.414-1.414L9 11.586l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="mb-4">
                                    <img src="{{$compte->image}}" alt="" class="rounded-full h-24 w-24 border-4 border-white">
                                </div>
                                <div class="text-center">
                                    <h1 class="text-xl font-bold text-white mb-2">{{$compte->name}}</h1>
                                    <div class="text-blue-200 mb-2">{{$compte->role}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-bold mb-3 text-gray-700">Informations du compte</h2>
                            <div class="space-y-3">
                                <div><div class="text-sm text-gray-500">Email</div><div class="font-medium">{{$compte->email}}</div></div>
                                <div><div class="text-sm text-gray-500">Téléphone</div><div class="font-medium">{{$compte->tel}}</div></div>
                                <div><div class="text-sm text-gray-500">Ville</div><div class="font-medium">{{$compte->ville}}</div></div>
                                <div><div class="text-sm text-gray-500">Membre depuis</div><div class="font-medium">le  {{ $compte->created_at->format('d/m/Y') }}</div></div>
                            </div>
                            <div class="grid grid-cols-3 gap-2 mt-4">
                                <div class="p-2 bg-blue-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-blue-600">{{$countpub}}</div>
                                    <div class="text-xs text-gray-600">Publications</div>
                                </div>
                                <div class="p-2 bg-green-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-green-600">{{$countreservation}}</div>
                                    <div class="text-xs text-gray-600">reservations</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <h2 class="text-lg font-bold mb-4 text-gray-700">Commentaires ({{$countcommentaires}})</h2>
                        <div class="scrollable-section pr-2 overflow-y-auto" style="max-height: 300px;">
                            @forelse($commentaires as $commentaire)
                            <div class="mb-6 pb-6 border-b border-gray-200">
                                <div class="flex items-start mb-3">
                                    <img src="{{ $commentaire->auteur->image ?? 'https://www.pngitem.com/pimgs/m/52-526033_unknown-person-icon-png-transparent-png.png' }}" alt="" class="rounded-full h-10 w-10 mr-3">
                                    <div>
                                        <div class="font-bold">{{ $commentaire->auteur->name ?? 'Utilisateur inconnu' }}</div>
                                        <div class="text-sm text-gray-500">Posté il y a {{ $commentaire->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <p class="text-gray-700">{{ $commentaire->description }}</p>
                            </div>
                            @empty
                            <p class="text-gray-500">Aucun commentaire pour cet utilisateur.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Colonne de droite -->
                <div class="md:w-2/3 w-full" style="height: 1000px;">
                    <div class="publications-container overflow-y-auto h-full pr-2">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-bold mb-6 text-gray-700">Publications récentes</h2>
                            @forelse($publications as $publication)
                            <div class="mb-8 pb-6 border-b border-gray-200">
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                        <img src="{{$compte->image}}" alt="Photo de profil" class="w-full h-full object-cover">
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
<!-- ----------------------------------------------------------------------------------------- -->
 
<!-- ----------------------------------------------------------------------------------------------------- -->
            </div>
        </div>
    </section>

    <!-- Modal de suppression -->
    <div id="modal-{{ $compte->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50 transition-opacity duration-300">
        <div class="modal-content bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg mx-4 transform transition-all duration-300">
            <div class="flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <h2 class="text-xl font-bold text-gray-800">Suppression de compte</h2>
            </div>

            <p class="text-center font-medium text-lg text-gray-700 mb-3">Veuillez indiquer les informations suivantes :</p>
            
            <form action="/supprimer/{{ $compte->id }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <input name="titre" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre de la suppression (facultatif)">
                </div>
                <div class="mb-3">
                    <textarea name="description" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Expliquez pourquoi vous souhaitez supprimer ce compte..."></textarea>
                </div>
                <div class="bg-gray-50 p-2 rounded-md mb-3">
                    <p class="text-gray-700 text-sm text-center">Cette action ne peut pas être annulée.</p>
                </div>

                <div class="modal-buttons flex justify-between mt-4">
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded text-sm font-medium transition-all duration-200 flex-grow mr-2" onclick="closeModal('{{ $compte->id }}')">
                        Annuler
                    </button>
                    <button type="submit" id="suppression" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-medium transition-all duration-200 w-full flex items-center justify-center">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="desactivation-{{ $compte->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50 transition-opacity duration-300" style="display:none;">
            <div class="modal-content bg-white rounded-xl shadow-2xl p-6 w-[600px] mx-auto">
                <div class="flex items-center justify-center mb-4">
                    
                    <h2 class="text-xl font-bold text-gray-800">Vous voulez desactiver ce compte ?</h2>
                </div>

                <p class="text-center font-medium text-lg text-gray-700 mb-3">Veuillez indiquer les informations suivantes :</p>
                
                <form action="/desactiver/{{ $compte->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <input name="titre" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre de l'action">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Expliquez pourquoi vous souhaitez desactiver ce compte"></textarea>
                    </div>
                    <div class="modal-buttons flex justify-between mt-4">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded text-sm font-medium transition-all duration-200 flex-grow mr-2" onclick="closeModalDesactivation('{{ $compte->id }}')">
                            Annuler
                        </button>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-medium transition-all duration-200 w-full flex items-center justify-center">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>

    <script>
     function openModal(id){
            document.getElementById('modal-'+id).style.display='flex';}
        
    function closeModal(id){
        document.getElementById('modal-'+id).style.display='none';
    }
    function openModalDesactivation(id){
            document.getElementById('desactivation-'+id).style.display='flex';}
    
    function closeModalDesactivation(id){
        document.getElementById('desactivation-'+id).style.display='none';
    }   
    </script>
</body>
</html>