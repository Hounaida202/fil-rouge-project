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
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
                <h1 class="text-3xl font-bold text-center mb-8">Créer votre compte</h1>
                
                <form action="{{ route('register') }}" method="POST">

                   
                    
                    <!-- Bouton de soumission -->
                    <input type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Créer mon compte</input>
                </form>
                
                <!-- Lien pour se connecter -->
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