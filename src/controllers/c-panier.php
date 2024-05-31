<?php


require_once('src/model.php');

function panier()
{

    global $pdo;

    $menu['page'] = 'panier';
    require('view/inc/head.php');
    require('view/inc/header.php');

    $panier = array(); // Initialisation du tableau de produits

    $query = /** @lang text */
        "SELECT * FROM panier";
    $result = $pdo->query($query);

    if ($result) {
        // Récupérer tous les produits sous forme de tableau associatif
        $produits = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Aucun produit trouvé.";
    }


    require('view/v-panier.php');

}
