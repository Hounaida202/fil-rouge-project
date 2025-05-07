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
      <img src="https://img.freepik.com/photos-premium/personnage-tres-mignon-nuage-personnage-enfant-mignon_454018-1392.jpg" alt="" class="w-8 h-8 rounded-full">
    </div>
  </div>
</nav>

<div class="container mx-auto px-4 py-8">
  <h1 class="text-3xl font-bold mb-8 text-[#18534F]">Tableau de bord</h1>

  <div class="flex flex-col gap-8">
    <!-- Colonne gauche -->
    <div class="w-full">
      <!-- Statistiques -->
      <div class="bg-white p-6 mb-8 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6 text-[#18534F] border-b pb-2">Statistiques générales</h2>
        <div class="flex flex-wrap gap-4">
          <div class="flex-1 min-w-[180px] bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
            <span class="text-gray-600 text-sm">Inscriptions totales</span>
            <span class="text-2xl font-bold text-[#18534F]">{{$total}}</span>
          </div>
          <div class="flex-1 min-w-[180px] bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
            <span class="text-gray-600 text-sm">Comptes activés</span>
            <span class="text-2xl font-bold text-[#18534F]">{{$actives}}</span>
          </div>
          <div class="flex-1 min-w-[180px] bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
            <span class="text-gray-600 text-sm">Comptes désactivés</span>
            <span class="text-2xl font-bold text-[#18534F]">{{$desactives}}</span>
          </div>
          <div class="flex-1 min-w-[180px] bg-white p-4 flex flex-col border-l-4 border-[#18534F] rounded shadow-sm">
            <span class="text-gray-600 text-sm">En attente</span>
            <span class="text-2xl font-bold text-[#18534F]">{{$enAttente}}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Colonne droite -->
    <div class="w-full">
      <!-- Historique des actions -->
      <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-6 text-[#18534F] border-b pb-2">Historique des actions</h2>
        
        <div class="flex flex-col space-y-6">
          @foreach($remarques as $remarque)
          <div class="bg-gray-50 p-6 rounded-lg shadow-md w-full">
            <h3 class="text-lg font-medium mb-4 text-[#18534F]">{{$remarque->titre}}</h3>
            <div class="flex flex-col md:flex-row md:justify-between">
              <div class="mb-2">
                <div class="text-sm text-gray-600">Note :</div>
                <div class="text-sm">{{$remarque->description}}</div>
              </div>
              <div class="mb-2">
                <div class="text-sm text-gray-600">Date :</div>
                <div class="text-sm">{{$remarque->created_at}}</div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="bg-[#143B39] text-white py-8 mt-12">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8 flex-wrap">
      <div class="md:w-1/4">
        <h3 class="text-xl font-bold mb-4">TransportExpress</h3>
        <p class="text-gray-400">Solutions de transport de marchandises fiables et efficaces.</p>
      </div>
      <div class="md:w-1/4">
        <h4 class="font-bold mb-4">Services</h4>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 hover:text-white">Transport National</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white">Transport International</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white">Suivi en Temps Réel</a></li>
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
</body>
</html>
