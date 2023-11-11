<?php

require_once('src/model.php');

function produit(){
    if(isset($_GET['identifiant']) && $_GET['identifiant']) {
        $_GET['identifiant'] = rtrim($_GET['identifiant'], "/");
        $unProduit = get_result("SELECT * FROM produit WHERE identifiant ='".$_GET['identifiant']."'");
        produitSimple($unProduit);
    }else{
        $lstProduit = get_results("SELECT * FROM produit WHERE statut = 1");
        produitList($lstProduit);
    }
}

function produitSimple($unProduit){
    $menu['page'] = "produit";
    $checkAjout = null;

    if (isset($_POST['produit_quantite']) && $_POST['produit_quantite'])
        $checkAjout = ajouterAuPanier($unProduit['id']);

    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/produit/v-produit.php');
    require('view/inc/inc.footer.php');
}

function produitList($listProduit){
    $menu['page'] = "produit";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/produit/v-produit_list.php');
    require('view/inc/inc.footer.php');
}



function ajouterAuPanier($idProduit){
    global $idUser, $pdo;
    $inPanier = false;

    $unPanier = get_result("SELECT * FROM panier WHERE id_client = $idUser");
    if($unPanier){
        $idPanier = $unPanier['id'];
        $inPanier = get_result("SELECT * FROM panier_produit WHERE id_panier = $idPanier AND id_produit = $idProduit");
    }else{
        $pdo->query("INSERT INTO panier (id_client, date_creation) VALUES ($idUser, '".date('Y-m-d H:i:s')."')");
        $idPanier = $pdo->lastInsertId();
    }

    $quantite = $_POST['produit_quantite'];

    if($inPanier){
        $pdo->query("UPDATE panier_produit SET quantite = quantite + $quantite WHERE id = '".$inPanier['id']."'");
    }else{
        $pdo->query("INSERT INTO panier_produit (id_panier, id_produit, quantite) ".
            "VALUES ($idPanier, $idProduit, $quantite)");
    }
    return true;
}