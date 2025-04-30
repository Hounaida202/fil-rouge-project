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
                <a href="" class="hover:text-blue-200 font-medium block">Home</a>
                <a href="" class="hover:text-blue-200 font-medium block">Historique</a>
                <a href="" class="hover:text-blue-200 font-medium block">Favoris</a>
                <a href="" class="hover:text-blue-200 font-medium block">Notification</a>
            </div>
            <div  class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>
<div class="container mx-auto px-4 py-8 max-w-4xl relative">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Publications disponibles</h1>
            <a href="{{route('formulaire')}}" class="bg-[#18534F] hover:bg-[#143B39] text-white py-1.5 px-3 rounded font-medium transition text-sm">
                <i class="fas fa-plus mr-1"></i>Créer une publication
            </a>
        </div>
        <!-- -------qulque chose ici -->
        <div class="space-y-6">
            @foreach($publications as $publication)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-4 border-b flex items-center gap-4">
            <img src="{{$publication->user->image}}" alt="" class="w-14 h-14 rounded-full object-cover">
            <div>
                <h3 class="font-bold text-lg">{{$publication->user->name}}</h3>
                <div class="flex items-center gap-3 text-gray-600 text-sm">
                    <span>{{$publication->user->email}}</span>
                    <span class="px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full">{{$publication->user->role}}</span>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-bold">{{$publication->titre}}</h2>
                @if($publication->etat=='expiré')
                <span class="px-3 py-1 bg-red-100 text-red-800 rounded-full font-medium">{{$publication->etat}}</span>
                @else
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full font-medium">{{$publication->etat}}</span>
                @endif
            </div>
            @if($publication->image!=null)
                    <div class="w-96 mx-auto mb-8 rounded-lg overflow-hidden border">
                        <img src="{{asset('storage/'.$publication->image)}}" alt="Image du transport" class="w-full h-auto object-cover">
                    </div>
                    @endif
            <div class="flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 mb-2">
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-map-marker-alt text-[#18534F] w-5"></i>
                        <span class="font-medium">Ville de départ:</span> {{$publication->ville_depart}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-calendar text-[#18534F] w-5"></i>
                        <span class="font-medium">Date:</span> {{$publication->date_depart}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-tag text-[#18534F] w-5"></i>
                        <span class="font-medium">Type:</span> {{$publication->type}}
                    </p>
                </div>
                <div class="w-full md:w-1/2 mb-2">
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-map-marker-alt text-[#18534F] w-5"></i>
                        <span class="font-medium">Ville d'arrivé:</span> {{$publication->ville_arrivee}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-weight-hanging text-[#18534F] w-5"></i>
                        <span class="font-medium">Quantité max:</span> {{$publication->poids}}
                    </p>
                    <p class="flex items-center gap-2 mb-2">
                        <i class="fas fa-money-bill-wave text-[#18534F] w-5"></i>
                        <span class="font-medium">Prix:</span> {{$publication->prix}}
                    </p>
                </div>
            </div>
            <div class="mb-6">
                <h4 class="font-medium mb-2">Description:</h4>
                <p class="text-gray-700">{{$publication->description}}
                </p>
            </div>
            @if($publication->etat=='en cours')
            <div class="flex gap-3 justify-center">
                <div >
                    <button onclick="OpenModal('{{$publication->id}}')" class="px-4 py-2 bg-[#18534F] hover:bg-[#143B39] text-white rounded font-medium transition text-sm">
                        <i class="fas fa-bookmark mr-1"></i>Réserver
                    </button>
                </div>
                <form action="{{route('ajouterFavoris',$publication->id)}}" method="POST">
                    @csrf  
                    <button class="px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition text-sm">
                        <i class="far fa-clock mr-1"></i>Enregistrer
                    </button>
                </form>
            </div>
            @else
                   <div class="flex gap-3 justify-center opacity-60">
                        <button disabled class="px-4 py-2 bg-gray-500 text-white rounded font-medium cursor-not-allowed text-sm">
                            <i class="fas fa-bookmark mr-1"></i>Réserver
                        </button>
                        <button disabled class="px-4 py-2 border border-gray-500 text-gray-500 rounded font-medium cursor-not-allowed text-sm">
                            <i class="far fa-clock mr-1"></i>Enregistrer
                        </button>
                    </div>
            @endif
        </div>

        <div id="modal-{{$publication->id}}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" style="display: none;">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full mx-4 max-h-[90vh] overflow-y-auto">
                <div class="p-4 border-b bg-[#18534F] text-white flex justify-between items-center rounded-t-lg">
                    <h3 class="font-bold text-lg">Confirmation de réservation</h3>
                    <button onclick="closeModal('{{$publication->id}}')" class="text-white hover:text-gray-200 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="p-5">
                    <div class="mb-5">
                        <label for="localisation" class="block text-sm font-medium text-gray-700 mb-1">Localisation exacte pour le rendez-vous</label>
                        <input type="text" id="localisation" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Adresse complète où le transporteur vous retrouvera">
                    </div>
                    <div class="border-t pt-4 flex justify-between items-center">
                        <button onclick="closeModal('{{$publication->id}}')"  class=" annuler px-3 py-1.5 border border-gray-300 text-gray-700 rounded font-medium transition text-sm hover:bg-gray-100">
                            Annuler
                        </button>
                        <button class="px-4 py-1.5 bg-[#18534F] hover:bg-[#143B39] text-white rounded font-medium transition text-sm">
                            Aller au paiement <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    </div>
</body>
<script>
        // let reserverBtn=document.getElementById('reserver');
        // let modal=document.getElementById('modal');
        // let annuler=document.querySelector('.annuler');
        // reserverBtn.addEventListener('click',function(){
        //         modal.style.display='flex';
        // });
        // annuler.addEventListener('click',function(){
        //         modal.style.display='none';
        // });
function OpenModal(id){
    document.getElementById('modal-'+ id).style.display='flex';
}
function closeModal(id){
    document.getElementById('modal-'+ id).style.display='none';
}

        
    </script>
</html>