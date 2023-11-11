<div class="product-details container">
    <div class="row">
        <img src="https://static4.depositphotos.com/1004590/372/i/950/depositphotos_3729494-stock-photo-new-paper-article.jpg" style="width: 600px;height="500px">
        <div class="col-md-6">
            <h2><?= $unPost['titre']?></h2>
            <p><strong>Contenu</strong> <?= $unPost['contenu']?></p>
            <p><strong></strong> <?= $unPost['date_creation']?></p>
        </div>
        <div class="col-md-6">
            <form action="panier/<?= $unPost['identifiant']?>/"method="post" </form>
        </div>
    </div>
</div>