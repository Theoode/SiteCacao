<?php
require_once ('src/controllers/c-accueil.php');
require_once('src/controllers/c-produitliste.php');
require_once('src/controllers/c-conexion.php');
require_once('src/controllers/c-inscription.php');

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

            default :
                accueil();
                break;
        }
    } else accueil();
}else accueil();

