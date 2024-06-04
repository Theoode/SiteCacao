<?php
require_once ('src/controllers/c-accueil.php');
require_once('src/controllers/c-produitliste.php');
require_once('src/controllers/c-detailproduit.php');
require_once('src/controllers/c-panier.php');
require_once('src/controllers/c-commande.php');
require_once('src/controllers/c-paiement.php');


// Rediriger vers les contrôleurs appropriés en fonction de l'URL
if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if ($url) {
        switch ($url) {
            case 'produitliste':
                produitliste();
                break;

            case 'paiement':
                paiement();
                break;

            case 'commande':
                commande();
                break;

            case 'panier':
                panier();
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
