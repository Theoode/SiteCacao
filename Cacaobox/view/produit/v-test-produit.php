<table>
    <tr>
        <td>Id Produit</td>
        <td>Nom</td>
        <td>Quantite avant</td>
        <td>Quantite apres</td>
        <td>Retour</td>
    </tr>

    <?php foreach ($lstResultat as $unRetour):
        ?>
        <tr>
            <td><?=$unRetour['id']?></td>
            <td><?=$unRetour['nom']?></td>
            <td><?= $unRetour['quantite'] ?></td>
            <td><?=$unRetour['retour']?></td>
        </tr>
    <?php endforeach; ?>
</table>
