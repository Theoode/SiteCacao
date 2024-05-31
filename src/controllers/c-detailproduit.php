<?php

require_once('src/model.php');

function detailproduit()
{
    global $pdo;

    $menu['page'] = 'detailproduit';
    require('view/inc/head.php');
    require('view/inc/header.php');

    // Vérifie si l'ID du produit est présent dans les données POST
    if (isset($_POST['id_produit'])) {
        // Récupère l'ID du produit depuis les données POST
        $id = $_POST['id_produit'];

        // Initialise le tableau $produits
        $produits = array();

        // Préparation de la requête SQL avec un paramètre pour l'ID
        $query = /** @lang text */
            "SELECT * FROM produit WHERE id_produit = ?";

        // Préparation de la requête
        $stmt = $pdo->prepare($query);

        // Exécution de la requête en passant la valeur de $id comme paramètre
        $stmt->execute([$id]);

        // Récupération des résultats
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Vérifier s'il y a des produits trouvés
        if (empty($produits)) {
            echo "Aucun produit trouvé.";
        }
    } else {
        echo "Aucun ID de produit n'a été transmis.";
    }

    require('view/v-detailproduit.php');
}
