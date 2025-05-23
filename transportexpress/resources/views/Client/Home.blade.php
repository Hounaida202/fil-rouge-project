<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Publications</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
                        <span class="flex h-5 w-5 items-center justify-center bg-red-500 text-white text-xs rounded-full absolute -top-2 -right-4">{{$countNotif}}</span>
                    </button>
                    <!-- Dropdown Notifications -->
                    <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg z-50 max-h-96 overflow-y-auto" style="max-height: 500px;">
                        <div class="p-3 border-b bg-[#18534F] text-white flex justify-between items-center rounded-t-md">
                            <h3 class="font-medium">Notifications</h3>
                        </div>
                        <div>
                            <!-- Notification 1 -->
                             <!-- pour les notifications de transporteur -->
                             @if(Auth::user() && Auth::user()->role == 'Transporteur')
                             <div>
                            @forelse($notifications->sortByDesc('created_at') as $notification)
                            @if($notification->type==="reservation")
                                <a href="{{ route('pubreserver', ['reservation_id' => $notification->reservation->id, 'notification_id' => $notification->id]) }}">
                                    <div class="p-4 border-b hover:bg-gray-50 text-black {{ $notification->is_read ? 'bg-white' : 'bg-gray-200' }}">
                                        <div class="flex">
                                            <img src=" {{asset('storage/'.$notification->auteur->image)}}" alt="User" class="h-10 w-10 rounded-full mr-3">
                                            <div>  
                                                <p class="text-sm">
                                                    <span class="font-medium">{{ $notification->auteur->name }}</span>
                                                    a fait une réservation pour l'un de vos services
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">Il y a 5 minutes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                    @else
                                    <a href="{{ route('pubreserver', ['reservation_id' => $notification->reservation->id, 'notification_id' => $notification->id]) }}">
                                        <div class="p-4 border-b hover:bg-gray-50 text-black {{ $notification->is_read ? 'bg-white' : 'bg-gray-200' }}">
                                            <div class="flex">
                                                <img src=" {{asset('storage/'.$notification->auteur->image)}}" alt="User" class="h-10 w-10 rounded-full mr-3">
                                                <div>  
                                                    <p class="text-sm">
                                                        <span class="font-medium">{{ $notification->auteur->name }}</span>
                                                        a accepter votre proposition , veuillez importer votre document des informations
                                                    </p>
                                                    <p class="text-xs text-gray-500 mt-1">Il y a 5 minutes</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                @empty
                                    <p class="text-gray-500 m-8">Pas encore des notifications.</p>
                                @endforelse
                            </div>
                            @else
                            <!-- Notification pour le client  -->

                            <div>
                            @forelse($notifications->sortByDesc('created_at') as $notification)
                            <a href="{{ route('pubproposer', ['notification_id' => $notification->id, 'transport_id' => $notification->auteur->id]) }}">
                            <div class="p-4 border-b hover:bg-gray-50 text-black {{ $notification->is_read ? 'bg-white' : 'bg-gray-200' }}">
                                        <div class="flex">
                                            <img src=" {{asset('storage/'.$notification->auteur->image)}}" alt="User" class="h-10 w-10 rounded-full mr-3">
                                            <div>
                                                <p class="text-sm">
                                                    <span class="font-medium">{{ $notification->auteur->name }}</span>
                                                    vous a proposé un service

                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">Il y a 5 minutes</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                    <p class="text-gray-500 m-8">Pas encore des notifications.</p>
                                @endforelse
                            </div>
                            @endif
                            <!-- Notification 3 -->
                            
                            <!-- Notification 4 -->
                            
                            <!-- Notification 5 -->
                            
                        </div>
                    </div>




                </div>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class="w-8 h-8 rounded-full mr-4">
                <form action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <i class="fas fa-power-off" style="font-size: 20px; color: #333;"></i>
                    </button>
                </form>
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
        <form method="GET" action="{{ route('filtrerPublications') }}" class="bg-white rounded shadow-md p-3 mb-6">
    <div class="flex flex-wrap gap-3">
            <div class="w-full md:w-auto">
                    <label class="block text-sm text-gray-600 mb-1">Ville</label>
                    <select name="ville_depart"  class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                        <option value="">Toutes les villes</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Al Hoceïma">Al Hoceïma</option>
                        <option value="Azilal">Azilal</option>
                        <option value="Beni Mellal">Beni Mellal</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Dakhla">Dakhla</option>
                        <option value="El Jadida">El Jadida</option>
                        <option value="Errachidia">Errachidia</option>
                        <option value="Essaouira">Essaouira</option>
                        <option value="Fès">Fès</option>
                        <option value="Guelmim">Guelmim</option>
                        <option value="Ifrane">Ifrane</option>
                        <option value="Kénitra">Kénitra</option>
                        <option value="Khénifra">Khénifra</option>
                        <option value="Khouribga">Khouribga</option>
                        <option value="Laâyoune">Laâyoune</option>
                        <option value="Larache">Larache</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Meknès">Meknès</option>
                        <option value="Mohammédia">Mohammédia</option>
                        <option value="Nador">Nador</option>
                        <option value="Ouarzazate">Ouarzazate</option>
                        <option value="Oujda">Oujda</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Safi">Safi</option>
                        <option value="Salé">Salé</option>
                        <option value="Settat">Settat</option>
                        <option value="Sidi Bennour">Sidi Bennour</option>
                        <option value="Tan-Tan">Tan-Tan</option>
                        <option value="Tanger">Tanger</option>
                        <option value="Taourirt">Taourirt</option>
                        <option value="Taroudant">Taroudant</option>
                        <option value="Taza">Taza</option>
                        <option value="Tétouan">Tétouan</option>
                        <option value="Tiznit">Tiznit</option>
                    </select>

                </div>
                <div class="w-full md:w-auto">
                    <label class="block text-sm text-gray-600 mb-1">Type</label>
                    <select name="type"  class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                        <option value="">Tous les types</option>
                        <option value="Fragile">Fragile</option>
                        <option value="Lourd">Lourd</option>
                        <option value="Standard">Standard</option>
                        <option value="Périssable">Périssable</option>
                        <option value="Liquide">Liquide</option>
                        <option value="Chimique">Chimique</option>
                        <option value="Matériel électronique">Matériel électronique</option>
                        <option value="Animaux vivants">Animaux vivants</option>
                        <option value="Produits médicaux">Produits médicaux</option>
                        <option value="Matériaux dangereux">Matériaux dangereux</option>
                        <option value="Textile">Textile</option>
                        <option value="Meubles">Meubles</option>
                        <option value="Aliments secs">Aliments secs</option>
                        <option value="Véhicules">Véhicules</option>
                    </select>
                </div>
                <div class="w-full md:w-auto">
                    <label class="block text-sm text-gray-600 mb-1">Statut</label>
                    <select name="etat"  class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                        <option value="">Tous</option>
                        <option value="en cours">En cours</option>
                        <option value="expiré">Expiré</option>
                    </select>
                </div>
                <div class="w-full md:w-auto flex items-end">
                    <button class="bg-[#18534F] hover:bg-[#143B39] text-white px-4 py-1.5 rounded focus:outline-none text-sm">
                        Filtrer
                    </button>
                </div>
                </div>
                </form>
                <div class="space-y-6">
            @foreach($publications->sortByDesc('created_at') as $publication)
            @if(!\App\Http\Controllers\PublicationController::siExiste($publication->id))
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-4 border-b flex items-center gap-4">
            <img src="{{asset('storage/'.$publication->user->image)}}" alt="" class="w-14 h-14 rounded-full object-cover">
            <div>
                <a href="{{route('autreprofile',$publication->user->id)}}">
                    <h3 class="font-bold text-lg">{{$publication->user->name}}</h3>
                </a>
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
                    <div class="w-96 mx-auto mb-8 rounded-lg overflow-hidden ">
                        <img src="{{asset('storage/'.$publication->image)}}" alt="" class="w-full h-auto object-cover">
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
                    @if($publication->user->role =='Client')
          <!-- ----------------pour la page de transporteur----------------- -->
                    <div class="flex gap-3 justify-center">
                <div>
                @if(\App\Http\Controllers\NotificationController::isEnvoyer($publication->id))
                    <button disabled class="px-4 py-2 bg-[#18534F] rounded  text-sm px-4 py-2 border border-gray-500 text-gray-500 rounded font-medium cursor-not-allowed ">
                    <i class="fas fa-check mr-1"></i>Proposition envoyé
                    </button>
                @else
                <form action="{{ route('proposition', [$publication->id, $publication->user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-[#18534F] hover:bg-[#143B39] text-white rounded font-medium transition text-sm">
                        <i class="fas fa-bookmark mr-1"></i>Envoyer une proposition
                    </button>
                </form>
                @endif
                </div>
                @if(\App\Http\Controllers\FavorisController::siExiste($publication->id))
                <form action="{{ route('retirerFavoris', $publication->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button class="px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition text-sm">
                        <i class="far fa-clock mr-1"></i>Retiré des favoris
                    </button>
                </form>
                  @else
                  @if(\App\Http\Controllers\NotificationController::isEnvoyer($publication->id))
                  <button disabled class=" px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition cursor-not-allowed text-sm">
                        <i class="far fa-clock mr-1"></i>Enregistrer
                    </button>
                
                @else
                <form action="{{route('ajouterFavoris',$publication->id)}}" method="POST">
                    @csrf  
                    <button class="px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition text-sm">
                        <i class="far fa-clock mr-1"></i>Enregistrer
                    </button>
                </form>
                @endif
                @endif
            </div>
      <!-- ----------------------------------------- -->

                    @else
            <div class="flex gap-3 justify-center">
                <div >
                    <button onclick="OpenModal('{{$publication->id}}')" class="px-4 py-2 bg-[#18534F] hover:bg-[#143B39] text-white rounded font-medium transition text-sm">
                        <i class="fas fa-bookmark mr-1"></i>Réserver
                    </button>
                </div>
                @if(\App\Http\Controllers\FavorisController::siExiste($publication->id))
                    <button class="px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition text-sm">
                        <i class="far fa-clock mr-1"></i>Retiré depuis favoris
                    </button>
                @else
                <form action="{{route('ajouterFavoris',$publication->id)}}" method="POST">
                    @csrf  
                    <button class="px-4 py-2 border border-[#18534F] text-[#18534F] hover:bg-gray-50 rounded font-medium transition text-sm">
                        <i class="far fa-clock mr-1"></i>Enregistrer
                    </button>
                </form>
                @endif
            </div>
            @endif
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
                        <label for="localisation"  class="block text-sm font-medium text-gray-700 mb-1">Localisation exacte pour le rendez-vous</label>
                        <input type="text" name="localisation" id="localisation" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Adresse complète où le transporteur vous retrouvera">
                    </div>
                    <div class="border-t pt-4 flex justify-between items-center">
                        <button onclick="closeModal('{{$publication->id}}')"  class=" annuler px-3 py-1.5 border border-gray-300 text-gray-700 rounded font-medium transition text-sm hover:bg-gray-100">
                            Annuler
                        </button>
                        <form action="{{ route('reserver', [$publication->id, $publication->user->id]) }}" method="POST">
                        @csrf
                            <button type="submit"  class="px-4 py-1.5 bg-[#18534F] hover:bg-[#143B39] text-white rounded font-medium transition text-sm">
                                Reserver <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ---------deuxiem modal pour le transporteur------------- -->
            
             <!-- --------------------------------------------- -->
        </div>
    </div>
    @endif
    @endforeach
</div>
    </div>
</body>


<script>
    document.getElementById('menuButton').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('hidden');
        }
    });

    document.getElementById('notificationButton').addEventListener('click', function(e) {
        e.stopPropagation();
        const dropdown = document.getElementById('notificationDropdown');
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('notificationDropdown');
        if (!dropdown.classList.contains('hidden') && !e.target.closest('#notificationButton')) {
            dropdown.classList.add('hidden');
        }
    });

    function OpenModal(id){
        document.getElementById('modal-'+ id).style.display='flex';
    }
    
    function closeModal(id){
        document.getElementById('modal-'+ id).style.display='none';
    }
    function OpenModal2(id){
        document.getElementById('modal2-'+ id).style.display='flex';
    }
    
    function closeModal2(id){
        document.getElementById('modal2-'+ id).style.display='none';
    }
</script>
</html>