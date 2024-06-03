<body>
<div class="h-screen bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Panier</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
        <!-- Section des produits à gauche -->
        <!-- view/v-panier.php -->

        <div class="rounded-lg md:w-2/3 mx-auto">
            <?php if(isset($panier) && !empty($panier)): ?>
                <?php foreach ($panier as $produit): ?>
                    <div class="mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                        <img src="<?php echo $produit['photo']; ?>" alt="product-image" class="w-full rounded-lg sm:w-40" />
                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                            <div class="mt-5 sm:mt-0">
                                <h2 class="text-lg font-bold text-gray-900"><?php echo $produit['nom']; ?></h2>
                            </div>
                            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                <div class="flex items-center space-x-4">
                                    <p class="text-sm"><?php echo $produit['quantite']; ?></p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Votre panier est vide.</p>
            <?php endif; ?>
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