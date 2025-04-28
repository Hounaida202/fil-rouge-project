<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Vérification de Profil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
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

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Vérification du Profil</h1>
            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">En attente de validation</span>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex flex-col md:flex-row">
                <div class="mb-6 md:mb-0 md:mr-8 flex flex-col items-center">
                    <div class="w-48 h-48 rounded-lg overflow-hidden shadow-lg mb-2">
                        <img src="/api/placeholder/300/300" alt="Photo de profil" class="w-full h-full object-cover">
                    </div>
                    <p class="text-sm text-gray-500">Photo de profil</p>
                </div>
                <div class="flex-1 flex flex-col">
                    <h2 class="text-xl font-bold mb-4">Informations Personnelles</h2>
                    
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Nom complet</p>
                            <p class="font-medium">{{$enAttente->name}}</p>
                        </div>
                        
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Email</p>
                            <p class="font-medium">{{$enAttente->email}}</p>
                        </div>
                        
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Numéro de téléphone</p>
                            <p class="font-medium">{{$enAttente->tel}}</p>
                        </div>
                        
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Ville</p>
                            <p class="font-medium">{{$enAttente->ville}}</p>
                        </div>
                        
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Type de compte</p>
                            <p class="font-medium">Client</p>
                        </div>
                        
                        <div class="w-full md:w-1/2 mb-4">
                            <p class="text-gray-600 text-sm">Date d'inscription</p>
                            <p class="font-medium">15/04/2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Document d'identité</h2>
            
            <div class="flex flex-col items-center md:items-start">
                <div class="w-full md:w-2/3 rounded-lg overflow-hidden shadow-md mb-2">
                    <img src="/api/placeholder/800/500" alt="Photo du permis" class="w-full h-auto object-cover">
                </div>
                <p class="text-sm text-gray-500">Photo du permis</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-end space-y-3 md:space-y-0 md:space-x-4">
                <form method="POST" action="{{route('Invalide',$enAttente->id)}}">
                                    @csrf
                                    @method('PUT')   
                                    <button type="submit" value="Invalide" class="bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg font-medium transition">
                                        Refuser la demande
                                    </button>
                                    
                </form>

               <form method="POST" action="{{ route('Valide', $enAttente->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" value="Valide" class="bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition">
                                        Valider le compte
                                    </button>
                </form>
        </div>
    </div>

    <footer class="py-8">
    <footer class="bg-[#143B39] text-white py-8">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8 flex-wrap">
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
                <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-400">
                    <p>&copy; 2025 TransportExpress. Tous droits réservés.</p>
                </div>
            </div>
       
    </footer>
    </footer>
</body>
</html>