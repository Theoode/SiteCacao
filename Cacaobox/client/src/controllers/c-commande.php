<?php

require_once('src/model.php');
require_once('view/inc/head.php');
require_once('view/inc/header.php');

function commande()
{

    $menu['page']='commande';

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        commandeSimple();
    } else {
        commandeListe();
    }
}

function commandeListe(){

    $url = 'https://s4-gp95.kevinpecro.info/api/commande/';

    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ='
    );

    $commandeListe= model($url, $data);
    require_once('view/commande/v-commande-list.php');

}

function commandeSimple(){

    $url = 'https://s4-gp95.kevinpecro.info/api/commande/';

    $data = array(
        'token'=>'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'idCommande' => $_GET['identifiant']
    );
    $commande= model($url, $data);
    require_once('view/commande/v-commande.php');
}

?>