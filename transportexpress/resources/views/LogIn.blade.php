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
           <div class="max-w-md mx-auto bg-white rounded-lg  p-8">
                <h1 class="text-3xl text-[#18534F] font-bold text-center mb-8">Connectez-vous</h1>
                <form action="{{route('login')}}" method="POST">
                @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif  
                    @csrf
                    <div class="mb-6">
                            <label for="email" class="text-[#18534F] font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <!-- ---------- -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class=" text-[#18534F] font-medium">Mot de passe</label>
                        </div>
                        <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <!-- ---------------- -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 ">
                        Se connecter
                    </button>
                </form> 
                        <!-- lien pour  s inscrire -->
                        <div class="text-center mt-6">
                            <p class="text-gray-600">
                                Vous n'avez pas de compte ? <a href="" class="text-blue-600 ">S'inscrire</a>
                            </p>
                        </div>
            </div>
        </div>
    </section>
    
</body>
</html>