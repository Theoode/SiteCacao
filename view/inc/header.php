<nav class="bg-white border-gray-200 dark:bg-gray">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="src/images/logo.png" class="h-20 " alt="Cacaobox Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black"> Cacaobox</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white  ">
                <li>
                    <a href="accueil" class="block py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white transition-transform hover:translate-y-1 hover:text-blue-700">Accueil</a>
                </li>
                <li>
                    <a href="produitliste" class="block py-2 px-3 text-black rounded md:bg-transparent md:p-0 dark:text-white transition-transform hover:translate-y-1 hover:text-blue-700">Produits</a>
                </li>
                <li>
                    <a href="" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white transition-transform hover:translate-y-1 hover:text-blue-700">A propos</a>
                </li>
                <li>
                    <?php if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                        // Calculer le nombre de produits dans le panier
                        $nombre_produits = count($_SESSION['panier']);
                        // Afficher le nombre de produits à côté du lien "Panier"
                        echo '<a href="panier" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white transition-transform hover:translate-y-1 hover:text-blue-700">Panier ('.$nombre_produits.')</a>';
                    } else {
                        // Si le panier est vide, afficher simplement le lien "Panier"
                        echo '<a href="panier" class="block py-2 px-3 text-black rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white transition-transform hover:translate-y-1 hover:text-blue-700">Panier</a>';
                    }?>
                </li>
            </ul>
        </div>
    </div>
    <hr>
</nav>
