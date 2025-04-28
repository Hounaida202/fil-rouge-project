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
                <h1 class="text-3xl text-[#18534F] font-bold text-center mb-8">Créer votre compte</h1>
                
                <form action="{{route('register')}}" method="POST">
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
                        <div class="w-full mb-6">
                            <label for="nom" class="text-[#18534F] font-medium mb-2">Nom</label>
                            <input type="text" id="nom" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none " required>
                        </div>
                    <!-- -------------- -->
                        <div class="mb-6">
                            <label for="email" class=" text-[#18534F] font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" oninput="validateEmail()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <p id="email-msg"></p>

                        </div>
                    <!-- -------------- -->
                        <div class="mb-6">
                            <label for="tel" class="text-[#18534F] font-medium mb-2">Numéro de téléphone</label>
                            <input type="tel" id="tel" name="tel" oninput="validateTel()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <p id="tel-msg"></p>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="password" class="text-[#18534F] font-medium mb-2">Mot de passe</label>
                            <input type="password" id="password" name="password" oninput="validatePassword()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <p id="password-msg"></p>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="password_confirmation" class="text-[#18534F] font-medium mb-2">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                   <!-- -------------- -->
                        <div class="mb-6">
                            <label for="ville" class="block text-[#18534F] font-medium mb-2">Ville</label>
                            <input type="text" id="ville" name="ville" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    <!-- -------------- -->
                        <div class="mb-8">
                            <div class="block text-[#18534F] font-medium mb-2">Type de compte</div>
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

                                <!-- -----un modal -->
   
        <!-- -------------------------fin de modal -------- -->
                            </div>
                            
                        </div>
                        <div  class="mb-6" id="preuve">
                            <label for="ville" class="block text-[#18534F] font-medium mb-2">Ville</label>
                            <input type="file" id="preuve" name="preuve" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <!-- --------les conditions -->
                        <div class="mb-6">
                            <div class="flex items-start">
                                <input type="checkbox" id="conditions" name="conditions" class="mt-1 mr-2" required>
                                <label for="conditions" class="text-gray-700">
                                    J'accepte les conditions d'utilisation et la politique de confidentialité.
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Créer mon compte
                        </button>
                    <!-- ---------------------- -->

                </form>

                  <div class="text-center mt-6">
                    <p class="text-gray-600">
                        Vous avez déjà un compte ? <a href="" class="text-blue-600">Se connecter</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script>
        function validateEmail() {
            let emailInput = document.getElementById("email");
            let email = emailInput.value;
            let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (regex.test(email)) {
                emailInput.style.borderColor = "green";
                document.getElementById("email-msg").textContent = "Email valide";
                document.getElementById("email-msg").style.color = "green";
                document.getElementById("email-msg").style.fontSize = "15px";

            } else {
                emailInput.style.borderColor = "red";
                document.getElementById("email-msg").textContent = "Email invalide ";
                document.getElementById("email-msg").style.color = "red";
                document.getElementById("email-msg").style.fontSize = "15px";

            }
        }
        function validateTel(){
            let inputTel=document.getElementById("tel");
            let tel=inputTel.value;
            let regex=/^\+212[ \-]?(6|7)\d{8}$/;
            if(regex.test(tel)){
                inputTel.style.borderColor="green";
                document.getElementById("tel-msg").textContent="numéro valide";
                document.getElementById("tel-msg").style.color="green";
            }
            else{
                inputTel.style.borderColor="red";
                document.getElementById("tel-msg").textContent="le numéro doit se commancer par +212";
                document.getElementById("tel-msg").style.color="red";
            }
        }
        function validatePassword() {
            let passwordInput = document.getElementById("password");
            let password = passwordInput.value;
            let regex = /^(?=(.*[A-Za-z]){6,}).{8,}$/;

            if (regex.test(password)) {
                passwordInput.style.borderColor = "green";
                document.getElementById("password-msg").textContent = "password valide ";
                document.getElementById("password-msg").style.color = "green";
                document.getElementById("password-msg").style.fontSize = "15px";

            } else {
                passwordInput.style.borderColor = "red";
                document.getElementById("password-msg").textContent = "le mot de passe doit contenir 6 chiffre ou plus ";
                document.getElementById("password-msg").style.color = "red";
                document.getElementById("password-msg").style.fontSize = "15px";

            }
        }
        
    </script>
</body>
</html>