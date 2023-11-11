<table>

    <tr>
        <td>Id Produit</td>
        <td>Nom</td>
        <td>avant</td>
        <td>après</td>
        <td>resultat</td>
    </tr>

    <?php foreach ($lstRetour as $unRetour):
        ?>

        <tr>
            <td><?=$unRetour['id']?></td>
            <td><?=$unRetour['nom']?></td>
            <td><?=$unRetour['quantite']?></td>
            <td><?=$unRetour['retour']?></td>
        </tr>

    <?php endforeach;?>
</table>
