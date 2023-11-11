
<main class="w-100 mt-3 mb-3" style="padding-right: 280px;">
    <div style="margin-left:27%">
        <section class="section-commande">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center mb-5 ">Liste Paiements</h1>
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Prix</th>
                                <th>Date</th>
                                <th>Référence</th>
                                <th>En savoir plus</th>
                            </tr>
                            </thead>
                            <?php foreach ($paiementListe as $paiement): ?>
                                <tr>
                                    <td><?php echo $paiement['idPaiement']; ?></td>
                                    <td><?php echo $paiement['nom']; ?></td>
                                    <td><?php echo $paiement['prenom']; ?></td>
                                    <td><?php echo $paiement['prix']; ?>€</td>
                                    <td><?php echo $paiement['Date']; ?></td>
                                    <td><?php echo $paiement['Reference']; ?></td>
                                    <td><a href="paiement/<?php echo $paiement['idPaiement']; ?>/" class="btn btn-info">Consulter</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main