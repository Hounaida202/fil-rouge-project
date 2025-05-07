<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compte en attente</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
  <section class="py-16">
    <div class="container mx-auto px-4">
      <div class="max-w-lg mx-auto">
        <!-- Carte d'attente de validation -->
        <div class="bg-yellow-100 border border-yellow-400 rounded-lg shadow-md p-8 text-center">
          <div class="flex justify-center mb-6">
            <!-- Icône d'attente -->
            <div class="bg-yellow-400 rounded-full p-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20.5a8.5 8.5 0 100-17 8.5 8.5 0 000 17z" />
              </svg>
            </div>
          </div>

          <h2 class="text-2xl font-bold text-yellow-800 mb-4">Validation en attente</h2>

          <p class="text-yellow-700 mb-6">
            Votre compte a bien été créé, mais il n’est pas encore accepté.<br>
            Nos administrateurs doivent d’abord vérifier vos informations.<br>
            Merci de patienter jusqu'à la validation de votre inscription.
          </p>

          <a href="{{route('accueil')}}" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-600 transition">
            Retour à l'accueil
          </a>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
