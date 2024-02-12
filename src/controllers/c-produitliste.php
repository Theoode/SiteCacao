<?php

require_once('src/model.php');

function produitliste() {

    global $pdo;

    $menu['page'] = 'produitliste';
    require('view/inc/head.php');
    require('view/inc/header.php');

    // Récupérer les produits
    $produits = array(); // Initialisation du tableau de produits

    $query = "SELECT * FROM produit";
    $result = $pdo->query($query);

    if ($result) {
        // Récupérer tous les produits sous forme de tableau associatif
        $produits = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Aucun produit trouvé.";
    }

    require('view/v-produitliste.php');

}




?>


