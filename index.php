<?php
session_start();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="connexion/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <script src="connexion/script.js" defer></script>
  <title>Mon site - Connexion</title>
</head>

<?php
try // Connexion à la BDD sur PHPMyAdmin
    {
      include ("bdd/bdd.php");

    if(isset($_POST['connexion'])) {
      $requete1 = "SELECT * FROM `User` WHERE `login`='".$_POST['login']."'AND `password`= SHA2('".$_POST['password']."', 256);";
      $resultat=$pdo->query($requete1);

        if($resultat->rowCount()>0) {
          $utilisateur = $resultat->fetch();
          $_SESSION['id_utilisateur'] = $utilisateur['id'];
          header('location: accueil/accueil.php');
        }
    }

    if(isset($_POST['inscription'])){ 
      echo"salut";
      if($_POST['logininscription'] != ''){
    echo"salut";
      if($_POST['confirmpassword'] == $_POST['passwordinscription']){
      
            $requete1 = "INSERT INTO `User`(`login`, `password`) VALUES ('".$_POST['login']."',SHA2('".$_POST['passwordinscription']."', 256))";
            $resultat=$pdo->query($requete1);
          }
   
        }
       
          }
        
}

catch(Exception $error) {
    $error->getMessage();
}
?>
<body>

<div class="container">
  <div id="connexion">
    <h1 class="title">Hellø Wørld</h1>
    <p class="paragraphe">
      Veuillez entrer vos détails personnel et démarrez votre journée sur Hellø Wørld
    </p>
    <a href="#" type="submit" class="btn-link connexion">Se connecter</a>
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
        <input type="email" placeholder="mail">
        <div class="icon-mail"></div>
      </div>
      <div class="group-form">
        <input type="password" placeholder="password">
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