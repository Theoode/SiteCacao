
<?php

if(!isset($menu['page']) || !$menu['menu']) $menu['page'] = null;

?>

<!--Le header -->
<div class="container" style="position: relative">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <img src="../../src/includes/images/logo.png" height="50px" width="50px">
            <span class="fs-4">Cacaobox</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link <?php if($menu['page'] == 'acceuil')echo "active"; ?>" href="/">Accueil</a></li>
            <li class="nav-item">
                <a class="nav-link  <?php if($menu['page'] == 'produit')echo "active"; ?> " href="produit/">Produit</a></li>
            <li class="nav-item">
                <a class="nav-link  <?php if($menu['page'] == 'post')echo "active"; ?> " href="post/">Blog</a></li>
            <li class="nav-item">
                <a class="nav-link  <?php if ($menu['page']  == 'panier')echo "active"; ?> " href="panier/">Panier</a></li>

        </ul>
    </header>
</div>









