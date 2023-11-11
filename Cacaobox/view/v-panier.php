<?php
$total = 0;

if($contenuPanier):
    ?>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantite</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contenuPanier as $unProduit):
                $total += $unProduit['quantite']*$unProduit['prix'];
                ?>
                <tr>
                    <td><?=$unProduit['nom']?></td>
                    <td><?=$unProduit['prix']?> €</td>
                    <td><?=$unProduit['quantite']?></td>
                    <td><?=$unProduit['quantite']*$unProduit['prix']?> €</td>
                    <td>
                        <a href="panier/<?=$unProduit['id']?>/" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td><?=$total?> €</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-4 col-12 align-self-end">
                <div class="card">
                    <div class="card-body">

                        Total <?=$total?> €
                    </div>
                </div>
            </div>
            <div class="col-12">
                <a href="commander/">Commander</a>
            </div>
        </div>
    </div>
<?php
else:
    echo "Panier vide";
endif;
?>