<?php
require_once ('src/controllers/c-accueil.php');
require_once('src/controllers/c-produitliste.php');

if(isset($_GET['url']) && $_GET['url']) {
    $url = rtrim($_GET['url'], '/');
    if ($url) {
        switch ($url) {
            case 'produitliste':
                produitliste();
                break;

            default :
                accueil();
                break;
        }
    } else accueil();
}else accueil();

