<?php

require_once ('src/model.php');

function testpanier()
{
    global $idUser;
    if (!$idUser) die("Pas d'utilisateur.");

    $unPanier = get_result("SELECT id FROM panier WHERE id_client = $idUser");
    if (!$unPanier) die("Pas de panier.");
    $idPanier = $unPanier['id'];

    $lstPanier = get_result("SELECT produit.id as id_produit, produit.nom as nom, panier_produit.*
                                FROM  produit, panier_produit WHERE produit.id = panier_produit.id_produit");
    $lstRetour = array();

    foreach ($lstPanier as $unPanier){
        $lstRetour = execTestPanier($idPanier,$unPanier['id'],$unPanier['nom'], $unPanier['quantité'],$lstRetour);
    }
    $lstRetour = execTestPanier(69, 'test1', 0, $lstRetour);
    $lstRetour = execTestPanier(5090, 'test1', 0, $lstRetour);

    require('view/panier/v-test-panier.php');
}

function execTestPanier($idPanier, $idProduit, $nom, $quantite, $lstRetour)
{
    $retour = supprimerPanier($idPanier, $idProduit,$quantite);

    if($retour == 1)
        $apres = 0;
    else
        $apres = $quantite;

    $new = array(
        "id"=>$idProduit,
        "nom"=> $nom,
        "quantite_avant"=>$quantite,
        "quantite_apres"=>$apres,
        "retour"=>$retour);

    array_push($lstRetour,$new);

    return $lstRetour;
}