<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            foreach($listPost as $unPost):
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                      <img src="https://static4.depositphotos.com/1004590/372/i/950/depositphotos_3729494-stock-photo-new-paper-article.jpg">
                        <div class="card-body">
                            <p class="card-text"><?=$unPost['titre']?> </p>
                            <div class="d-flex justify-content-between align-items-center">
                                    <a href="post/<?=$unPost['identifiant']?>/"> Voir l'article</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>