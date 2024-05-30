
<?php


require_once('src/model.php');

function accueil()
{
    $menu['page'] = 'accueil';
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-accueil.php');

}

function getRandomProducts($limit = 4) {
    global $pdo;

    try {

        $query = /** @lang text */
            "SELECT * FROM produit ORDER BY RAND() LIMIT :limit";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $produits;
    } catch (Exception $e) {
        echo "Erreur lors de la récupération des produits : " . $e->getMessage();
        return [];
    }
}

getRandomProducts();
