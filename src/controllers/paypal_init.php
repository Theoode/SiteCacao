<?php

require_once('vendor/autoload.php');

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        'YOUR_CLIENT_ID',     // Remplacez par votre ID client PayPal
        'YOUR_CLIENT_SECRET'  // Remplacez par votre secret client PayPal
    )
);

$apiContext->setConfig([
    'mode' => 'sandbox', // Utilisez 'live' pour la production
]);

// Maintenant, vous pouvez utiliser $apiContext pour effectuer des appels API PayPal

