<?php
require_once('src/model.php');

// Appel de la fonction pour récupérer les produits
$produits = produitliste();

// Inclusion de la vue
require('view/v-produitliste.php');
require('view/inc/footer.php');


function produitliste() {
    global $pdo; // Utiliser la connexion PDO dans cette fonction

    $query = "SELECT * FROM produit";

    // Exécution de la requête SQL
    $result = $pdo->query($query);

    $produits = array();

    // Vérifier si la requête a été exécutée avec succès
    if ($result) {
        // Récupérer le nombre de lignes retournées par la requête
        $num_rows = $result->rowCount();

        // Si des lignes ont été retournées, parcourir les résultats
        if ($num_rows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $produits[] = $row;
            }
        }
    }

    return $produits;
}

?>
