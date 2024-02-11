<?php


require_once('src/model.php');

function accueil()
{
    $menu['page'] = 'accueil';
    require('view/v-accueil.php');
    require('view/inc/footer.php');
}
