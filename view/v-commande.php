<?php require_once 'src/controllers/calcul_panier.php';
?>
<body>
<div class="h-screen bg-gray-100 flex justify-center items-center">
    <div class="w-full max-w-5xl flex justify-between items-start space-x-6">
        <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="mb-10 text-center text-2xl font-bold">Formulaire de Commande</h1>
            <form action="traiter_commande.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                        Nom
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" name="nom" type="text" placeholder="Nom" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                        Prénom
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom" name="prenom" type="text" placeholder="Prénom" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="adresse">
                        Adresse
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="adresse" name="adresse" type="text" placeholder="Adresse" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="code_postal">
                        Code Postal
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="code_postal" name="code_postal" type="text" placeholder="Code Postal" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="num_tel">
                        Numéro de Téléphone
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="num_tel" name="num_tel" type="text" placeholder="Numéro de Téléphone" required>
                </div>
            </form>
        </div>
        <div class="w-1/2">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="mb-10 text-center text-2xl font-bold">Récapitulatif de commande</h1>
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Sous Total</p>
                    <p class="text-gray-700">€<?php echo $total_sous_total; ?></p>
                </div>
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Frais de livraison</p>
                    <p class="text-gray-700"><?php echo $frais_livraison; ?></p>
                </div>
                <hr class="my-4">
                <div class="mb-2 flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <p class="text-lg font-bold">€<?php echo $total ?></p>
                </div>
            </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="mb-10 text-center text-2xl font-bold">Paiement PayPal</h1>


                </div>
            </div>
        </div>
    </div>
</body>

