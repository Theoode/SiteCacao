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



if (isset($_POST['id_produit']) && isset($_POST['quantite']) && isset($_POST['prix'])) {
    $id_produit = $_POST['id_produit'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $nom_produit = $_POST['nom'];
    $photo_produit = $_POST['photo'];
    ajouter_produit($id_produit, $quantite, $prix,$nom_produit,$photo_produit);
}

function ajouter_produit($id_produit, $quantite, $prix, $nom_produit, $photo_produit)
{
    global $pdo;

    try {
        // Si le panier n'existe pas encore dans la session, le créer et générer un nouvel identifiant de panier
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
            $_SESSION['id_panier'] = uniqid(); // Nouvel identifiant de panier
        }

        $id_panier = $_SESSION['id_panier'];

        $query_check_panier = "SELECT id_panier FROM Panier WHERE id_panier = :id_panier";
        $stmt_check_panier = $pdo->prepare($query_check_panier);
        $stmt_check_panier->execute([':id_panier' => $id_panier]);
        $panier_exist = $stmt_check_panier->fetchColumn();

        if (!$panier_exist) {
            // Si le panier n'existe pas dans la base de données, insérer un nouveau panier
            $query_insert_panier = "INSERT INTO Panier (id_panier, produits_id, produits_prix, produits_qtt ,produits_nom,produits_photo) VALUES (:id_panier, '', '', '','','')";
            $stmt_insert_panier = $pdo->prepare($query_insert_panier);
            $stmt_insert_panier->execute([':id_panier' => $id_panier]);
        }

        // Vérifier si le produit est déjà dans le panier
        if (isset($_SESSION['panier'][$id_produit])) {
            // Si le produit est déjà dans le panier, mettre à jour la quantité et le prix
            $_SESSION['panier'][$id_produit]['quantite'] += $quantite;
            $_SESSION['panier'][$id_produit]['prix'] = $prix;
        } else {
            // Si le produit n'est pas dans le panier, l'ajouter
            $_SESSION['panier'][$id_produit] = ['quantite' => $quantite, 'prix' => $prix, 'nom' => $nom_produit, 'photo' => $photo_produit];
        }

        // Mettre à jour les champs produits_id, produits_prix et produits_qtt dans la table Panier
        try {
            // Concaténer les informations sur les produits avec les données existantes dans la table Panier
            $query_update_panier = "UPDATE Panier SET produits_id = CONCAT(produits_id, ', ', :id_produit), produits_prix = CONCAT(produits_prix, ', ', :prix), produits_qtt = CONCAT(produits_qtt, ', ', :quantite), produits_nom = CONCAT(produits_nom, ', ', :nom), produits_photo = CONCAT(produits_photo, ', ', :photo) WHERE id_panier = :id_panier";
            $stmt_update_panier = $pdo->prepare($query_update_panier);
            $stmt_update_panier->execute([
                ':id_produit' => $id_produit,
                ':prix' => $prix,
                ':quantite' => $quantite,
                ':nom' => $nom_produit,
                ':photo' => $photo_produit,
                ':id_panier' => $id_panier
            ]);
        } catch (PDOException $e) {
            // Gérer les erreurs liées à la base de données
            throw new Exception("Erreur lors de la mise à jour du panier: " . $e->getMessage());
        }
    } catch (Exception $e) {
        echo "Erreur lors de l'ajout du produit au panier: " . $e->getMessage();
    }

    require('view/v-panier.php');
}



