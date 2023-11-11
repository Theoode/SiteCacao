<?php

require_once('src/model.php');

function testService()
{
    commandsList200();
    commandsList405();
    commandsList401();

    onePaiement200();
    onePaiement405();
    onePaiement401();

    listApi200();
    listApi405();
    listApi401();
}

function commandsList200()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/commande/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);

}

function onePaiement200()
{
    $id_paiement = get_result('SELECT id_paiement FROM paiement LIMIT 1');
    $url = 'https://s4-gp95.kevinpecro.info/api/paiement/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'idPaiement'=>$id_paiement['id_paiement']
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function listApi200()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/liste/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function commandsList405()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/commande/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'GET');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function onePaiement405()
{
    $id_paiement = get_result('SELECT id_paiement FROM paiement LIMIT 1');
    $url = 'https://s4-gp95.kevinpecro.info/api/paiement/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'idPaiement'=>$id_paiement['id_paiement']
    );

    $response = callAPIService($url, $data, 'GET');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function listApi405()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/liste/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'GET');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function commandsList401()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/commande/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function onePaiement401()
{
    $id_paiement = get_result('SELECT id_paiement FROM paiement LIMIT 1');
    $url = 'https://s4-gp95.kevinpecro.info/api/paiement/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
        'idPaiement'=>$id_paiement['id_paiement']
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}

function listApi401()
{
    $url = 'https://s4-gp95.kevinpecro.info/api/liste/';
    $data = array(
        'token' => 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=',
    );

    $response = callAPIService($url, $data, 'POST');

    $valuesInsert = array(
        "code_erreur" => $response['code_erreur'],
        "reponse" => $response['data'],
        "url" => $url,
        "date"=>  date("Y-m-d H:i:s")
    );

    set_insert("test_api",$valuesInsert);
}
