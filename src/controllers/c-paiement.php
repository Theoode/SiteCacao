<?php


require_once('src/model.php');

function paiement()
{
    $menu['page'] = 'paiement';
    require('view/inc/head.php');
    require('view/v-paiement.php');
}