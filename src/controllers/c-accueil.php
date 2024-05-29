
<?php


require_once('src/model.php');

function accueil()
{
    $menu['page'] = 'accueil';
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-accueil.php');
}
