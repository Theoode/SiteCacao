<!DOCTYPE html>
<html>
<head>
    <title>Page client</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Importer Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Colonne du header latéral -->
        <div class="col-lg-2 text-light "style="position: fixed;top: 0;left: 0;height: 100%;width: 20%;background-color: #343a40;color: #fff;padding: 20px;box-sizing: border-box;">
            <h2 style="margin-left: 33%">CMS</h2>
            <hr>
            <!-- Liste des liens -->
            <ul class="nav flex-column" style="text-align: center;gap: 15px">
                <li class="nav-item">
                    <a class="nav-link btn btn-dark<?php if($menu['page'] == 'liste')echo "active"; ?>"href="liste/" ><li>Liste</li></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark<?php if($menu['page'] == 'paiement')echo "active"; ?>"href="paiement/" ><li>Paiement</li></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark<?php if($menu['page'] == 'commande')echo "active"; ?>"href="commande/" ><li>Commande</li></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark<?php if($menu['page'] == 'test')echo "active"; ?>"href="test/" ><li>Test</li></a>

                </li>

                <h4 style="margin-top: 100%">Quennehen Théo</h4>
            </ul>
        </div>
    </div>
</div>
</body>
</html>



