<?php
// Connexion à la base de données avec PDO
$nomBase = "sitecacao";
$adrServ = "localhost";
$portServ = 3306;
$userName = "root";
$userPWd = "";

try {
    $pdo = new PDO(
        "mysql:host=$adrServ;port=$portServ;dbname=$nomBase;charset=UTF8", $userName, $userPWd
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// Fonction pour exécuter une requête SQL et récupérer les résultats
function get_result($query) {
    global $pdo; // Utiliser la connexion PDO dans cette fonction

    // Exécution de la requête SQL
    $result = $pdo->query($query);

    return $result;
}
?>

