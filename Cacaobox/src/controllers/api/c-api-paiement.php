<?php


require_once('src/model.php');

function APIpaiement()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        die("Méthode non autorisée");
    }

    if (!isset($_POST['token']) || $_POST['token'] !== 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ=') {
        http_response_code(401);
        die("Non autorisé");
    }

    if (isset($_POST['idPaiement']) && $_POST ['idPaiement'])
        $data = get_results("SELECT * FROM paiement WHERE idPaiement='" . $_POST['idPaiement'] . "'");
    else
        $data = get_results("SELECT * FROM paiement");

    echo json_encode($data);
}
