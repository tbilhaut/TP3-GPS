<?php
session_start();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="connexion/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <title>Mon site - Connexion</title>
</head>

<body>
  <div class="container">
    <div id="connexion">
      <p class="paragraphe">
        <div id="connexion">
          <h1 class="title">Connexion</h1>
          <p class="paragraphe">
            Veuillez remplir tous les champs
          </p>
          <form class="formulaire">
            <div class="group-form">
              <input type="text" placeholder="Nom">
              <div class="icon-user"></div>
            </div>
            <div class="group-form">
              <input type="password" placeholder="password">
              <div class="icon-password"></div>
            </div>
            <div class="group-form">
              <a href="#" class="btn-link connexion">Se connecter</a>
            </div>
          </form>
          </div>
    </div>
    <div id="inscription">
      <h1 class="title">Créer un compte</h1>
      <p class="paragraphe">
        Veuillez remplir tous les champs
      </p>
      <form class="formulaire">
        <div class="group-form">
          <input type="text" placeholder="Nom">
          <div class="icon-user"></div>
        </div>
        <div class="group-form">
          <input type="password" placeholder="password">
          <div class="icon-password"></div>
        </div>
        <div class="group-form">
          <input type="password" placeholder="retype password">
          <div class="icon-password"></div>
        </div>
        <div class="group-form">
          <input type="submit" class="inscription" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
</body>

</html>