<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Gestion des Réclamations</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Barre de navigation -->
    <nav class="bg-[#18534F] text-white p-4 shadow-md">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center w-full md:w-auto justify-between">
                <span class="font-bold text-xl">TransportExpress</span>
                <button id="menuButton" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            <div id="mobileMenu" class="hidden md:flex flex-col md:flex-row w-full md:w-auto space-y-3 md:space-y-0 md:space-x-6 mt-4 md:mt-0">
                <a href="" class="hover:text-blue-200 font-medium block">Dashboard</a>
                <a href="" class="hover:text-blue-200 font-medium block">Comptes</a>
                <a href="" class="hover:text-blue-200 font-medium block">Réclamations</a>
                <a href="" class="hover:text-blue-200 font-medium block">Statistiques</a>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>Admin</span>
                <img src="https://img.freepik.com/photos-premium/personnage-tres-mignon-nuage-personnage-enfant-mignon_454018-1392.jpg" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>

    <!-- Section principale - Gestion des réclamations -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Gestion des Réclamations</h1>
                <div class="flex space-x-2">
                    <select class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="toutes">Toutes les réclamations</option>
                        <option value="nouvelles">Nouvelles</option>
                        <option value="traitées">Traitées</option>
                        <option value="rejetées">Rejetées</option>
                    </select>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Filtrer</button>
                </div>
            </div>

            <!-- Liste des réclamations -->
            <div class="space-y-6">
                <!-- Réclamation 1 -->
                 @foreach($reclamations as $reclamation)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-start">
                        <!-- Informations de l'émetteur -->
                        <div class="flex items-start">
                            <div class="mr-4">
                                <a href="#">
                                    <img src="/api/placeholder/48/48" alt="Photo de profil" class="h-12 w-12 rounded-full">
                                </a>
                            </div>
                            <div>
                                <a href="" class="font-semibold text-blue-600 hover:underline">{{$reclamation->cible->name}}</a>
                                <p class="text-gray-500 text-sm">{{$reclamation->cible->role}} • Il y a {{ $reclamation->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        
                        <!-- Boutons d'action -->
                        <div class="flex space-x-2">
                            
                            <form action="{{route('supression',$reclamation->id)}}" method="POST">  
                                @csrf   
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Supprimer
                                </button>
                            </form>
                            <div class="relative">
                                <button class="bg-gray-200 px-2 py-1 rounded hover:bg-gray-300 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contenu de la réclamation -->
                    <div class="mt-4">
                        <h3 class="font-bold text-lg mb-2">{{$reclamation->titre}}</h3>
                        <p class="text-gray-700 mb-4">
                        {{$reclamation->description}}
                        </p>
                        
                        <!-- Personne réclamée -->
                        <div class="mt-4 flex items-center bg-gray-50 p-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="text-gray-600 mr-1">À propos de : </span>
                            <a href="#" class="text-blue-600 font-medium hover:underline">{{$reclamation->auteur->name}}</a>
                            <span class="ml-2 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded">{{ $reclamation->auteur->role }}</span>

                        </div>
                    </div>
                    
                    <!-- Actions de modération -->
                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-end space-x-3">
                    <form action="{{route('modification',$reclamation->id)}}" method="POST">  
                                @csrf   
                                @method('PUT')
                        <button type="submit" value="traité" class="px-4 py-2 border border-gray-300 rounded text-gray-600 hover:bg-gray-50 transition">Marquer comme traité</button>
                        </form>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Contacter l'utilisateur</button>
                    </div>
                </div>
                @endforeach
                <!-- Réclamation 2 -->
                
                
                <!-- Bouton charger plus -->
                <div class="text-center pt-4">
                    <button class="px-6 py-3 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                        Charger plus de réclamations
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer vide comme demandé -->
    <footer class="py-8"></footer>
</body>
</html>