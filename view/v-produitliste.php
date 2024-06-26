<div class="bg-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3">
            <?php foreach ($produits as $produit): ?>
                <div class="group relative">
                    <form action="detailproduit" method="POST" class="block"> <!-- action vide pour soumettre le formulaire vers la même page -->
                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="<?php echo $produit['photo'] ?>" alt="Front of men's Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700"><?php echo $produit['nom'] ?></h3>
                                <p class="mt-1 text-sm text-gray-500">Black</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900"><?php echo $produit['prix'] ?>€</p>
                        </div>
                        <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voir détails</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
