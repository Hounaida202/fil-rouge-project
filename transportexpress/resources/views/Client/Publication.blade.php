<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransportExpress - Ajouter une Publication</title>
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
                <a href="{{route('publications')}}" class="hover:text-blue-200 font-medium block">Home</a>
                <a href="" class="hover:text-blue-200 font-medium block">Historique</a>
                <a href="" class="hover:text-blue-200 font-medium block">Favoris</a>
                <a href="" class="hover:text-blue-200 font-medium block">Notifications</a>
            </div>
            <div class="hidden md:flex items-center space-x-3 mt-4 md:mt-0">
                <span>{{ Auth::user()->name }}</span>
                <img src="https://img.freepik.com/photos-premium/personnage-tres-mignon-nuage-personnage-enfant-mignon_454018-1392.jpg" alt="" class="w-8 h-8  rounded-full ">
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Ajouter une publication</h1>
            <a href="{{route('publications')}}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 py-1.5 px-3 rounded font-medium transition text-sm">
                <i class="fas fa-arrow-left mr-1"></i>Retour
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <form action="{{route('ajouterPublication')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre de la publication*</label>
                    <input type="text" id="titre" name="titre" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Ex: Transport de meubles">
                </div>

                <div class="mb-5">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image de la publication</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                        <input type="file" id="image" name="image" accept="image/*" class="hidden">
                        <label for="image" class="cursor-pointer flex flex-col items-center justify-center">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <span class="text-sm text-gray-500">Cliquez pour sélectionner une image</span>
                            <span class="text-xs text-gray-400 mt-1">(Format recommandé: JPG, PNG - Max 2MB)</span>
                        </label>
                        <div id="image-preview" class="hidden mt-3">
                            <img src="" alt="Aperçu" class="max-h-40 mx-auto rounded">
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-5">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="ville_depart" class="block text-sm font-medium text-gray-700 mb-1">Ville de départ*</label>
                        <select id="ville_depart" name="ville_depart" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                            <option value="">Sélectionner une ville</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Fès">Fès</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Tanger">Tanger</option>
                            <!-- Autres villes -->
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label for="ville_arrivee" class="block text-sm font-medium text-gray-700 mb-1">Ville d'arrivée*</label>
                        <select id="ville_arrivee" name="ville_arrivee" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                            <option value="">Sélectionner une ville</option>
                            <option value="Agadir">Agadir</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Fès">Fès</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Tanger">Tanger</option>
                            <!-- Autres villes -->
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-5">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="adresse_depart" class="block text-sm font-medium text-gray-700 mb-1">Adresse de départ*</label>
                        <input type="text" id="adresse_depart" name="adresse_depart" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Adresse complète du point de départ">
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label for="adresse_arrivee" class="block text-sm font-medium text-gray-700 mb-1">Adresse d'arrivée*</label>
                        <input type="text" id="adresse_arrivee" name="adresse_arrivee" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Adresse complète du point d'arrivée">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-5">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="date_depart" class="block text-sm font-medium text-gray-700 mb-1">Date de départ*</label>
                        <input type="date" id="date_depart" name="date_depart" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de marchandises*</label>
                        <select id="type" name="type" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                            <option value="">Sélectionner un type</option>
                            <option value="Fragile">Fragile</option>
                            <option value="Lourd">Lourd</option>
                            <option value="Standard">Standard</option>
                            <option value="Périssable">Périssable</option>
                            <option value="Liquide">Liquide</option>
                            <option value="Matériel électronique">Matériel électronique</option>
                            <option value="Meubles">Meubles</option>
                            <!-- Autres types -->
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2 mb-5">
                    <div class="w-full md:w-1/2 px-2 mb-4 md:mb-0">
                        <label for="poids" class="block text-sm font-medium text-gray-700 mb-1">Poids maximum (kg)*</label>
                        <input type="number" id="poids" name="poids" min="1" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Ex: 500">
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix (DH)*</label>
                        <input type="number" id="prix" name="prix" min="0" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Ex: 1500">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="localisation" class="block text-sm font-medium text-gray-700 mb-1">Localisation exacte (facultatif)</label>
                    <input type="text" id="localisation" name="localisation" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Coordonnées GPS ou point de repère spécifique">
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description détaillée*</label>
                    <textarea id="description" name="description" rows="4" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm" placeholder="Décrivez votre besoin de transport en détail..."></textarea>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-[#18534F] hover:bg-[#143B39] text-white font-medium py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-[#18534F] focus:ring-opacity-50 transition text-sm">
                        <i class="fas fa-plus-circle mr-1"></i>Publier l'annonce
                    </button>
                </div>
            </form>
        </div>
    </div>

  
</body>
</html>