<?php

require_once ('src/model.php');

function testproduit()
{

    $lstRetour = array();

    // Récupération des produits présents dans la base
    $lstProduit = get_results("SELECT * FROM produit WHERE statut=1");

    // Boucle sur les produits présents dans la base
    foreach ($lstProduit as $unProduit){
        $quantite = rand(0,10);

        // Vérification si le produit est présent dans la base
        $produitPresent = get_results("SELECT * FROM produit WHERE id=".$unProduit['id']);

        // Si le produit est présent dans la base, on l'ajoute au panier
        if ($produitPresent) {
            $retour = ajouterAuPanier($unProduit['id'], $quantite);
        } else { // Sinon, le retour est 0
            $retour = 0;
        }

        // Création d'un tableau avec les informations du produit et du retour
        $tab=array(
            "id"=>$unProduit['id'],
            "nom"=> $unProduit['nom'],
            "quantite"=>$quantite,
            "retour"=>$retour
        );
        array_push($lstRetour,$tab);
    }

    // Ajout des deux faux produits
    $max=max(array_column($lstProduit,"id"));
    $lstRetour= execTest($max+1,"test+2",5,$lstRetour);
    $lstRetour= execTest($max+2,"test+2",10,$lstRetour);


    require ('view/produit/v-test-produit.php');
}

function execTest($idProduit, $nom,$quantite,$lstRetour)
{

    // Vérification si le produit est présent dans la base
    $produitPresent = get_results("SELECT * FROM produit WHERE id=" . $idProduit);

    // Si le produit est présent dans la base, on l'ajoute au panier
    if ($produitPresent) {
        $retour = ajouterAuPanier($idProduit, $quantite);
    } else { // Sinon, le retour est 0
        $retour = 0;
    }

    // Création d'un tableau avec les informations du produit et du retour
    $tab = array(
        "id" => $idProduit,
        "nom" => $nom,
        "quantite" => $quantite,
        "retour" => $retour
    );
    array_push($lstRetour, $tab);

    return $lstRetour;
}
