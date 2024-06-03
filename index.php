<?php
require_once ('src/controllers/c-accueil.php');
require_once('src/controllers/c-produitliste.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-detailproduit.php');
require_once('src/controllers/c-panier.php');


// Rediriger vers les contrôleurs appropriés en fonction de l'URL
if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if ($url) {
        switch ($url) {
            case 'produitliste':
                produitliste();
                break;

            case 'panier':
                panier();
                break;

            case 'paiement':
                paiement();
                break;

            case 'detailproduit':
                detailproduit();
                break;

            default :
                accueil();
                break;
        }
    } else accueil();
}else accueil();
