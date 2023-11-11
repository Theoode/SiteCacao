<?php

require_once('src/model.php');
require_once('view/inc/head.php');
require_once('view/inc/header.php');

function paiement()
{

    $menu['page']='paiement';

    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        paiementSimple();
    } else {
        paiementListe();
    }
}

function paiementListe(){

    $url = 'https://s4-gp95.kevinpecro.info/api/paiement/';

    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ='
    );

    $paiementListe= model($url, $data);
    require_once('view/paiement/v-paiement-list.php');

}

function paiementSimple(){

    $url = 'https://s4-gp95.kevinpecro.info/api/paiement/';

    $data = array(
        'token'=>'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'idPaiement' => $_GET['identifiant']
    );
    $paiement= model($url, $data);
    require_once('view/paiement/v-paiement.php');
}

?>