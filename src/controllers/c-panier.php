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


function supprimer_produit_panier()
{
    // Démarrer la session si ce n'est pas déjà fait
    if (!isset($_SESSION)) {
        session_start();
    }

    // Vérifiez si l'identifiant du produit est passé dans la requête GET
    if (isset($_GET['id_produit'])) {
        $id_produit = $_GET['id_produit'];

        // Parcourez le panier pour trouver le produit avec l'id_produit correspondant
        foreach ($_SESSION['panier'] as $index => $produit) {
            if ($produit['id_produit'] == $id_produit) {
                // Supprimez le produit du panier
                unset($_SESSION['panier'][$index]);
                // Sortez de la boucle une fois que le produit est trouvé et supprimé
                break;
            }

        }
        header('Location: panier');
    }
}
supprimer_produit_panier();
