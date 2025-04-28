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
        <nav class="bg-[#18534F] text-white p-4 ">     
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
            <div class="flex space-x-2">
                <a href="{{route('connexion')}}" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100">Connexion</a>
                <a href="{{route('inscription')}}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Inscription</a>
            </div>
        </div>
        <!-- ------------------------------------------------- -->
        
        <div class="relative">
            <!-- <div class="absolute inset-0 bg-gray-800 opacity-50">hbhjb</div> -->
            <div class="h-96 bg-center bg-cover" style="background-image: url">
                <div class="container mx-auto h-full flex items-center relative">
                    <div class="text-white p-8 max-w-lg">
                        <h1 class="text-4xl font-bold mb-4">Transport de marchandises fiable et rapide</h1>
                        <p class="text-xl mb-6">Solutions logistiques adaptées à tous vos besoins de transport</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- --------------------------------------------------- -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8">Nos Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- ----------- -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    
                    <h3 class="text-xl font-bold mb-2">Transport National</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, omnis?</p>
                </div>
                <!----------- -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    
                    <h3 class="text-xl font-bold mb-2">Transport International</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, incidunt!</p>
                </div>
                <!------------->
                <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition">
                    
                    <h3 class="text-xl font-bold mb-2">Suivi en Temps Réel</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, ratione?</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------------------------- -->
    <section class="py-12  bg-gray-100">
    <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Pourquoi Nous Choisir</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex items-start">
                    
                    <div>
                        <h3 class="text-xl font-bold mb-2">Rapidité</h3>
                        <p class="text-gray-600">Livraison dans les délais promis, toujours à l'heure.</p>
                    </div>
                </div>
                <div class="flex items-start">
                   
                    <div>
                        <h3 class="text-xl font-bold mb-2">Sécurité</h3>
                        <p class="text-gray-600">Vos marchandises sont entre de bonnes mains, sécurisées pendant tout le trajet.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    
                    <div>
                        <h3 class="text-xl font-bold mb-2">Service Client</h3>
                        <p class="text-gray-600">Une équipe dédiée à votre écoute pour répondre à toutes vos questions.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    
                    <div>
                        <h3 class="text-xl font-bold mb-2">Prix Compétitifs</h3>
                        <p class="text-gray-600">Des tarifs transparents et adaptés à votre budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- --------------------------------------------- -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Ce Que Disent Nos Clients</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    
                    <p class="text-gray-600 mb-4">"Service impeccable ! Livraison rapide et suivi en temps réel très pratique. Je recommande vivement."</p>
                    <p class="font-bold">Marie D. - Entreprise de mode</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    
                    <p class="text-gray-600 mb-4">"Excellent rapport qualité-prix. Nos produits arrivent toujours à destination en parfait état."</p>
                    <p class="font-bold">Thomas L. - Distributeur alimentaire</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                   
                    <p class="text-gray-600 mb-4">"Le service client est réactif et à l'écoute. Très satisfait de notre collaboration depuis 3 ans."</p>
                    <p class="font-bold">Sophie M. - Commerce en ligne</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------------------------ -->
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

   <!-- -------------------------------------------------------- -->
</body>
</html>