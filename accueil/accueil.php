<?php

session_start();
include("../bdd/bdd.php");
include("../class/user.php"); 

$id_utilisateur = $_SESSION['id_utilisateur'];

// L'exit est rajouté à chaque fin de "if" pour éviter que le reste de code ne s'exécute intentionnellement si la condition
// n'est pas remplie.

// Vérifier si l'utilisateur est connecté via la session
if (!isset($_SESSION['id_utilisateur'])) {
    header('location: ../index.php');
    exit;
}

// Si l'utilisateur souhaite se déconnecter
if (isset($_POST['deconnexion'])) {
    User::Deconnexion(); // Appel de la fonction "Deconnexion" dans la Class User
    header('location: ../index.php'); // Redirection vers l'Index
    exit;
}

// Si l'utilisateur souhaite accéder à la gestion de son compte
if (isset($_POST['compte'])) {
    header('location: ../compte/compte.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>PROJET - Acceuil</title>
    <link rel="Icône Boussole" href="../img/boussole_logo.png" type="image/x-icon">
</head>
<body>
    <div class="center-vertically center-horizontally">
        <h1>GPS</h1>
        <form method="post">
            <input type="submit" name="compte" value="Compte">
            <input type="submit" name="deconnexion" value="Déconnexion">
        </form>
    </div>
    <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
</body>
</html>
