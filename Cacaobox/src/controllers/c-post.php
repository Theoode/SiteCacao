<?php

require_once('src/model.php');

function post()
{
    if (isset($_GET['identifiant']) && $_GET['identifiant']) {
        $_GET['identifiant'] = rtrim($_GET['identifiant'], "/");
        $unPost = get_result("SELECT * FROM post WHERE identifiant ='" . $_GET['identifiant'] . "'");
        postSimple($unPost);
    } else {
        $listPost = get_results("SELECT * FROM post WHERE statut=1");
        postList($listPost);
    }
}

function postSimple($unPost)
{
    $menu['page'] = "post";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/post/v-post.php');
    require('view/inc/inc.footer.php');
}

function postList($listPost)
{
    $menu['page'] = "post";
    require('view/inc/inc.head.php');
    require('view/inc/inc.header.php');
    require('view/post/v-post_list.php');
    require('view/inc/inc.footer.php');
}

