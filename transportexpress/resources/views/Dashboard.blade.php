<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
        <nav class="bg-blue-600 text-white p-4 shadow-md">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="flex items-center">
                        <span class="font-bold text-xl">TransportExpress Admin</span>
                    </div>
                    <div class="flex space-x-6">
                        <a href="" class="hover:text-blue-200 font-medium">Dashboard</a>
                        <a href="" class="hover:text-blue-200 font-medium">Comptes</a>
                        <a href="" class="hover:text-blue-200 font-medium">Réclamations</a>
                        <a href="" class="hover:text-blue-200 font-medium">Statistiques</a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span>Admin</span>
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold">
                            A
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ----- -->
            <div class="container mx-auto px-4 py-8">
        
                <div class="flex justify-between items-center mb-6">
                  <h1 class="text-2xl font-bold">Gestion des Comptes</h1>           
                </div>
                    <!-- une liste pour les inscriptions recus -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                        <div class="p-4 bg-gray-50 border-b border-gray-200">
                            <h2 class="font-semibold text-gray-800">Inscriptions en attente de validation</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <!-- ------ -->
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Nom & Prénom
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Email
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Type
                                                        </th>
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Ville
                                                        </th>
                                                    
                                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Actions
                                                        </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="flex items-center">
                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            hbfchj
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <div class="text-sm text-gray-900">mlorem</div>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap">
                                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold  ">
                                                                    lorem
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                Lyon
                                                            </td>
                                                        
                                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                                <div class="flex space-x-2">
                                                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                                                        Valider
                                                                    </button>
                                                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                                        Refuser
                                                                    </button>
                                                                
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                            </table>
                        </div>
                    </div> 
                    <!-- -------------- -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">Comptes validés récents</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom & Prénom
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ville
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Statut
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            lorem
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">hdhegbdje</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    lorem
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                lorem
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    lorem
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex space-x-2">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Désactiver
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Supprimer
                                    </button>
                                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded">
                                        Détails
                                    </button>
                                </div>
                            </td>
                        </tr>


                       
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-between items-center">
                <div class="flex items-center">
                    <span class="text-sm text-gray-700">
                        Afficher 
                        <select class="mx-1 bg-gray-50 border-gray-300 focus:ring-blue-500 focus:border-blue-500 rounded-md">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        entrées
                    </span>
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Précédent
                    </button>
                    <button class="px-4 py-2 border border-blue-500 rounded-md bg-blue-500 text-sm font-medium text-white hover:bg-blue-600">
                        1
                    </button>
                    <button class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        2
                    </button>
                    <button class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        3
                    </button>
                    <button class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Suivant
                    </button>
                </div>
            </div>
        </div>
<!-- ~~~~~~~~~~ -->
        
       
            </div>
    
</body>
</html>