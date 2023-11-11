<div style="margin-left:22%;margin-top: 2%;margin-right: 5%">
    <h1>Liste des fonctionnalités de l'API</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>URL</th>
            <th>Paramètre</th>
            <th>Méthode</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($lstAPI as $data) : ?>
            <tr>
                <td><?php echo $data['url']?></td>
                <td><?php echo $data['param'] ?></td>
                <td><?php echo $data['method'] ?></td>
                <td><?php echo $data['statut'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>