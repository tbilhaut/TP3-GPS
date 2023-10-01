<?php

    session_start();
    include ("../bdd/bdd.php");
    include("../class/user.php");
    Deconnexion();
    
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
    <section class="account-management">
      <h1>Account Management</h1>
      <div class="profile-details">
        <h2>Profile Details</h2>
        <div class="profile-detail-row">
          <label for="first-name">login:</label>
          <span id="first-name">John</span>
        </div>
        <div class="profile-detail-row">
          <label for="last-name">password:</label>
          <span id="last-name">Doe</span>
        </div>
        <button class="update-profile-btn">Update Profile</button>
      </div>
</body>
</html>