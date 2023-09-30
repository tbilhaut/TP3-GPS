<?php
session_start();
?>

<!-- Page de connexion -->

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="connexion/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
  <title>Mon site - Connexion</title>
</head>

<?php
 try{
  include ("bdd/bdd.php"); // Connexion à la BDD

  if(isset($_POST['connexion'])) {
    $requete1 = "SELECT * FROM `User` WHERE `login`='".$_POST['login']."'AND `passwd`= SHA2('".$_POST['passwd']."', 256);";
    $resultat1=$pdo->query($requete1);

    if($resultat1->rowCount()>0) {
      $utilisateur = $resultat1->fetch();
      $_SESSION['id_utilisateur'] = $utilisateur['id'];
      echo"bite";
     header('location: acceuil/acceuil.php');
    }
  }

  if(isset($_POST['inscription'])){ 

  if($_POST['logini'] != ''){

  if($_POST['confpass'] == $_POST['passi']){
  
        $requete2 = "INSERT INTO `User`(`login`, `passwd`) VALUES ('".$_POST['logini']."',SHA2('".$_POST['passi']."', 256))";
        echo "";
        $resultat2=$pdo->query($requete2);
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
      <p class="paragraphe">
        <div id="connexion">
          <h1 class="title">Connexion</h1>
          <p class="paragraphe">
            Veuillez remplir tous les champs
          </p>
          <form class="formulaire" method="post">
            <div class="group-form">
              <input type="text" name="login" placeholder="login">
              <div class="icon-user"></div>
            </div>
            <div class="group-form">
              <input type="password" name="passwd" placeholder="password">
              <div class="icon-password"></div>
            </div>
            <div class="group-form">
              <input type="submit" class="connexion" name="connexion" value="Connexion">
            </div>
          </form>
          </div>
    </div>
    <div id="inscription">
      <h1 class="title">Créer un compte</h1>
      <p class="paragraphe">
        Veuillez remplir tous les champs
      </p>
      <form class="formulaire" method="post">
        <div class="group-form">
          <input type="text" name="logini" placeholder="login">
          <div class="icon-user"></div>
        </div>
        <div class="group-form">
          <input type="password" name="passi" placeholder="password">
          <div class="icon-password"></div>
        </div>
        <div class="group-form">
          <input type="password" name="confpass" placeholder="retype password">
          <div class="icon-password"></div>
        </div>
        <div class="group-form">
          <input type="submit" class="inscription" name="inscription" value="S'inscrire">
        </div>
      </form>
    </div>
  </div>
</body>

</html>