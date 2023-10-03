<?php
session_start();
include("../bdd/bdd.php");
include("../class/user.php");

$id_utilisateur = $_SESSION['id_utilisateur'];

if (!isset($_SESSION['id_utilisateur'])) {
    header('location: ../index.php');
    exit;
}
    if (isset($_POST['deconnexion'])) {
      User::Deconnexion(); // Appel de la fonction "Deconnexion" dans la Class User
      header('location: ../index.php'); // Redirection vers l'Index
      exit;
  }
  if (isset($_POST['acceuil'])) { 
    header('location: ../accueil/accueil.php'); // Redirection vers l'Index
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
    <form id="profile-form" method="POST">
      <input type="submit" name="deconnexion" value="Déconnexion">
      <input type="submit" name="acceuil" value="Acceuil">
      <div class="profile-detail-row">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="John">
      </div>
      <div class="profile-detail-row">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="Doe">
      </div>
      <div class="profile-detail-row">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password">
      </div>
      <input type="submit" class="update-profile-btn" name="changpasswd" value="changement password">
      <input type="submit" class="update-profile-btn" name="supprimer" value="supprimer compte">
    </form>
    <?php
    if (isset($errorMessage)) {
        echo "<p>$errorMessage</p>";
    }
    ?>
  </main>
</body>
</html>
