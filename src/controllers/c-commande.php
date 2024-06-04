
<?php


require_once('src/model.php');
function commande()
{
    global $pdo;

    $menu['page'] = 'commande';
    require('view/inc/head.php');
    require('view/inc/header.php');
    require('view/v-commande.php');
}


function insert_client_commande(){
    global $pdo;

    // Récupération des valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT); // Hashage du mot de passe
    $mail = $_POST['email'];
    $tel = $_POST['tel'];

    // Préparation de la requête SQL avec des paramètres nommés
    $query = /** @lang text */
        "INSERT INTO client (nom, prenom, email, tel, motdepasse) 
              VALUES (:nom, :prenom, :email, :tel, :mdp)";

    // Préparation de la requête
    $stmt = $pdo->prepare($query);

    // Liaison des paramètres avec les valeurs du formulaire
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $mail);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':mdp', $mdp);

    // Exécution de la requête
    $result = $stmt->execute();



    // Vérification du résultat de l'exécution
    if ($result) {
        echo "Client inséré avec succès.";
    } else {
        echo "Erreur lors de l'insertion du client.";
    }
}


// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert_client_commande'])) {
    insert_client_commande();
    header('Location:paiement');

