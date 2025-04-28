<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Vérification de Profil</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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
                <img src="" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        
    </div>
    <footer class="py-8"></footer>
</body>
</html>