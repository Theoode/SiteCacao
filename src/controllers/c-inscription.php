
<?php

require_once('src/model.php');

function inscription()
{
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $sexe = $_POST['sexe'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $age = $_POST['age'];

        // Vous pouvez ajouter des validations supplémentaires ici

        // Insérer les données dans la base de données
        $conn = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");

        // Vérifier la connexion
        if ($conn === false) {
            die("Erreur : Impossible de se connecter. " . mysqli_connect_error());
        }

        // Hasher le mot de passe
        $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

        // Préparer la requête SQL pour insérer l'utilisateur
        $sql = "INSERT INTO conexion (mail, mdp, sexe, nom, prenom, adresse, code_postal, age) VALUES ('$mail', '$hashed_password', '$sexe', '$nom', '$prenom', '$adresse', '$code_postal', '$age')";

        // Exécuter la requête
        if (mysqli_query($conn, $sql)) {
            echo "Inscription réussie!";
            // Vous pouvez rediriger l'utilisateur vers une page de succès ou effectuer d'autres actions
        } else {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
        }

        // Fermer la connexion
        mysqli_close($conn);
    } else {
        // Le formulaire n'a pas été soumis, afficher le formulaire d'inscription
        $menu['page'] = 'inscription';
        require('view/inc/head.php');
        require('view/v-inscription.php');
    }
}

