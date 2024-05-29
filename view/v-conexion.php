<body class="bg-gray-100 flex justify-center items-center h-screen">
<div class="flex flex-col items-center">
    <div class="p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-6 text-center">Connexion</h2>
        <form action="controller.php" method="post">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse Email</label>
                <input type="email" id="email" name="mail" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre adresse email">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" id="password" name="mdp" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre mot de passe">
            </div>
            <div class="flex items-center justify-center ">
                <button type="submit" name="connexion" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Se Connecter</button>
                <a href="inscription" class="text-blue-500 hover:text-blue-700 text-sm">Créez un compte</a>
            </div>
        </form>
    </div>
</div>
</body>


