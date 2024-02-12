<?php

require_once('src/model.php');

function conexion()
{
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        // Vérifier les données dans la base de données
        $conn = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");

        // Vérifier la connexion
        if ($conn === false) {
            die("Erreur : Impossible de se connecter. " . mysqli_connect_error());
        }

        // Préparer la requête SQL pour récupérer l'utilisateur
        $sql = "SELECT * FROM conexion WHERE mail='$mail'";

        // Exécuter la requête
        $result = mysqli_query($conn, $sql);

        // Vérifier s'il y a un résultat
        if (mysqli_num_rows($result) > 0) {
            // Récupérer le résultat
            $row = mysqli_fetch_assoc($result);
            // Vérifier le mot de passe
            if (password_verify($mdp, $row['mdp'])) {
                // Authentification réussie
                // Rediriger ou effectuer d'autres actions
                echo "Connexion réussie!";
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect";
            }
        } else {
            // Adresse e-mail incorrecte
            echo "Adresse e-mail incorrecte";
        }

        // Fermer la connexion
        mysqli_close($conn);
    } else {

        $menu['page'] = 'connexion';
        require('view/inc/head.php');
        require('view/v-conexion.php');
        require('view/inc/footer.php');
    }
}
