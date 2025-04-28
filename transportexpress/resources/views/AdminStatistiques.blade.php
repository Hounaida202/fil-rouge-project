<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord administrateur</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
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
    <h1 class="text-3xl font-bold mb-8 text-[#18534F]">Tableau de bord</h1>
    
    <div class="flex flex-col md:flex-row gap-8">
      <!-- Section gauche -->
      <div class="w-full md:w-1/2">
        <!-- Statistiques -->
        <div class="bg-white p-6 mb-8 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-6 text-[#18534F] border-b pb-2">Statistiques générales</h2>
          <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 p-2">
              <div class="bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
                <span class="text-gray-600 text-sm">Inscriptions totales</span>
                <span class="text-2xl font-bold text-[#18534F]">{{$total}}</span>
              </div>
            </div>
            <div class="w-full md:w-1/2 p-2">
              <div class="bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
                <span class="text-gray-600 text-sm">Comptes activés</span>
                <span class="text-2xl font-bold text-[#18534F]">{{$actives}}</span>
              </div>
            </div>
            <div class="w-full md:w-1/2 p-2">
              <div class="bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
                <span class="text-gray-600 text-sm">Comptes désactivés</span>
                <span class="text-2xl font-bold text-[#18534F]">{{$desactives}}</span>
              </div>
            </div>
            <div class="w-full md:w-1/2 p-2">
              <div class="bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
                <span class="text-gray-600 text-sm">En attente</span>
                <span class="text-2xl font-bold text-[#18534F]">{{$enAttente}}</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Inscriptions du mois -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-6 text-[#18534F] border-b pb-2">Inscriptions du mois</h2>
          
          <!-- En-tête -->
          <div class="flex bg-gray-50 py-3 px-4 mb-2 rounded">
            <div class="flex-1 text-sm font-medium text-gray-600">Nom</div>
            <div class="flex-1 text-sm font-medium text-gray-600">Rôle</div>
            <div class="flex-1 text-sm font-medium text-gray-600">Statut</div>
          </div>
          
          <!-- Lignes inscriptions -->
          <div class="space-y-2">
            <div class="flex py-3 px-4 border-b border-gray-100">
              <div class="flex-1">
                <div class="text-sm font-medium">Ahmed Ahmed</div>
                <div class="text-xs text-gray-500">25/04/2025</div>
              </div>
              <div class="flex-1 text-sm">Client</div>
              <div class="flex-1"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Activé</span></div>
            </div>
            
            <div class="flex py-3 px-4 border-b border-gray-100">
              <div class="flex-1">
                <div class="text-sm font-medium">Sophie Tremblay</div>
                <div class="text-xs text-gray-500">24/04/2025</div>
              </div>
              <div class="flex-1 text-sm">Client</div>
              <div class="flex-1"><span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">En attente</span></div>
            </div>
            
            <div class="flex py-3 px-4 border-b border-gray-100">
              <div class="flex-1">
                <div class="text-sm font-medium">Pierre Lefebvre</div>
                <div class="text-xs text-gray-500">23/04/2025</div>
              </div>
              <div class="flex-1 text-sm">Client</div>
              <div class="flex-1"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Activé</span></div>
            </div>
            
            <div class="flex py-3 px-4 border-b border-gray-100">
              <div class="flex-1">
                <div class="text-sm font-medium">Julie Côté</div>
                <div class="text-xs text-gray-500">22/04/2025</div>
              </div>
              <div class="flex-1 text-sm">Client</div>
              <div class="flex-1"><span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Activé</span></div>
            </div>
            
            <div class="flex py-3 px-4">
              <div class="flex-1">
                <div class="text-sm font-medium">Michel Girard</div>
                <div class="text-xs text-gray-500">21/04/2025</div>
              </div>
              <div class="flex-1 text-sm">Client</div>
              <div class="flex-1"><span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Désactivé</span></div>
            </div>
          </div>
          
          <div class="mt-4 text-right">
            <button class="text-sm text-[#18534F] font-medium hover:underline">Voir tout</button>
          </div>
        </div>
      </div>
      
      <!-- Section droite -->
      <div class="w-full md:w-1/2">
        <!-- Historique des actions -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-6 text-[#18534F] border-b pb-2">Historique des actions</h2>
          
          <!-- Première section d'historique -->
           @foreach($remarques as $remarque)
          <div class="mb-8 bg-gray-50 p-4 rounded-lg shadow-sm">
            <h3 class="text-lg font-medium mb-4 text-[#18534F]">{{$remarque->titre}}</h3>
            <div class="flex flex-wrap mb-4">
              
             
              
              <div class="w-full md:w-1/2 mb-2">
                <div class="text-sm text-gray-600">Note:</div>
                <div class="text-sm">{{$remarque->description}}</div>
              </div>
              
              <div class="w-full md:w-1/2 mb-2">
                <div class="text-sm text-gray-600">Date:</div>
                <div class="text-sm">{{$remarque->created_at}}</div>
              </div>
            </div>
            
          </div>
         @endforeach
          
          <!-- Résumé des activités récentes -->
          <div class="mt-8">
            <h3 class="text-lg font-medium mb-4 text-[#18534F]">Activités récentes</h3>
            <div class="space-y-4">
              <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div>
                  <p class="text-sm font-medium">Modification de profil</p>
                  <p class="text-xs text-gray-500">Par: Admin</p>
                </div>
                <span class="text-xs text-gray-500">Il y a 2 heures</span>
              </div>
              <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div>
                  <p class="text-sm font-medium">Suppression de compte</p>
                  <p class="text-xs text-gray-500">Par: Modérateur</p>
                </div>
                <span class="text-xs text-gray-500">Il y a 5 heures</span>
              </div>
              <div class="flex items-center justify-between py-2 border-b border-gray-100">
                <div>
                  <p class="text-sm font-medium">Approbation d'inscription</p>
                  <p class="text-xs text-gray-500">Par: Système</p>
                </div>
                <span class="text-xs text-gray-500">Hier</span>
              </div>
            </div>
            <div class="mt-4 text-right">
              <button class="text-sm text-[#18534F] font-medium hover:underline">Voir toutes les activités</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
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
</html>