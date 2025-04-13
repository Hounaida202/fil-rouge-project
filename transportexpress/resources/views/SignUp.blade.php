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
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-bold text-center mb-8">Créer votre compte</h1>
                
                <form action="" method="POST">
   
                        <div class="w-full">
                            <label for="nom" class="text-gray-700 font-medium mb-2">Nom</label>
                            <input type="text" id="nom" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none " required>
                        </div>
                    <!-- -------------- -->
                        <div class="mb-6">
                            <label for="email" class=" text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" oninput="validateEmail()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    <!-- -------------- -->
                        <div class="mb-6">
                            <label for="tel" class=" text-gray-700 font-medium mb-2">Numéro de téléphone</label>
                            <input type="tel" id="tel" name="tel" oninput="validateTel()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="password" class=" text-gray-700 font-medium mb-2">Mot de passe</label>
                            <input type="password" id="password" name="password" oninput="validatePassword()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="password_confirmation" class=" text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="ville" class="block text-gray-700 font-medium mb-2">Ville</label>
                            <input type="text" id="ville" name="ville" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    <!-- -------------- -->
                        <div class="mb-8">
                            <div class="block text-gray-700 font-medium mb-2">Type de compte</div>
                              <div class="flex flex-col md:flex-row gap-4">
                                     <!-- pour le client -->
                                <div class=" border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-blue-500 ">
                                    <div class="flex items-start gap-2">
                                        <input type="radio" id="client" name="role" value="Client" class="mt-1" required>
                                        <div>
                                            <label for="client" class="font-medium cursor-pointer">Client</label>
                                            <p class="text-sm text-gray-500">Vous recherchez des services de transport</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- pour le transporteur -->
                                <div class=" border border-gray-300 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-colors">
                                    <div class="flex items-start gap-2">
                                        <input type="radio" id="transporteur" name="role" value="Transporteur" class="mt-1" required>
                                        <div>
                                            <label for="transporteur" class="font-medium cursor-pointer">Transporteur</label>
                                            <p class="text-sm text-gray-500">Vous proposez des services de transport</p>
                                        </div>
                                    </div>
                                </div>
            
                              </div>
                        </div>
                    <!-- ---------------------- -->

                </form>

                  <div class="text-center mt-6">
                    <p class="text-gray-600">
                        Vous avez déjà un compte ? <a href="#" class="text-blue-600 hover:underline">Se connecter</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>