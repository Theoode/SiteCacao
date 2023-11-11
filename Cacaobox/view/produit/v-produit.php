<div class="row">
    <div class="card shadow-sm">
        <div class="row">
            <div class="col-md-6 text-center col-left">
                <img src="<?=$unProduit['image']?>" height="340" style="margin-right: -30px; margin-top: 30px">
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <rect width="100%" height="100%" fill="#55595c"/>
                    <strong x="50%" y="50%" fill="#eceeef" dy=".3em" style="margin-left: 30px">
                        <?=$unProduit['nom']?>
                    </strong>
                    <p class="card-text" style="margin-top: 20px;">
                        <?=$unProduit['description']?>
                    </p>
                    <p class="card-text" style="margin-top: 20px;">Prix : <?php echo $unProduit['prix']; ?></p>
                    <form method="post" style="margin-top: 20px;">
                        <label for="quantite">Quantité :</label>
                        <input type="number" name="produit_quantite" value="1" min="1" max="10">
                        <input type="submit" value="Ajouter au panier" name="ajout_panier">
                        <input type="hidden" name="id_produit" value="<?=$unProduit['id_produit']?>">
                    </form>
                    <?php if($checkAjout) echo "<p>Le produit a bien été ajouté dans le panier</p>"; ?>
                </div>
            </div>
        </div>
    </div>
</div>