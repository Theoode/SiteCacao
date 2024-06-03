<?php

require_once('src/model.php');
/*unset($_SESSION['panier']);*/

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
    var_dump($_SESSION);

}

function ajouter_panier()
{
    // Vérifier si les données du produit sont disponibles dans la requête POST
    if (isset($_POST['id_produit']) && isset($_POST['nom']) && isset($_POST['photo']) && isset($_POST['prix']) && isset($_POST['quantite'])) {
        // Initialiser le tableau du panier s'il n'existe pas encore
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // Vérifier si le produit existe déjà dans le panier
        $produit_trouve = false;
        foreach ($_SESSION['panier'] as &$produit) {
            if ($produit['id_produit'] == $_POST['id_produit']) {
                // Mettre à jour la quantité du produit existant
                $produit['quantite'] += $_POST['quantite'];
                $produit_trouve = true;
                break;
            }
        }

        // Si le produit n'existe pas encore dans le panier, l'ajouter
        if (!$produit_trouve) {
            // Créer un tableau pour représenter le produit
            $nouveau_produit = [
                'id_produit' => $_POST['id_produit'],
                'nom' => $_POST['nom'],
                'photo' => $_POST['photo'],
                'prix' => $_POST['prix'],
                'quantite' => $_POST['quantite']
            ];

            // Ajouter le produit au panier
            $_SESSION['panier'][] = $nouveau_produit;
        }
    }
}



ajouter_panier();



