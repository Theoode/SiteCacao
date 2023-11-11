<?php

require_once('src/model.php');

function accueil(){
    $menu['page']="accueil";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/acceuil/v-accueil.php');
    require('view/inc/inc.footer.php');
}