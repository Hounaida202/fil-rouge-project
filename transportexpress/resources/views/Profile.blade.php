<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100  font-sans">
<nav class="bg-[#18534F] text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <span class="font-bold text-xl">TransportExpress</span>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="" class="hover:text-blue-200">Accueil</a>
                <a href="" class="hover:text-blue-200">Services</a>
                <a href="" class="hover:text-blue-200">À propos</a>
                <a href="" class="hover:text-blue-200">Contact</a>
            </div>
            <div>
              <a href="" class="">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                  </svg>
              </a>
          </div>
        </div>
    </nav>
    <section class="py-8">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-6">
           <!-- ----------un coté pour le profil et ses commenatirs ---------- -->
            <div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6"> 
                       <div class="bg-[#18534F] p-6">
                            <div class="flex flex-col items-center">
                                <div class="mb-4">
                                    <img src="{{$compte->image}}" alt="" class="rounded-full h-24 w-24 border-4 border-white">
                                </div>
                                <div class="text-center">
                                    <h1 class="text-xl font-bold text-white mb-2">{{$compte->name}}</h1>
                                    <div class="text-blue-200 mb-2"></div>
                                    <div class="flex items-center justify-center">
                                        <div class="text-yellow-400 flex">
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                            <span>★</span>
                                        </div>
                                        <span class="ml-2 text-white"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-bold mb-3 text-gray-700">Informations du compte</h2>
                            
                            <div class="space-y-3">
                                <div>
                                    <div class="text-sm text-gray-500">Email</div>
                                    <div class="font-medium"></div>
                                </div>
                                
                                <div>
                                    <div class="text-sm text-gray-500">Téléphone</div>
                                    <div class="font-medium"></div>
                                </div>

                                <div>
                                    <div class="text-sm text-gray-500">CIN</div>
                                    <div class="font-medium"></div>
                                </div>
                              
                                
                                <div>
                                    <div class="text-sm text-gray-500">Ville</div>
                                    <div class="font-medium"></div>
                                </div>
                                
                                <div>
                                    <div class="text-sm text-gray-500">Membre depuis</div>
                                    <div class="font-medium">le 29</div>
                                </div>
                            </div>
                            <h2 class="text-lg font-bold mb-3 mt-4 text-gray-700">Statistiques</h2>
                            <div class="grid grid-cols-3 gap-2">
                                <div class="p-2 bg-blue-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-blue-600">58</div>
                                    <div class="text-xs text-gray-600">Livraisons</div>
                                </div>
                                <div class="p-2 bg-green-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-green-600">97%</div>
                                    <div class="text-xs text-gray-600">À l'heure</div>
                                </div>
                                <div class="p-2 bg-yellow-50 rounded-lg text-center">
                                    <div class="text-lg font-bold text-yellow-600">3</div>
                                    <div class="text-xs text-gray-600">En cours</div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- ----les commenatires-------- -->
                <div class="bg-white rounded-lg shadow-md p-4">
                        <h2 class="text-lg font-bold mb-4 text-gray-700">Commentaires (nombre ici)</h2>
                        <div class="mb-4 pb-4 border-b border-gray-200">
                            <div class="flex items-start mb-2">
                                <img src="" alt="" class="rounded-full h-8 w-8 mr-2">
                                <div>
                                    <div class="font-bold text-sm"></div>
                                    <div class="text-xs text-gray-500">Posté il y a (le temps ici) </div>
                                </div>
                            </div>
                            <p class="text-gray-700 text-sm">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis omnis veritatis cum unde ad magnam laudantium esse magni exercitationem et.
                            </p>
                        </div>
                    </div>
                 <!-- -------- -->
            </div>
           <!-- -------------------------------------------------------------- -->
            <div>
                <div class="bg-white rounded-lg shadow-md p-6">
                   <h2 class="text-xl font-bold mb-6 text-gray-700">Publications récentes</h2>
                     <div class="mb-8 pb-6 border-b border-gray-200">
                          <!-- les infos de compte auteur et temps -->
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    <img src="" alt="Photo de profil" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <a href="" class="font-semibold text-blue-600 hover:underline"></a>
                                    <p class="text-gray-500 text-sm">Transporteur • Publié il y a 2 heures</p>
                                </div>
                            </div>
                              <h2 class="text-xl font-bold mb-4">Transport de meubles Paris-Lyon</h2>
                              <div class="mb-4">
                                <div>
                                    <div class="space-y-3">
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville de départ :</span>
                                            <span>Paris</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Adresse départ :</span>
                                            <span>15 Rue de la République, 75001</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Ville d'arrivée :</span>
                                            <span>Lyon</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Adresse arrivée :</span>
                                            <span>8 Place Bellecour, 69002</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Date de départ :</span>
                                            <span>15/04/2025</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Type de marchandise :</span>
                                            <span>Meubles</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Poids estimé :</span>
                                            <span>350 kg</span>
                                        </div>
                                        <div class="flex">
                                            <span class="font-medium w-32">Capacité :</span>
                                            <span>800 kg disponible</span>
                                        </div>
                                    </div>
                                </div>
                           </div>
                           <div class="mb-6">
                                <h3 class="font-medium mb-2">Description :</h3>
                                <p class="text-gray-600">
                                    Transport de meubles avec camion 20m³. Espace disponible pour d'autres marchandises. 
                                    Chargement prévu le matin du 15 avril, départ vers 10h. Livraison prévue à Lyon dans l'après-midi vers 16h.
                                    Possibilité de faire des arrêts intermédiaires sur le trajet.
                                </p>
                            </div>
                            <div class="mb-6">
                                <img src="" alt="" class="w-full h-auto object-cover rounded-md">
                            </div>
                     </div>
                </div>
            </div>
          <!-- ------la fin de partie des publications---- -->

        </div>
      </div>
    </section>


</body>
</html>