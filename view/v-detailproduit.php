<div class="bg-white">
    <div class="pt-6">
        <?php foreach ($produits as $produit): ?>
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
                <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                    <img src="<?php echo $produit['photo'] ?>" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
                </div>
            </div>

            <form name="ajouter_panier" method="POST" class="block">
                <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
                    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?php echo $produit['nom'] ?></h1>
                        <div>
                            <h3 class="sr-only">Description</h3>
                            <div class="space-y-6">
                                <p class="text-base text-gray-900"><?php echo $produit['description'] ?></p>
                            </div>
                        </div>
                        <div class="mt-10">
                            <h3 class="text-sm font-medium text-gray-900">Spécificités</h3>
                            <div class="mt-4">
                                <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                    <li class="text-gray-400"><span class="text-gray-600">Produit provenant du Ghana</span></li>
                                    <li class="text-gray-400"><span class="text-gray-600">95% de cacao</span></li>
                                    <li class="text-gray-400"><span class="text-gray-600">Pour déguster ou cuisiner</span></li>
                                    <li class="text-gray-400"><span class="text-gray-600">Sachet en grains</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="mt-10">
                            <h2 class="text-sm font-medium text-gray-900">Détails</h2>
                            <div class="mt-4 space-y-6">
                                <p class="text-sm text-gray-600"><?php echo $produit['detail'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:row-span-3 lg:mt-0">
                        <h2 class="sr-only">Informations du produit</h2>
                        <p class="text-3xl tracking-tight text-gray-900"><?php echo $produit['prix']; ?>€</p>
                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                        <input type="hidden" name="nom" value="<?php echo $produit['nom']; ?>">
                        <input type="hidden" name="photo" value="<?php echo $produit['photo']; ?>">
                        <input type="hidden" name="prix" value="<?php echo $produit['prix']; ?>">
                        <label for="quantite">Quantité:</label>
                        <input type="number" name="quantite" id="quantite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="1" min="1" required>
                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>
