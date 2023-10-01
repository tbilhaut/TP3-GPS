<?php

session_start();

include("bdd/bdd.php");
include("class/user.php");

$message; // Variable utilisée en cas d'erreur(s)

if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];

    // Vérifier l'authentification
    if (User::Autorisation($login, $passwd)) {
        // Utiliser la fonction getUserIdByLogin pour obtenir l'ID
        $id_utilisateur = User::getUserIdByLogin($login);

        // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['id_utilisateur'] = $id_utilisateur;

        // Rediriger l'utilisateur vers la page d'accueil
        header('location: accueil/acceuil.php');
        exit(); // Terminer le script après la redirection
    } else {
        $message = "Erreur d'authentification. Veuillez réessayer.";
    }
}

// Traitement du formulaire d'inscription
if (isset($_POST['inscription'])) {
    $login = $_POST['new_login'];
    $passwd = $_POST['new_passwd'];

    // On effectue l'inscription en utilisant la fonction "Inscription" de la Class User
    $result = User::Inscription($login, $passwd);

    if ($result === true) {
        $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } else {
        $message = "Erreur d'inscription : $result";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion/connexion.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <title>Mon site - Connexion</title>
    <link rel="Icône Boussole" href="img/boussole_logo.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div id="connexion">
            <h1 class="title">Connexion</h1>
            <p class="paragraphe">
                Veuillez remplir tous les champs.
            </p>
            <form class="formulaire" method="post">
                <div class="group-form">
                    <input type="text" id="login" name="login" placeholder="Votre Login" required>
                    <div class="icon-user"></div>
                </div>
                <div class="group-form">
                    <input type="password" id="passwd" name="passwd" placeholder="Mot de passe" required>
                    <div class="icon-password"></div>
                </div>
                <div class="group-form">
                    <input type="submit" class="connexion" name="connexion" value="Se Connecter">
                </div>
            </form>
        </div>
        <div id="inscription">
            <h1 class="title">Créer un compte</h1>
            <p class="paragraphe">
                Veuillez remplir tous les champs
            </p>
            <form class="formulaire" method="post">
                <div class="group-form">
                    <input type="text" id="new_login" name="new_login" placeholder="Choisir un Login" required>
                    <div class="icon-user"></div>
                </div>
                <div class="group-form">
                    <input type="password" id="new_passwd" name="new_passwd" placeholder="Mot de passe" required>
                    <div class="icon-password"></div>
                </div>
                <div class="group-form">
                    <input type="password" name="confpass" placeholder="Confirmez le Mot de passe" required>
                    <div class="icon-password"></div>
                </div>
                <div class="group-form">
                    <input type="submit" class="inscription" name="inscription" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>

    <?php
    // Afficher le message d'erreur ou de succès
    if (!empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
