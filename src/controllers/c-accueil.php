
<?php


require_once('src/model.php');

function accueil()
{
    $produits = getRandomProducts();

    $menu['page'] = 'accueil';
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-accueil.php');

}

function getRandomProducts(){

    global $pdo;

    $query = /** @lang text */
       "SELECT * FROM produit ORDER BY RAND()";
     $result = $pdo->query($query);
    if ($result) {
        // Récupérer tous les produits sous forme de tableau associatif
        $produits = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Aucun produit trouvé.";
    }
    return $produits;
}

