
<?php


require_once('src/model.php');
function commande()
{
    $menu['page'] = 'commande';
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-commande.php');

}
