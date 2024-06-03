<?php

require_once('vendor/autoload.php');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;



$clientId = 'VOTRE_ID_CLIENT_PAYPAL';
$clientSecret = 'VOTRE_SECRET_CLIENT_PAYPAL';

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        $clientId,
        $clientSecret
    )
);

$apiContext->setConfig([
    'mode' => 'sandbox',
]);

$payment = new Payment();