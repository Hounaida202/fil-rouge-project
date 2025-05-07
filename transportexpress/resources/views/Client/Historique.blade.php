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
                    <!-- Publication 1 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="mb-3">
                            <img src="" alt="Image de la publication" class="w-full h-32 object-cover rounded">
                        </div>
                        <h3 class="font-bold text-lg mb-2">Transport de meubles</h3>
                        <div class="flex flex-wrap text-sm">
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Départ:</span> Casablanca
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Arrivée:</span> Rabat
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Date:</span> 05/06/2025
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Type:</span> Meuble
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Poids:</span> 200kg
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Prix:</span> 800 DH
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                            Transport de meubles pour un déménagement, incluant un canapé, deux armoires et une table à manger.
                        </p>
                        <div class="flex justify-between mt-3">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">En cours</span>
                            <button class="text-[#18534F] hover:underline text-sm">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                        </div>
                    </div>
                    
                    <!-- Publication 2 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="mb-3">
                            <img src="" alt="Image de la publication" class="w-full h-32 object-cover rounded">
                        </div>
                        <h3 class="font-bold text-lg mb-2">Livraison matériel informatique</h3>
                        <div class="flex flex-wrap text-sm">
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Départ:</span> Marrakech
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Arrivée:</span> Agadir
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Date:</span> 12/04/2025
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Type:</span> Fragile
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Poids:</span> 45kg
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Prix:</span> 600 DH
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                            Transport de 3 ordinateurs, 2 imprimantes et divers équipements informatiques pour une petite entreprise.
                        </p>
                        <div class="flex justify-between mt-3">
                            <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Expiré</span>
                            <button class="text-[#18534F] hover:underline text-sm">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                        </div>
                    </div>

                    <!-- Publications supplémentaires pour le défilement -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="mb-3">
                            <img src="" alt="Image de la publication" class="w-full h-32 object-cover rounded">
                        </div>
                        <h3 class="font-bold text-lg mb-2">Transport produits alimentaires</h3>
                        <div class="flex flex-wrap text-sm">
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Départ:</span> Fès
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Arrivée:</span> Tanger
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Date:</span> 18/05/2025
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Type:</span> Périssable
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Poids:</span> 300kg
                            </div>
                            <div class="w-1/2 mb-1">
                                <span class="font-medium">Prix:</span> 1200 DH
                            </div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2 line-clamp-2">
                            Transport de produits alimentaires locaux nécessitant une conservation au frais.
                        </p>
                        <div class="flex justify-between mt-3">
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">En cours</span>
                            <button class="text-[#18534F] hover:underline text-sm">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mes Commentaires -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold pb-3 border-b border-gray-200 mb-4 text-[#18534F]">
                    <i class="fas fa-comments mr-2"></i>Mes Commentaires
                </h2>
                
                <div class="scrollable-section pr-2">
                    <!-- Commentaire 1 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Ahmed Benali</h4>
                                <p class="text-xs text-gray-500">Transporteur</p>
                            </div>
                        </div>
                        <p class="text-sm mb-2">
                            Excellent service, très professionnel et ponctuel. Je recommande vivement ce transporteur pour tous vos besoins de déménagement.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-xs text-gray-500">28/04/2025</span>
                        </div>
                    </div>
                    
                    <!-- Commentaire 2 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Fatima Zahra</h4>
                                <p class="text-xs text-gray-500">Client</p>
                            </div>
                        </div>
                        <p class="text-sm mb-2">
                            Livraison rapide et soigneuse. Les objets fragiles ont été parfaitement manipulés. Je ferai appel à ce service à nouveau.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">15/04/2025</span>
                        </div>
                    </div>
                    
                    <!-- Commentaire 3 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Mohammed Karimi</h4>
                                <p class="text-xs text-gray-500">Transporteur</p>
                            </div>
                        </div>
                        <p class="text-sm mb-2">
                            Communication claire et organisation impeccable. Le client avait tout préparé pour faciliter le chargement.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">02/04/2025</span>
                        </div>
                    </div>

                    <!-- Commentaires supplémentaires pour le défilement -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Nadia Alaoui</h4>
                                <p class="text-xs text-gray-500">Client</p>
                            </div>
                        </div>
                        <p class="text-sm mb-2">
                            Service moyen. Le transporteur était en retard, mais la marchandise est arrivée en bon état.
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500">20/03/2025</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mes Réservations -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold pb-3 border-b border-gray-200 mb-4 text-[#18534F]">
                    <i class="fas fa-bookmark mr-2"></i>Mes Réservations
                </h2>
                
                <div class="scrollable-section pr-2">
                    <!-- Réservation 1 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Rachid Moussaoui</h4>
                                <p class="text-xs text-gray-500">Transport de matériaux de construction</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Date:</span> 10/05/2025
                            </div>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Confirmée</span>
                        </div>
                        <div class="mt-3 flex justify-between">
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                            <button class="text-sm text-red-600 hover:underline">
                                <i class="fas fa-times mr-1"></i>Annuler
                            </button>
                        </div>
                    </div>
                    
                    <!-- Réservation 2 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Samira Idrissi</h4>
                                <p class="text-xs text-gray-500">Livraison de produits artisanaux</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Date:</span> 22/04/2025
                            </div>
                            <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs font-medium">Terminée</span>
                        </div>
                        <div class="mt-3 flex justify-between">
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-comment mr-1"></i>Commenter
                            </button>
                        </div>
                    </div>
                    
                    <!-- Réservation 3 -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Omar Benjelloun</h4>
                                <p class="text-xs text-gray-500">Transport d'équipements sportifs</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Date:</span> 30/05/2025
                            </div>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">En attente</span>
                        </div>
                        <div class="mt-3 flex justify-between">
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                            <button class="text-sm text-red-600 hover:underline">
                                <i class="fas fa-times mr-1"></i>Annuler
                            </button>
                        </div>
                    </div>

                    <!-- Réservations supplémentaires pour le défilement -->
                    <div class="bg-gray-50 rounded-lg p-3 mb-4">
                        <div class="flex items-center mb-3">
                            <img src="/api/placeholder/60/60" alt="Photo de profil" class="w-12 h-12 rounded-full mr-3">
                            <div>
                                <h4 class="font-medium">Karim Tazi</h4>
                                <p class="text-xs text-gray-500">Déménagement d'appartement</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div>
                                <span class="font-medium">Date:</span> 08/06/2025
                            </div>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Confirmée</span>
                        </div>
                        <div class="mt-3 flex justify-between">
                            <button class="text-sm text-[#18534F] hover:underline">
                                <i class="fas fa-eye mr-1"></i>Détails
                            </button>
                            <button class="text-sm text-red-600 hover:underline">
                                <i class="fas fa-times mr-1"></i>Annuler
                            </button>
                        </div>
                    </div>
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