<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Publications</title>
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
                <a href="{{route('filtrerPublications')}}" class="hover:text-blue-200 font-medium block">Home</a>
                <a href="{{route('HistoriquesClient')}}" class="hover:text-blue-200 font-medium block">Historique</a>
                <a href="{{route('afficherFavoris')}}" class="hover:text-blue-200 font-medium block">Favoris</a>
                <div class="relative">
                    <button id="notificationButton" class="hover:text-blue-200 font-medium block flex items-center relative">
                        Notification
                        <span class="flex h-5 w-5 items-center justify-center bg-red-500 text-white text-xs rounded-full absolute -top-2 -right-4">5</span>
                    </button>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-8 h-8 rounded-full">
            </div>
        </div>
    </nav>

<div class="container mx-auto px-4 py-8 max-w-4xl relative">
              
                <div class="space-y-6">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-4 border-b flex items-center gap-4">
            <img src="{{$reservation->publication->user->image}}" alt="" class="w-14 h-14 rounded-full object-cover">
            <div>
                <a href="{{route('autreprofile',$reservation->publication->user->id)}}">
                    <h3 class="font-bold text-lg">{{$reservation->publication->user->name}}</h3>
                </a>
                <div class="flex items-center gap-3 text-gray-600 text-sm">
                    <span>{{$reservation->publication->user->email}}</span>
                    <span class="px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full">{{$reservation->publication->user->role}}</span>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-bold">{{$reservation->publication->titre}}</h2>
                @if($reservation->publication->etat=='expiré')
                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full font-medium">{{$reservation->publication->etat}}</span>
                @else
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full font-medium">{{$reservation->publication->etat}}</span>
                @endif
            </div>
            @if($reservation->publication->image!=null)
                    <div class="w-96 mx-auto mb-8 rounded-lg overflow-hidden border">
                        <img src="{{asset('storage/'.$reservation->publication->image)}}" alt="Image du transport" class="w-full h-auto object-cover">
                    </div>
                    @endif
            <div class="flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 mb-2">
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-map-marker-alt text-[#18534F] w-5"></i>
                        <span class="font-medium">Ville de départ:</span> {{$reservation->publication->ville_depart}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-calendar text-[#18534F] w-5"></i>
                        <span class="font-medium">Date:</span> {{$reservation->publication->date_depart}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-tag text-[#18534F] w-5"></i>
                        <span class="font-medium">Type:</span> {{$reservation->publication->type}}
                    </p>
                </div>
                <div class="w-full md:w-1/2 mb-2">
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-map-marker-alt text-[#18534F] w-5"></i>
                        <span class="font-medium">Ville d'arrivé:</span> {{$reservation->publication->ville_arrivee}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-weight-hanging text-[#18534F] w-5"></i>
                        <span class="font-medium">Quantité max:</span> {{$reservation->publication->poids}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-money-bill-wave text-[#18534F] w-5"></i>
                        <span class="font-medium">Prix:</span> {{$reservation->publication->prix}}
                    </p>
                </div>
            </div>
            <div class="mb-6">
                <h4 class="font-medium mb-2">Description:</h4>
                <p class="text-gray-700">{{$reservation->publication->description}}
                </p>
            </div>
           
            </div>
                   <div class="flex gap-3 justify-center  pb-4">
                        <a href="{{ route('reservationn.telecharger_pdf', $reservation->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            <i class="fas fa-download mr-1"></i> Télécharger en PDF
                        </a>
                    </div>
        </div>

       
        </div>
    </div>

</body>


</html>