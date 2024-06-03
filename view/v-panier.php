<?php require_once 'src/controllers/calcul_panier.php'?>

<body>
    <div class="h-screen bg-gray-100 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Panier</h1>

        <div class="flex justify-center">
            <div class="w-2/3 pr-6 ">
                <?php foreach ($panier as $index => $produit): ?>
                    <div class="mb-6 rounded-lg bg-white p-6 shadow-md">
                        <img src="<?php echo $produit['photo']; ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                        <div class="mt-5">
                            <h2 class="text-lg font-bold text-gray-900"><?php echo $produit['nom']; ?></h2>
                        </div>
                        <div class="mt-5">
                            <h2 class="text-lg font-bold text-gray-900"><?php echo $produit['prix']; ?>€</h2>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <p class="text-sm"><?php echo $produit['quantite']; ?></p>
                            <button class="text-red-500 hover:text-red-700" onclick="supprimerProduit(<?php echo $produit['id_produit']; ?>)">Supprimer</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="w-1/3 rounded-lg border bg-white p-6 shadow-md">
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Sous Total</p>
                    <p class="text-gray-700"><?php echo $total_sous_total; ?> €</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-700">Frais de livraison</p>
                    <p class="text-gray-700"><?php echo $frais_livraison; ?> €</p>
                </div>
                <hr class="my-4" />
                <div class="flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <div class="">
                        <p class="mb-1 text-lg font-bold"><?php echo $total; ?> €</p>
                        <p class="text-sm text-gray-700">TVA incluse</p>
                    </div>
                </div>
                <button name="commande" class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600" onclick="redirigerVersCommande()">Commander</button>
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

    function redirigerVersCommande() {
        window.location.href = "commande";
    }
</script>
