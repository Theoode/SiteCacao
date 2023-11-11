<?php

function commandeaccepte(){
    $menu['page']= "commandeaccepte";
    require('view/paiement/v-valide.php');
    require('view/inc/inc.header.php');
    require('view/inc/inc.head.php');
}

function commanderefuse(){
    $menu['page']= "commanderefuse";
    require('view/paiement/v-echec.php');
    require('view/inc/inc.header.php');
    require('view/inc/inc.head.php');
}

function commandeannule(){
    $menu['page']= "commandeannule";
    require('view/paiement/v-annule.php');
    require('view/inc/inc.header.php');
    require('view/inc/inc.head.php');

}