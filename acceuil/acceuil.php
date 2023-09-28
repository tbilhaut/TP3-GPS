<?php
session_start();
include ("../bdd/bdd.php");
include("../fonction/fonction.php");
Deconnexion();

$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    header('location: ../index.php');
    exit;
}
if(isset($_POST['compte'])){
    header('location: ../compte/compte.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuil.css">
    <title>Document</title>
</head>
<body>

    <div class="center-vertically center-horizontally">
    <h1>GPS</h1>
        <form method="post">
            <input type="submit" name= "compte" value="compte">
            <input type="submit" name= "deconnexion" value="deconnexion">
       </form>
    </div>
  <link href="https://fonts.googleapis.com/css?family=Playball" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

</body>
</html>