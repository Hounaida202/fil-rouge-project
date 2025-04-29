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
<div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Publications disponibles</h1>
            <a href="" class="bg-[#18534F] hover:bg-[#143B39] text-white py-1.5 px-3 rounded font-medium transition text-sm">
                <i class="fas fa-plus mr-1"></i>Créer une publication
            </a>
        </div>
        <div class="bg-white rounded shadow-md p-3 mb-6">
            <div class="flex flex-wrap gap-3">
            <div class="w-full md:w-auto">
                    <label class="block text-sm text-gray-600 mb-1">Ville</label>
                    <select class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
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
                    <select class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
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
                    <select class="w-full md:w-40 px-2 py-1.5 border rounded focus:outline-none focus:ring-1 focus:ring-[#18534F] text-sm">
                        <option value="">Tous</option>
                        <option value="En cours">En cours</option>
                        <option value="Expiré">Expiré</option>
                    </select>
                </div>
                <div class="w-full md:w-auto flex items-end">
                    <button class="bg-[#18534F] hover:bg-[#143B39] text-white px-4 py-1.5 rounded focus:outline-none text-sm">
                        Filtrer
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>