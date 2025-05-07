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
    <section class="py-16">
    <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto">
                 <!-- -----carte de succes -->
                <div class="bg-green-100 border border-green-400 rounded-lg shadow-md p-8 text-center">
                    <div class="flex justify-center mb-6">
                        <!-- ----un petit cute icone de succes -->
                        <div class="bg-green-500 rounded-full p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-green-800 mb-4">Inscription réussie !</h2>

                    <p class="text-green-700 mb-6">
                        Votre demande d'inscription a bien été enregistrée. Vous devez maintenant attendre que votre demande soit acceptée par notre équipe avant de pouvoir vous connecter.
                    </p>

                    <a href="{{route('accueil')}}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                        Retour à l'accueil
                    </a>
                    
                </div>
                <!-- --------- -->
            </div>
        </div>
    </section>
</body>
</html>