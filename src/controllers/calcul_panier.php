<?php

$panier = [];
if (isset($_SESSION['panier'])) {
    $panier = $_SESSION['panier'];
}

$total_sous_total = 0;
$total = 0;
$frais_livraison = 4.99;

foreach ($panier as $produit) {
    $sous_total = $produit['prix'] * $produit['quantite'];
    $total_sous_total += $sous_total;
}

$total = $total_sous_total + $frais_livraison;

// Retourner les totaux
return [
    'total_sous_total' => $total_sous_total,
    'total' => $total
];


