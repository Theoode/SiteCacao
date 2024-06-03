<body>
<div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Panier</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">

        <div class="mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
            <?php foreach ($panier as $index => $produit): ?>
                <div class="mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <img src="<?php echo $produit['photo']; ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 class="text-lg font-bold text-gray-900"><?php echo $produit['nom']; ?></h2>
                        </div>
                        <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                            <div class="flex items-center space-x-4">
                                <p class="text-sm"><?php echo $produit['quantite']; ?></p>
                                <!-- Ajoutez un bouton pour supprimer le produit -->
                                <button class="text-red-500 hover:text-red-700" onclick="supprimerProduit(<?php echo $produit['id_produit']; ?>)">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
                <p class="text-gray-700">Sous Total</p>
                <p class="text-gray-700"> €</p>
            </div>
            <div class="flex justify-between">
                <p class="text-gray-700">Livraison</p>
                <p class="text-gray-700">Gratuit</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
                <p class="text-lg font-bold">Total</p>
                <div class="">
                    <p class="mb-1 text-lg font-bold"> €</p>
                    <p class="text-sm text-gray-700">TVA incluse</p>
                </div>
            </div>
            <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button>
        </div>
    </div>
</div>
</body>

<script>
    function supprimerProduit(id_produit) {
        // Demandez confirmation avant de supprimer
        if (confirm("Êtes-vous sûr de vouloir supprimer ce produit du panier?")) {
            // Redirigez l'utilisateur vers la page de suppression avec l'id_produit
            window.location.href = "supprimer_produit.php?id_produit=" + id_produit;
        }
    }
</script>