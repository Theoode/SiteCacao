
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/output.css" rel="stylesheet">
</head>

<?php include "inc/header.php"?>

<body>
<h1>Liste des Produits</h1>


<div class="mx-auto mt-11 w-80 transform overflow-hidden rounded-lg bg-white dark:bg-slate-800 shadow-md duration-300 hover:scale-105 hover:shadow-lg">
    <?php foreach ($produits as $produit): ?>
        <div class="flex">
            <img class="h-48 max-w-16 object-cover object-center" src="<?= htmlspecialchars($produit['photo']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>" alt="Product Image" />
            <div class="p-4 w-1/2">
                <h2 class="mb-2 text-lg font-medium dark:text-white text-gray-900"><?= htmlspecialchars($produit['nom']) ?></h2>
                <p class="mb-2 text-base dark:text-black text-gray-700"><?= htmlspecialchars($produit['description']) ?></p>
                <div class="flex items-center">
                    <p class="mr-2 text-lg font-semibold text-gray-900 dark:text-black"><?= htmlspecialchars($produit['prix']) ?>€</p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>




</body>