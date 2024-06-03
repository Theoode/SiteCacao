<?php

function panier()
{
    // Démarrer la session si ce n'est pas déjà fait
    if (!isset($_SESSION)) {
        session_start();
    }

    // Initialiser un tableau pour stocker les produits du panier
    $panier = [];

    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier'])) {
        // Copier les produits du panier de la session dans le tableau local
        $panier = $_SESSION['panier'];
    }

    // Variables pour la vue
    $menu['page'] = 'panier';

    // Inclure les fichiers nécessaires
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-panier.php');
}

