<?php

require_once('src/model.php');


function test()
{
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $ClientTestUnique = 0;
        clientTestServiceUnique($ClientTestUnique);
    } else {
        clientTestServiceListe();
    }
}

function clientTestServiceListe()
{

    $url = 'https://s4-gp95.kevinpecro.info/api/test-service/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'identifiant' => $_GET['identifiant']

    );

    $response = callAPI($url, $data);
    $menu['page'] = "test-service";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/testService/v-test-service-liste.php');

}

function clientTestServiceUnique($ClientTestUnique)
{

    $url = 'https://s4-gp95.kevinpecro.info/api/test-service/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'identifiant' => $_GET['identifiant']);

    $response = callAPI($url, $data);

    $menu['page'] = "test-service";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/testService/v-test-service.php');
}
