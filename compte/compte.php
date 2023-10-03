<?php

    session_start();
    include ("../bdd/bdd.php");
    include("../class/user.php");
    
    $id_utilisateur = $_SESSION['id_utilisateur'];
    if (!isset($_SESSION['id_utilisateur'])) // Vérification si l'user est bien connecté
{
    header('location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJET - Mon Espace</title>
    <link rel="stylesheet" href="compte.css">
    <link rel="Icône Boussole" href="../img/boussole_logo.png" type="image/x-icon">
</head>

<body>
  <header>
    <nav>
      <!-- Add your navigation links here -->
    </nav>
  </header>
  <main>
  <form id="profile-form">
  <div class="profile-detail-row">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" value="John">
  </div>
  <div class="profile-detail-row">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="Doe">
  </div>
  <button type="submit" class="update-profile-btn">Update Profile</button>
</form>
</body>
</html>