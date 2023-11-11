<div class="album py-5 bg-light">
    <div class="container" >
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($listProduit as $unProduit): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top h-25 w-100"
                             src="<?=$unProduit['image']?>"
                             height="225"
                             width="100%">
                        <div class="card-body">
                            <p class="card-text">
                                <?=$unProduit['nom']?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="produit/<?=$unProduit['identifiant']?>/" class="btn btn-sn btn-outline-secondary">Voir le produit</a>
                                </div>
                                <large class=""<?=$unProduit['prix']?>€</large>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>