<?php

include ("../bdd/bdd.php"), // On inclus le fichier de connexion à la BDD


class User { // Classe User
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


    // -- Méthodes : fonctions pour interragir avec l'utilisateur --


    // Fonction de connexion à la base de données
    public function Connexion($user, $passwd, $bdd) {
        try {
            // Tentez de vous connecter à la base de données
            $pdo = new PDO('mysql:host=' . $GLOBALS["ipserver"] . ';dbname=' . $bdd, $user, $passwd);
            return true; // Connexion réussie
        } catch (PDOException $e) {
            return "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    // Fonction d'autorisation d'accès au site
    public function Autorisation($login, $passwd) {
        // Recherchez l'utilisateur dans la base de données par login
        $sql = "SELECT * FROM User WHERE login = '" . $login . "'";
        $result = $GLOBALS["pdo"]->query($sql);

        if ($result && $result->rowCount() > 0) {
            // L'utilisateur existe, vérifiez le mot de passe
            $sql = "SELECT * FROM User WHERE login = '" . $login . "' AND passwd = '" . $passwd . "'";
            $result = $GLOBALS["pdo"]->query($sql);

            if ($result && $result->rowCount() > 0) {
                return true; // Authentification réussie
            }
        }
        return false; // Authentification échouée
    }


    // Suprimer un compte
    public function Suppression_user($login, $passwd) {
        // On vérifie que l'utilisateur existe
        $sql = "SELECT * FROM User WHERE login = '" . $login . "'";
        $result = $GLOBALS["pdo"]->query($sql);
    
        if ($result && $result->rowCount() > 0) {
            // L'utilisateur existe, vérifier le password
            $sql = "SELECT * FROM User WHERE login = '" . $login . "' AND passwd = '" . $passwd . "'";
            $result = $GLOBALS["pdo"]->query($sql);
    
            if ($result && $result->rowCount() > 0) {
                // Le login et le mot de passe sont corrects, supprimez le compte
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

    public function Deconnexion() {
        // Détruire la session en cours
        session_unset();
        session_destroy();
    
            return true; // Déconnexion réussie
        }
}


?>