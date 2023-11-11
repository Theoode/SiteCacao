<h1 style="margin-left: 20%;text-decoration: underline">Affichage du détail</h1>
<h3 style="margin-left: 20%;margin-top: 30px">Information commande:</h3>


<table style="width: 52%;margin-left: 20%;margin-top: 30px"  border="2" class="table table-bordered table-striped">
        <?php foreach ($commande as $unecommande): ?>
    <tr>
        <td>id</td>
        <td><?php echo $unecommande['id']; ?></td>
    </tr>
    <tr>
        <td>id Client</td>
        <td><?php echo $unecommande['id_client']; ?></td>
    </tr>
    <tr>
        <td>Nom</td>
        <td><?php echo $unecommande['nom']; ?></td>
    </tr>
    <tr>
        <td>Prenom</td>
        <td><?php echo $unecommande['prenom']; ?></td>
    </tr>
    <tr>
        <td>Mail</td>
        <td><?php echo $unecommande['email']; ?></td>
    </tr>
    <tr>
        <td>Adresse</td>
        <td><?php echo $unecommande['adresse']; ?></td>
    </tr>
    <tr>
        <td>Complément</td>
        <td><?php echo $unecommande['complement']; ?></td>
    </tr>
    <tr>
        <td>Code Postal</td>
        <td><?php echo $unecommande['code_postal']; ?></td>
    </tr>
    <tr>
        <td>Ville</td>
        <td><?php echo $unecommande['ville']; ?></td>
    </tr>
</table>


<h3 style="margin-left: 20%;margin-top: 15px">Information Livraison:</h3>
<table style="width: 52%;margin-left: 20%;margin-top: 30px" class="table table-bordered table-striped" border="2">
    <tr>
        <td>Nom Livraison</td>
        <td><?php echo $unecommande['nom_livraison']; ?></td>
    </tr>
    <tr>
        <td>Prenom Livraison</td>
        <td><?php echo $unecommande['prenom_livraison']; ?></td>
    </tr>
    <tr>
        <td>Mail Livraison</td>
        <td><?php echo $unecommande['email_livraison']; ?></td>
    </tr>
    <tr>
        <td>Adresse Livraison</td>
        <td><?php echo $unecommande['adresse_livraison']; ?></td>
    </tr>
    <tr>
        <td>Complément Livraison</td>
        <td><?php echo $unecommande['complement_livraison']; ?></td>
    </tr>
    <tr>
        <td>Code Postal Livraison</td>
        <td><?php echo $unecommande['code_postal_livraison']; ?></td>
    </tr>
    <tr>
        <td>Ville Livraison</td>
        <td><?php echo $unecommande['ville_livraison']; ?></td>
    </tr>
</table>


        <?php endforeach; ?>




