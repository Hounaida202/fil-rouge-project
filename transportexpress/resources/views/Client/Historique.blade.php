<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Historique</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .scrollable-section {
            height: 600px;
            overflow-y: auto;
            scrollbar-width: thin;
        }
        
        .scrollable-section::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollable-section::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .scrollable-section::-webkit-scrollbar-thumb {
            background: #18534F;
            border-radius: 10px;
        }
        
        .scrollable-section::-webkit-scrollbar-thumb:hover {
            background: #143B39;
        }
    </style>
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
                <a href="{{route('filtrerPublications')}}" class="hover:text-blue-200 font-medium block">Home</a>
                <a href="{{route('HistoriquesClient')}}" class="hover:text-blue-200 font-medium block">Historique</a>
                <a href="{{route('afficherFavoris')}}" class="hover:text-blue-200 font-medium block">Favoris</a>
            </div>
            <div  class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Mon Historique</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">













            <!-- Mes Publications -->

            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold pb-3 border-b border-gray-200 mb-4 text-[#18534F]">
                    <i class="fas fa-file-alt mr-2"></i>Mes Publications
                </h2>
                
                <div class="scrollable-section pr-2">
                   
                    @forelse($publications as $publication)
                    <!-- Publication 2 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="mb-3">
                            <img src="{{asset('storage/'.$publication->image)}}" alt="" class="w-full h-32 object-cover rounded">
                        </div>
                        <h3 class="font-bold text-lg mb-2">Livraison matériel informatique</h3>
                        <div class="flex flex-wrap text-sm">
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Départ:</span> {{$publication->ville_depart}}
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Arrivée:</span> {{$publication->ville_arrivee}}
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Date:</span> {{$publication->date_depart}}
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Type:</span> {{$publication->type}}
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Poids:</span> {{$publication->poids}} kg
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Prix:</span> {{$publication->prix}} DH
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                        {{$publication->description}}
                        </p>
                        <div class="flex justify-between mt-3">
                        <span class="@if($publication->etat == 'en cours') bg-green-100 px-2 py-1 text-green-800 rounded-full text-xs font-medium @else bg-red-100 px-2 py-1 text-red-800 rounded-full text-xs font-medium @endif">
                            {{ $publication->etat }}
                        </span>
                        </div>
                    </div>
                    @empty
                        <p class="text-gray-500">Vous n'avez aucune publication.</p>
                    @endforelse
                    <!-- Publication 1 -->

                        
                </div>
            </div>
            

























            <!-- Mes Commentaires -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold pb-3 border-b border-gray-200 mb-4 text-[#18534F]">
                    <i class="fas fa-comments mr-2"></i>Mes Commentaires
                </h2>
                
                <div class="scrollable-section pr-2">
                    <!-- Commentaire 1 -->
                     @forelse($commentaires as $commentaire)
                     <div class="bg-gray-50 rounded-lg p-3 mb-4 relative">
    <!-- Icône de suppression -->
    <form action="" method="POST" class="absolute top-2 right-2">
        @csrf
        @method('DELETE')
        <button type="submit" >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 8.586L4.707 3.293a1 1 0 10-1.414 1.414L8.586 10l-5.293 5.293a1 1 0 101.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z" clip-rule="evenodd" />
            </svg>
        </button>
    </form>

    <div class="flex items-center mb-3">
        <img src="{{ asset('storage/'.$commentaire->cible->image) }}" alt="Photo de profil" class="w-10 h-10 rounded-full mr-3">
        <div>
            <h4 class="font-medium">{{ $commentaire->cible->name }}</h4>
            <p class="text-xs text-gray-500">{{ $commentaire->cible->role }}</p>
        </div>
    </div>
    <p class="text-sm mb-2">{{ $commentaire->description }}</p>
    <div class="flex justify-between items-center">
        <span class="text-xs text-gray-500">{{ $commentaire->created_at->format('d/m/Y H:i') }}</span>
    </div>
</div>

                    @empty
                    <p class="text-gray-500">Vous n'avez aucune commentaire.</p>

                    @endforelse
                    <!-- Commentaire 2 -->
                    
                    
                    <!-- Commentaire 3 -->
                    

                    <!-- Commentaires supplémentaires pour le défilement -->
                   
                </div>
            </div>
            
            <!-- Mes Réservations -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold pb-3 border-b border-gray-200 mb-4 text-[#18534F]">
                    <i class="fas fa-bookmark mr-2"></i>Mes Réservations
                </h2>
                
                <div class="scrollable-section pr-2">
                    <!-- Réservation 1 -->
                     @forelse($reservations as $reservation)
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="{{asset('storage/'.$reservation->publication->user->image)}}" alt="Photo de profil" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">{{$reservation->publication->user->name}}</h4>
                                <p class="text-xs text-gray-500">{{$reservation->publication->titre}}</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Date:</span> {{$reservation->publication->created_at->format('d/m/Y H:i') }}
                            </div>
                            <!-- <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Confirmée</span> -->
                        </div>
                        <!-- <div class="mt-3 flex justify-between">
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                            <button class="text-sm text-red-600 hover:underline">
                                <i class="fas fa-times mr-1"></i>Annuler
                            </button>
                        </div> -->
                    </div>
                    @empty
                    <p class="text-gray-500">Vous n'avez aucune reservation.</p>

                    @endforelse
                    
                    <!-- Réservation 2 -->
                   
                    
                    <!-- Réservation 3 -->
                    

                    <!-- Réservations supplémentaires pour le défilement -->
                    
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-[#143B39] text-white py-6 mt-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6 flex-wrap">
                <div class="md:w-1/4">
                    <h3 class="text-xl font-bold mb-4">TransportExpress</h3>
                    <p class="text-gray-400">Solutions de transport de marchandises fiables et efficaces.</p>
                </div>
                <div class="md:w-1/4">
                    <h4 class="font-bold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="" class="text-gray-400 hover:text-white">Transport National</a>
                        </li>
                        <li>
                            <a href="" class="text-gray-400 hover:text-white">Transport International</a>
                        </li>
                        <li>
                            <a href="" class="text-gray-400 hover:text-white">Suivi en Temps Réel</a>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/4">
                    <h4 class="font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Safi</li>
                        <li>transportexpress@gmail.com</li>
                        <li>+212 1111111111</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-4 text-center text-gray-400">
                <p>&copy; 2025 TransportExpress. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    
    <script>
        document.getElementById('menuButton').addEventListener('click', function() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>