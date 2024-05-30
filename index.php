<?php
require_once ('src/controllers/c-accueil.php');
require_once('src/controllers/c-produitliste.php');
require_once('src/controllers/c-conexion.php');
require_once('src/controllers/c-inscription.php');
require_once('src/controllers/c-paiement.php');
require_once('src/controllers/c-detailproduit.php');

if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if ($url) {
        switch ($url) {
            case 'produitliste':
                produitliste();
                break;

            case 'conexion':
                conexion();
                break;

            case 'inscription':
                inscription();
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

