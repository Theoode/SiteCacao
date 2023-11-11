<?php

require_once('src/model.php');

function liste(){
    $menu['page'] = 'liste';

    require('view/inc/head.php');
    require('view/inc/header.php');

    $url='https://s4-gp95.kevinpecro.info/api/liste/';

    $data=array(
        'token'=> 'Q2VjaSBlc3QgdW4gZXhhbXBsZSBkJ2VuY29kYWdlIGVuIEJhc2UgNjQ='
    );

    $lstAPI = model($url, $data);

    require('view/v-liste.php');
    require('view/inc/footer.php');

}
