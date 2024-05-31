<?php

require_once('src/model.php');

function panier()
{
    global $pdo;

    $menu['page'] = 'panier';
    require('view/inc/head.php');
    require('view/inc/header.php');

    try {
        // Récupérer les données du panier depuis la base de données
        $query = "SELECT produits_id, produits_prix, produits_qtt, produits_nom, produits_photo FROM Panier";

        $stmt = $pdo->query($query);

        if ($stmt) {
            // Récupérer les données du panier sous forme de tableau associatif
            $panier_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Créer des tableaux pour stocker les produits individuels
            $produits_id = [];
            $produits_prix = [];
            $produits_qtt = [];
            $produits_nom = [];
            $produits_photo = [];

            // Variables pour le sous-total et le total
            $sous_total = 0;
            $total = 0;

            // Parcourir chaque ligne du panier
            foreach ($panier_data as $produit) {
                // Diviser les valeurs par la virgule pour obtenir des tableaux de produits individuels
                $ids = array_map('trim', explode(',', $produit['produits_id']));
                $prix = array_map('trim', explode(',', $produit['produits_prix']));
                $qtt = array_map('trim', explode(',', $produit['produits_qtt']));
                $noms = array_map('trim', explode(',', $produit['produits_nom']));
                $photos = array_map('trim', explode(',', $produit['produits_photo']));

                // Ajouter chaque produit aux tableaux correspondants
                $produits_id = array_merge($produits_id, $ids);
                $produits_prix = array_merge($produits_prix, $prix);
                $produits_qtt = array_merge($produits_qtt, $qtt);
                $produits_nom = array_merge($produits_nom, $noms);
                $produits_photo = array_merge($produits_photo, $photos);
            }

            // Calculer le sous-total
            foreach ($produits_id as $key => $id) {
                $sous_total += $produits_qtt[$key] * $produits_prix[$key];
            }

            // Calculer le total (ajouter les frais de livraison si nécessaire)
            $total = $sous_total; // Ajoutez ici les frais de livraison ou autres frais si nécessaire

            // Passer les tableaux de produits et les totaux à la vue
            require('view/v-panier.php');
        } else {
            echo "Aucun produit trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération du panier: " . $e->getMessage();
    }

    require('view/inc/footer.php');
}
