<?php

$idUser = 1;


//redirections site web//
require_once('src/controllers/c-accueil.php');
require_once('src/controllers/c-commander.php');
require_once('src/controllers/c-post.php');
require_once('src/controllers/c-produit.php');
require_once('src/controllers/c-panier.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-resultatpaiement.php');


//Controlleur de test//
require_once ('src/controllers/c-test-panier.php');
require_once ('src/controllers/c-test-produit.php');


//redirections API//
require_once('src/controllers/api/c-api-liste.php');
require_once('src/controllers/api/c-api-commande.php');
require_once('src/controllers/api/c-api-paiement.php');





if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if($url) {
        switch ($url){
            case "post":
                post();
                break;
            case "commander":
                commander();
                break;
            case "produit":
                produit();
                break;
            case "panier":
                panier();
                break;

            case "paiement":
                paiement();
                break;

            case "testpanier":
                testpanier();
                break;

            case "testproduit":
                testproduit();
                break;

            case "accepte":
                commandeaccepte();
                break;

            case "refuse":
                commanderefuse();
                break;

            case "annule":
                commandeannule();
                break;

            default:
                accueil();
                break;
        }
    }else
        accueil();
}else if(isset($_GET['urlAPI']) && $_GET['urlAPI']) {
    $url = rtrim($_GET['urlAPI'], '/');
    if ($url) {
        switch ($url) {
            default:
                APIListe();
                break;

            case "commande":
                APICommande();
                break;

            case "paiement":
                APIpaiement();
                break;
        }
    }
}else accueil();