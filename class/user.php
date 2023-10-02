<?php

// include ("../bdd/bdd.php"); // On inclus le fichier de connexion à la BDD
include ("././bdd/bdd.php");


class User { // Création de la Classe User
    private $id;
    private $login;
    private $passwd;

    public function __construct($id, $login, $passwd) { // Constructeur
        $this->id = $id;
        $this->login = $login;
        $this->passwd = $passwd;
    }


    // -- Méthodes : accès aux propriétés --


    public function getId() { // Retourne l'Id 
        return $this->id;
    }

    public function getLogin() { // Retourne le login 
        return $this->login;
    }

    public function getPasswd() { // Retourne le password 
        return $this->passwd;
    }


    // -- Méthodes : fonctions pour interagir avec l'utilisateur --


    // 1) Connexion à la BDD
    public function Connexion($user, $passwd, $bdd) {
        try {
            // Tente la connexion à la BDD
            $pdo = new PDO('mysql:host=' . $GLOBALS["ipserver"] . ';dbname=' . $bdd, $user, $passwd);
            return true; // Connexion réussie
        } catch (PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }


    // 2) Inscription d'un nouvel utilisateur
    public function Inscription($login, $passwd) {
        // Vérifier si l'utilisateur avec le même login existe déjà
        $sql = "SELECT * FROM User WHERE login = '" . $login . "'";
        $result = $GLOBALS["pdo"]->query($sql);
    
        if ($result && $result->rowCount() > 0) {
            return "Un utilisateur avec le même login existe déjà.";
        }
    
        // Insérer le nouvel utilisateur dans la BDD
        $sql = "INSERT INTO User (login, passwd) VALUES ('$login', '$passwd')";
            
        if ($GLOBALS["pdo"]->exec($sql) !== false) {
            return true; // Inscription réussie
        } else {
            return "Erreur lors de l'inscription.";
        }
    }

    
    // 3) Autorisation d'accès au site 
    public function Autorisation($login, $passwd) {
        // Recherche de l'user dans la BDD avec le login
        $sql = "SELECT * FROM User WHERE login = '" . $login . "'";
        $result = $GLOBALS["pdo"]->query($sql);

        if ($result && $result->rowCount() > 0) {
            // L'user existe, vérifie le mot de passe
            $sql = "SELECT * FROM User WHERE login = '" . $login . "' AND passwd = '" . $passwd . "'";
            $result = $GLOBALS["pdo"]->query($sql);

            if ($result && $result->rowCount() > 0) {
                return true; // Authentification réussie
            }
        }
        return false; // Authentification échouée
    }


    // 4) Suprimer un compte
    public function Suppression_user($login, $passwd) {
        // On vérifie que l'user existe
        $sql = "SELECT * FROM User WHERE login = '" . $login . "'";
        $result = $GLOBALS["pdo"]->query($sql);
    
        if ($result && $result->rowCount() > 0) {
            // L'user existe, vérifier le passwd
            $sql = "SELECT * FROM User WHERE login = '" . $login . "' AND passwd = '" . $passwd . "'";
            $result = $GLOBALS["pdo"]->query($sql);
    
            if ($result && $result->rowCount() > 0) {
                // Le login et le mot de passe sont corrects, on supprime le compte
                $sql = "DELETE FROM User WHERE login = '" . $login . "'";
                $result = $GLOBALS["pdo"]->exec($sql);
    
                if ($result !== false) {
                    return true; // Suppression réussie
                } else {
                    return false; // Échec de la suppression
                }
            } else {
                return false; // Mot de passe incorrect
            }
        } else {
            return false; // Utilisateur non trouvé avec le login spécifié
        }
    }


    // 5) Déconnecter l'user
    public function Deconnexion() {
        session_unset();
        session_destroy();
        return true; // Déconnexion réussie
    }
}

?>