<?php
$nomBase = "Sitecacao";
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
