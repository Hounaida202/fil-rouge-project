<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Gestion des Comptes</title>
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
                <a href="{{route('dashboard')}}" class="hover:text-blue-200 font-medium block">Dashboard</a>
                <a href="{{route('comptes')}}" class="hover:text-blue-200 font-medium block">Comptes</a>
                <a href="{{route('reclamation')}}" class="hover:text-blue-200 font-medium block">Réclamations</a>
                <a href="" class="hover:text-blue-200 font-medium block">Statistiques</a>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>Admin</span>
                <img src="https://img.freepik.com/photos-premium/personnage-tres-mignon-nuage-personnage-enfant-mignon_454018-1392.jpg" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Gestion des Comptes Utilisateurs</h1>
            
        </div>

        <!-- Filtres et recherche -->

        <!-- ########################################################"" -->
        <form action="{{ route('comptes') }}" method="GET">
    @csrf
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Barre de recherche -->
            <div class="md:col-span-2">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Recherche par nom</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="pl-10 w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Rechercher un utilisateur...">
                </div>
            </div>

            <!-- Filtre par type de compte -->
            <div>
                <label for="account-type" class="block text-sm font-medium text-gray-700 mb-1">Type de compte</label>
                <select id="account-type" name="role" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Tous les types</option>
                    <option value="Client" >Client</option>
                    <option value="Transporteur" >Transporteur</option>
                </select>
            </div>

            <!-- Filtre par ville -->
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                <select id="city" name="ville" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Toutes les villes</option>
                    <option value="Paris" >Paris</option>
                    <option value="Lyon" >Lyon</option>
                    <option value="Marseille" >Marseille</option>
                    <option value="Toulouse" >Toulouse</option>
                    <option value="Nice" >Nice</option>
                </select>
            </div>
        </div>
        
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Appliquer les filtres
            </button>
        </div>
    </div>
</form>

        <!-- ########################################################"" -->

        <!-- Tableau des utilisateurs -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Utilisateur
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ville
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut
                            </th> -->
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Utilisateur 1 -->
                        
                            

                        <!-- Utilisateur 2 -->
                        

                        <!-- Utilisateur 3 -->
                        

                        <!-- Utilisateur 4 -->
                        @foreach($Actifs as $actif)
                        @csrf
                        <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"> {{$actif->name}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                lucie.martin@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{$actif->ville}}
                            </td>
                            @if($actif->role==='Transporteur')
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                {{$actif->role}}
                                </span>
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$actif->role}}
                                </span>
                            </td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{$actif->status}}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">Voir</button>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                        
                           
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
    <div class="h-24">
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">TransportExpress</h3>
                        <p class="text-gray-400">Solutions de transport de marchandises fiables et efficaces.</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Liens Rapides</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Accueil</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Services</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">À propos</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Services</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Transport National</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Transport International</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Suivi en Temps Réel</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Entreposage</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4">Contact</h4>
                        <ul class="space-y-2 text-gray-400">
                            <li>123 Rue du Transport</li>
                            <li>75000 Paris</li>
                            <li>info@transportexpress.com</li>
                            <li>+33 1 23 45 67 89</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                    <p>&copy; 2025 TransportExpress. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>