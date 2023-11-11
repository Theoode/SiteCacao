<?php

require_once('src/model.php');

function panier(){
    global $idUser, $pdo;

    $unPanier = get_result("SELECT * FROM panier WHERE id_client = $idUser");
    $idPanier = $unPanier['id'];

    if(isset($_GET['identifiant']) && $_GET['identifiant']) {
        $idProduit = $_GET['identifiant'];
        $pdo->query("DELETE FROM panier_produit WHERE id_produit = $idProduit AND id_panier = $idPanier");
    }

    if($unPanier)
        $contenuPanier = get_results("SELECT * FROM panier_produit, produit WHERE panier_produit.id_produit = produit.id AND id_panier = $idPanier");
    else $contenuPanier = false;

    printPanier($contenuPanier);
}

function printPanier($contenuPanier){
    $menu['page'] = "panier";

    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/panier/v-panier.php');
    require('view/inc/inc.footer.php');
}
