
<main class="w-100 mt-3 mb-3" style="padding-right: 280px;">
    <div style="margin-left:27%">
        <section class="section-commande">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center mb-5 ">Liste Commandes</h1>
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Adresse</th>
                                <th>Statut</th>
                                <th>En savoir plus</th>
                            </tr>
                            </thead>
                            <?php foreach ($commandeListe as $commande): ?>
                                <tr>
                                    <td><?php echo $commande['id']; ?></td>
                                    <td><?php echo $commande['nom']; ?></td>
                                    <td><?php echo $commande['prenom']; ?></td>
                                    <td><?php echo $commande['email']; ?></td>
                                    <td><?php echo $commande['adresse']; ?></td>
                                    <td><?php echo $commande['statut']; ?></td>
                                    <td><a href="commande/<?php echo $commande['id']; ?>/" class="btn btn-info">Consulter</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>