<?php
// Inclure le fichier de connexion à la base de données et la classe User
include("bdd/bdd.php");
include("class/user.php");

// Initialiser la variable de message d'erreur
$message = "erreur !";

// Traitement du formulaire de connexion
if (isset($_POST['connexion'])) {
    $login = $_POST['login'];
    $passwd = $_POST['passwd'];

    // Vérifier l'authentification
    if (User::Autorisation($login, $passwd)) {
        $message = "Connexion réussie. Bienvenue, $login!";
        // Vous pouvez rediriger l'utilisateur vers la page d'accueil ici
    } else {
        $message = "Erreur d'authentification. Veuillez réessayer.";
    }
}

// Traitement du formulaire d'inscription
if (isset($_POST['inscription'])) {
    $login = $_POST['new_login'];
    $passwd = $_POST['new_passwd'];

    // Effectuer l'inscription
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
    <title>Connexion et Inscription</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="passwd">Mot de passe:</label>
        <input type="password" id="passwd" name="passwd" required>
        <br>
        <input type="submit" name="connexion" value="Se connecter">
    </form>

    <h1>Inscription</h1>
    <form method="POST">
        <label for="new_login">Nouveau Login:</label>
        <input type="text" id="new_login" name="new_login" required>
        <br>
        <label for="new_passwd">Nouveau Mot de passe:</label>
        <input type="password" id="new_passwd" name="new_passwd" required>
        <br>
        <input type="submit" name="inscription" value="S'inscrire">
    </form>

    <?php
    // Afficher le message d'erreur ou de succès
    if (!empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
