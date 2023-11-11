<h1 style="margin-left: 20%;text-decoration: underline">Affichage du paiment</h1>
<h3 style="margin-left: 20%;margin-top: 30px">Information paiement:</h3>


<table style="width: 52%;margin-left: 20%;margin-top: 30px"  border="2" class="table table-bordered table-striped">
    <?php foreach ($paiement as $unpaiement): ?>
    <tr>
        <td>Id Paiement</td>
        <td><?php echo $unpaiement['idPaiement']; ?></td>
    </tr>
    <tr>
        <td>Prenom</td>
        <td><?php echo $unpaiement['prenom']; ?></td>
    </tr>
    <tr>
        <td>Nom</td>
        <td><?php echo $unpaiement['nom']; ?></td>
    </tr>
    <tr>
        <td>Date</td>
        <td><?php echo $unpaiement['Date']; ?></td>
    </tr>
    <tr>
        <td>Référence</td>
        <td><?php echo $unpaiement['Reference']; ?></td>
    </tr>
    <tr>
        <td>Prix</td>
        <td><?php echo $unpaiement['prix']; ?></td>
    </tr>


</table>

<?php endforeach; ?>




