<?php

include ("../bdd/bdd.php");

// Fonction de connexion à la base de données
function Connexion($user, $passwd, $bdd)
{
    try {
        $pdo = $GLOBALS["pdo"];
        // Vérification des informations de connexion
        $requete = "SELECT * FROM `User` WHERE `login`='$user' AND `passwd`= SHA2('$passwd', 256) AND `bdd`='$bdd'";
        $resultat = $pdo->query($requete);

        if ($resultat->rowCount() > 0) {
            return true; // Connexion réussie
        } else {
            return "Erreur : Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

// Fonction de vérification de l'autorisation
function Autorisation($login, $passwd)
{
    try {
        $pdo = $GLOBALS["pdo"];
        // Vérification si l'utilisateur existe
        $requete = "SELECT * FROM `User` WHERE `login`='$login' AND `passwd`= SHA2('$passwd', 256)";
        $resultat = $pdo->query($requete);

        if ($resultat->rowCount() > 0) {
            return true; // Autorisation accordée
        } else {
            return false; // Autorisation refusée
        }
    } catch (PDOException $e) {
        return false;
    }
}

// Fonction de modification de l'utilisateur
function Modification_user($login, $passwd)
{
    try {
        $pdo = $GLOBALS["pdo"];
        // Vérification si l'utilisateur existe
        $requete = "SELECT * FROM `User` WHERE `login`='$login' AND `passwd`= SHA2('$passwd', 256)";
        $resultat = $pdo->query($requete);

        if ($resultat->rowCount() > 0) {
            // L'utilisateur existe, vous pouvez afficher le formulaire de modification ici
            // Mettez à jour les informations de l'utilisateur dans la base de données
            // Assurez-vous de gérer correctement la modification des informations
            return true; // Modification réussie
        } else {
            return "Erreur : Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

// Fonction de suppression de l'utilisateur
function Suppression_user($login, $passwd)
{
    try {
        $pdo = $GLOBALS["pdo"];
        // Vérification si l'utilisateur existe
        $requete = "SELECT * FROM `User` WHERE `login`='$login' AND `passwd`= SHA2('$passwd', 256)";
        $resultat = $pdo->query($requete);

        if ($resultat->rowCount() > 0) {
            // L'utilisateur existe, vous pouvez procéder à la suppression
            $requeteSuppression = "DELETE FROM `User` WHERE `login`='$login'";
            $pdo->exec($requeteSuppression);
            return true; // Suppression réussie
        } else {
            return "Erreur : Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}



/*function Deconnexion(){
   if (isset($_POST['deconnexion'])){
        session_unset();
        session_destroy();
   } 
}*/

?>