<body class="bg-gray-100 h-screen  flex items-center justify-center">
<div class="bg-white  p-8 rounded shadow-md w-1/2 ">
    <h2 class="text-2xl font-semibold mb-6 text-center">Inscription</h2>
    <form action="controller.php" method="post">
        <div class="mb-4">
            <label for="mail" class="block text-gray-700 text-sm font-bold mb-2">Adresse Email</label>
            <input type="email" id="mail" name="mail" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre adresse email" required>
        </div>
        <div class="mb-4">
            <label for="mdp" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
            <input type="password" id="mdp" name="mdp" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre mot de passe" required>
        </div>
        <div class="mb-4">
            <label for="sexe" class="block text-gray-700 text-sm font-bold mb-2">Sexe</label>
            <select id="sexe" name="sexe" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
            <input type="text" id="nom" name="nom" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre nom" required>
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre prénom" required>
        </div>
        <div class="mb-4">
            <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre adresse" required>
        </div>
        <div class="mb-4">
            <label for="code_postal" class="block text-gray-700 text-sm font-bold mb-2">Code Postal</label>
            <input type="text" id="code_postal" name="code_postal" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre code postal" required>
        </div>
        <div class="mb-4">
            <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Âge</label>
            <input type="text" id="age" name="age" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre âge" required>
        </div>
        <div class="flex items-center justify-center">
            <button type="submit" name="inscription" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">S'Inscrire</button>
            <a href="accueil" class="text-blue-500 hover:text-blue-700 text-sm">Accueil</a>
        </div>
    </form>
</div>




</body>
