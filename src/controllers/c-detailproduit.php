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

//Ajout de produit dans la base////
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
            $query_insert_panier = "INSERT INTO Panier (id_panier, produits_id, produits_prix, produits_qtt, produits_nom, produits_photo) VALUES (:id_panier, '', '', '', '', '')";
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
            $_SESSION['panier'][$id_produit] = [
                'quantite' => $quantite,
                'prix' => $prix,
                'nom' => $nom_produit,
                'photo' => $photo_produit
            ];
        }

        // Mettre à jour les champs produits_id, produits_prix et produits_qtt dans la table Panier
        try {
            // Vérifier si les champs sont vides avant de concaténer
            $query_get_panier = "SELECT produits_id, produits_prix, produits_qtt, produits_nom, produits_photo FROM Panier WHERE id_panier = :id_panier";
            $stmt_get_panier = $pdo->prepare($query_get_panier);
            $stmt_get_panier->execute([':id_panier' => $id_panier]);
            $panier_data = $stmt_get_panier->fetch(PDO::FETCH_ASSOC);

            $produits_id = $panier_data['produits_id'];
            $produits_prix = $panier_data['produits_prix'];
            $produits_qtt = $panier_data['produits_qtt'];
            $produits_nom = $panier_data['produits_nom'];
            $produits_photo = $panier_data['produits_photo'];

            if (empty($produits_id)) {
                $new_produits_id = $id_produit;
                $new_produits_prix = $prix;
                $new_produits_qtt = $quantite;
                $new_produits_nom = $nom_produit;
                $new_produits_photo = $photo_produit;
            } else {
                $new_produits_id = $produits_id . ',' . $id_produit;
                $new_produits_prix = $produits_prix . ',' . $prix;
                $new_produits_qtt = $produits_qtt . ',' . $quantite;
                $new_produits_nom = $produits_nom . ',' . $nom_produit;
                $new_produits_photo = $produits_photo . ',' . $photo_produit;
            }

            $query_update_panier = "UPDATE Panier SET 
                produits_id = :produits_id, 
                produits_prix = :produits_prix, 
                produits_qtt = :produits_qtt, 
                produits_nom = :produits_nom, 
                produits_photo = :produits_photo 
                WHERE id_panier = :id_panier";

            $stmt_update_panier = $pdo->prepare($query_update_panier);
            $stmt_update_panier->execute([
                ':produits_id' => $new_produits_id,
                ':produits_prix' => $new_produits_prix,
                ':produits_qtt' => $new_produits_qtt,
                ':produits_nom' => $new_produits_nom,
                ':produits_photo' => $new_produits_photo,
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


