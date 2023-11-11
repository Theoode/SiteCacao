<?php

function paiement()
{

// --------------- VARIABLES A MODIFIER ---------------

// Ennonciation de variables
$pbx_site = '3277512';								//variable de test 9999999
$pbx_rang = '001';								//variable de test 095
$pbx_identifiant = '38023694';					//variable de test 123456789
$pbx_cmd = '22gp95-test41';							//variable de test cmd_test1
$pbx_porteur = 'kevin.pecro@u-picardie.fr';			//variable de test test@test.fr
$pbx_total = '2000';								//variable de test 200
$pbx_nb_produit = '5';					//variable de test 5
$pbx_prenom_fact = 'jean';				//variable de test jean
$pbx_nom_fact = 'dupont';					//variable de test dupont
$pbx_adresse1_fact = '1 rue de Paris';				//variable de test 1 rue de Paris
$pbx_adresse2_fact = ' ';				//variable de test <vide>
$pbx_zipcode_fact = '75001';				//variable de test 75001
$pbx_city_fact = 'Paris';					//variable de test Paris
$pbx_country_fact = '250';	//variable de test 250 (pour la France)
$pbx_souhaitauthent = '1';
if($pbx_total > 3000) {
   $pbx_souhaitauthent = '1';
}

// Suppression des points ou virgules dans le montant
$pbx_total = str_replace(",", "", $pbx_total);
$pbx_total = str_replace(".", "", $pbx_total);

// Paramétrage des urls de redirection navigateur client après paiement
$pbx_effectue = 'https://s4-gp95.kevinpecro.info/accepte/';
$pbx_annule = 'https://s4-gp95.kevinpecro.info/annule/';
$pbx_refuse = 'https://s4-gp95.kevinpecro.info/refuse/';
// Paramétrage de l'url de retour back office site
$pbx_repondre_a = 'https://s4-gp95.kevinpecro.info';

// Paramétrage du retour back office site
$pbx_retour = 'https://s4-gp95.kevinpecro.info';

// Connection à la base de données
$hmackey = 'E28ED3CE6CA7AC848C2E47072DBC609838CDDD08AAB2E93C4C1C02067B16C81FDFD31322F9E397F75186AADA74B828C31821A4258F95D93608E3575158B04966';


// --------------- TESTS DE DISPONIBILITE DES SERVEURS ---------------

$serveurs = array('tpeweb.e-transactions.fr', 'tpeweb1.e-transactions.fr');

foreach($serveurs as $serveur){
    $doc = new DOMDocument();
    $doc->loadHTMLFile('https://'.$serveur.'/load.html');
    $server_status = "";
    $element = $doc->getElementById('server_status');
    if($element){
        $server_status = $element->textContent;}
    if($server_status == "OK"){
        $serveurOK = $serveur;
        break;}
}

//curl_close($ch);
if(!$serveurOK){
    die("Erreur : Aucun serveur n'a été trouvé");}
// Activation de l'univers de recette
$serveurOK = 'recette-tpeweb.e-transactions.fr';

//Création de l'url e-Transactions
$serveurOK = 'https://'.$serveurOK.'/php/';



// --------------- TRAITEMENT DES VARIABLES ---------------

// On récupère la date au format ISO-8601
$dateTime = date("c");

$pbx_shoppingcart = "<?xml version=\"1.0\" encoding=\"utf-8\"?><shoppingcart><total><totalQuantity>".$pbx_nb_produit."</totalQuantity></total></shoppingcart>";

$pbx_billing = "<?xml version=\"1.0\" encoding=\"utf-8\"?><Billing><Address><FirstName>".$pbx_prenom_fact."</FirstName>".
    "<LastName>".$pbx_nom_fact."</LastName><Address1>".$pbx_adresse1_fact."</Address1>".
    "<Address2>".$pbx_adresse2_fact."</Address2><ZipCode>".$pbx_zipcode_fact."</ZipCode>".
    "<City>".$pbx_city_fact."</City><CountryCode>".$pbx_country_fact."</CountryCode>".
    "</Address></Billing>";


// On crée la chaîne à hacher sans URLencodage
$msg = "PBX_SITE=".$pbx_site.
    "&PBX_RANG=".$pbx_rang.
    "&PBX_IDENTIFIANT=".$pbx_identifiant.
    "&PBX_TOTAL=".$pbx_total.
    "&PBX_DEVISE=978".
    "&PBX_CMD=".$pbx_cmd.
    "&PBX_PORTEUR=".$pbx_porteur.
    "&PBX_REPONDRE_A=".$pbx_repondre_a.
    "&PBX_RETOUR=".$pbx_retour.
    "&PBX_EFFECTUE=".$pbx_effectue.
    "&PBX_ANNULE=".$pbx_annule.
    "&PBX_REFUSE=".$pbx_refuse.
    "&PBX_HASH=SHA512".
    "&PBX_RUF1=POST".
    "&PBX_TIME=".$dateTime.
    "&PBX_SHOPPINGCART=".$pbx_shoppingcart.
    "&PBX_BILLING=".$pbx_billing;




$binKey = pack("H*", $hmackey);
$hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

	require('view/inc/inc.head.php');
	require('view/produit/v-paiement.php');


}
