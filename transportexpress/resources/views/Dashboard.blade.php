<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
    
    </style>
</head>
<body class="bg-gray-100 font-sans static">
   
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
        <div class="flex justify-between items-center mb-6 flex-wrap">
          <h1 class="text-xl sm:text-2xl font-bold mb-2 sm:mb-0">Gestion des Comptes</h1>           
        </div>
        
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">Inscriptions en attente de validation</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom & Prénom
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                Email
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Type
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Ville
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>



                    @foreach($enAttentes as $enAttente)
                    @csrf
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                        <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0 sm:ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                        {{ $enAttente->name }}
                                        </div>
                                        <div class="text-xs text-gray-500 sm:hidden">
                                        {{ $enAttente->email }} · {{ $enAttente->ville }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                                <div class="text-sm text-gray-900">{{ $enAttente->email }}</div>
                            </td>
                            <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    @if($enAttente->role === 'Transporteur') bg-yellow-100 text-yellow-800 
                    @else bg-green-100 text-green-800 @endif">
                    {{$enAttente->role}}
                </span>
                            </td>
                            <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                            {{ $enAttente->ville }}
                            </td>
                            <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm">


                                <div class="flex space-x-1 sm:space-x-2">
                                <form method="POST" action="{{ route('Valide', $enAttente->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" value="Valide" class="bg-green-500 hover:bg-green-600 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                        Valider
                                    </button>
                                </form>
                                    <form method="POST" action="{{route('Invalide',$enAttente->id)}}">
                                    @csrf
                                    @method('PUT')   
                                    <button type="submit" value="Invalide" class="bg-orange-500 hover:bg-yellow-600 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                            Invalider
                                    </button>
                                    </form>
                                    <a href="{{route('preuve',$enAttente->id)}}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                        Détails
                                    </a>
                                </div>


                            </td>
                        </tr>
                    </tbody>
                    @endforeach



                </table>
            </div>
        </div> 

        <!-- -----comptes validés a gerer----- -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">Comptes validés récents</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom & Prénom
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                Email
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Type
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Ville
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                Statut
                            </th>
                            <th scope="col" class="px-3 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    @foreach($Actifs as $actif)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-3 sm:px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-0 sm:ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$actif->name}}
                        </div>
                        <div class="text-xs text-gray-500 sm:hidden">
                            {{$actif->email}} · {{$actif->role}}
                        </div>
                    </div>
                </div>
            </td>

            <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                <div class="text-sm text-gray-900">{{$actif->email}}</div>
            </td>
            <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden sm:table-cell">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    @if($actif->role === 'Transporteur') bg-yellow-100 text-yellow-800 
                    @else bg-green-100 text-green-800 @endif">
                    {{$actif->role}}
                </span>
            </td>
            <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                {{$actif->ville}}
            </td>
            <td class="px-3 sm:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold">
                    {{$actif->compte}}
                </span>
            </td>
            <td class="px-3 sm:px-6 py-4 whitespace-nowrap text-sm">
                <div class="flex flex-col sm:flex-row space-y-1 sm:space-y-0 sm:space-x-2">
                     @if($actif->compte=='Actif')
                    <button  class=" desactive-btn w-24 bg-orange-500 hover:bg-yellow-600  text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm" onclick="openModalDesactivation('{{ $actif->id }}')">
                        Desactiver
                    </button>
                     @else
                     <form method="POST" action="{{ route('activer', $actif->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-500 w-24 hover:bg-green-600 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                            Activer
                                        </button>
                     </form>
                    @endif
                    <button class="delete-btn bg-red-500 hover:bg-red-600 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm" onclick="openModal('{{ $actif->id }}')" >
                        Supprimer
                    </button>
                    <a href="{{ route('detailles', $actif->id) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                        Détails
                    </a>
                </div>
            </td>
        </tr>
        <!-- Modal de suppression -->
        <div id="modal-{{ $actif->id }}" class="modal" style="display:none;">
            <div class="modal-content bg-white rounded-xl shadow-2xl p-6 w-[600px] mx-auto">
                <div class="flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-gray-800">Suppression de compte</h2>
                </div>

                <p class="text-center font-medium text-lg text-gray-700 mb-3">Veuillez indiquer les informations suivantes :</p>
                
                <form action="/supprimer/{{ $actif->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <input name="titre" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre de la suppression (facultatif)">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Expliquez pourquoi vous souhaitez supprimer ce compte..."></textarea>
                    </div>
                    <div class="bg-gray-50 p-2 rounded-md mb-3">
                        <p class="text-gray-700 text-sm text-center">Cette action ne peut pas être annulée.</p>
                    </div>

                    <div class="modal-buttons flex justify-between mt-4">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded text-sm font-medium transition-all duration-200 flex-grow mr-2" onclick="closeModal('{{ $actif->id }}')">
                            Annuler
                        </button>
                        <button type="submit" id="suppression" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm font-medium transition-all duration-200 w-full flex items-center justify-center">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin du Modal de suppression -->
        <!-- Modal de desactivation -->
        <div id="desactivation-{{ $actif->id }}" class="modal" style="display:none;">
            <div class="modal-content bg-white rounded-xl shadow-2xl p-6 w-[600px] mx-auto">
                <div class="flex items-center justify-center mb-4">
                    
                    <h2 class="text-xl font-bold text-gray-800">Vous voulez desactiver ce compte ?</h2>
                </div>

                <p class="text-center font-medium text-lg text-gray-700 mb-3">Veuillez indiquer les informations suivantes :</p>
                
                <form action="/desactiver/{{ $actif->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <input name="titre" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Titre de l'action">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Expliquez pourquoi vous souhaitez desactiver ce compte"></textarea>
                    </div>
                    <div class="modal-buttons flex justify-between mt-4">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded text-sm font-medium transition-all duration-200 flex-grow mr-2" onclick="closeModalDesactivation('{{ $actif->id }}')">
                            Annuler
                        </button>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-medium transition-all duration-200 w-full flex items-center justify-center">
                            Confirmer
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin du Modal de desactivation -->

                        </tbody>
                    @endforeach
                </table>
            </div>

            <div class="bg-gray-50 px-3 sm:px-6 py-3 flex flex-col sm:flex-row justify-between items-center space-y-3 sm:space-y-0">
                <div class="flex items-center">
                    <form method="GET" action="{{route('dashboard')}}">
                        <label for="per_page">Choisissez le nombre de comptes par page :</label>
                        <select name="per_page" id="per_page" onchange="this.form.submit()">
                            <option value="3"{{request('per_page') == 3 ?'selected' :'' }}>3 par page</option>
                            <option value="5"{{request('per_page') == 5 ?'selected' :'' }}>5 par page</option>
                            <option value="7"{{request('per_page') == 7 ? 'selected' :'' }}>7 par page</option>
                        </select>
                    </form>
                </div>
                <div class="flex gap-1 sm:gap-2">
                    {{$Actifs->links()}}
                </div>
            </div>
        </div>
    </div>
     <!-- -------------------------------------- -->
     <script>
        
     function openModal(id){
            document.getElementById('modal-'+id).style.display='block';}
        
    function closeModal(id){
        document.getElementById('modal-'+id).style.display='none';
    }
    function openModalDesactivation(id){
            document.getElementById('desactivation-'+id).style.display='block';}
    
    function closeModalDesactivation(id){
        document.getElementById('desactivation-'+id).style.display='none';
    }
   
</script>


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
</body>

</html>