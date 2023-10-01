    /// 1° LES IP ///

Le projet peux être accessible via 2 IP : 
    - 192.168.65.186, l'adresse sur laquelle vous pouvez accéder au site.
    - 192.168.64.157, l'adresse sur laquelle vous pouvez accéder à la BDD.




    /// 2° LA BASE DE DONNÉES ///

Actuellement, la BDD contient 1 base.

Base_PROJET	
      └── User
        ├── id : int (clé primaire)
        ├── login : varchar(200)
        └── password : varchar (200)




    /// 3° ORGANISATION DU CODE ///

index.php -> page servant de page d'inscription / connexion à l'utilisateur
readme.md -> ce même fichier que vous êtes en train de lire pour vous aider à comprendre le code

./image -> fichier contenant (pour le moment) une seule image servant pour le logo du site


./accueil 
    accueil.php -> page sur laquelle tombe l'utilisateur une fois connecté, elle sert de page principale accueillant tous les liens
                   vers les autres pages et fonctionnalités du site


./bdd
    bdd.php -> code permettant une connexion à la BDD, utilisée dans les différentes pages
    user.sql -> un export clean de la base afin que vous puissiez l'importer dans PhpMyAdmin


./class
    user.php -> code pour la déclaration de la Class "User", contenant les fonctions principales pour gérer celui-ci


./compte
    compte.php -> page pour que l'utilisateur ait accès aux propriétés de son compte et puisse les modifier (comme le passwd)


./connexion 
    connexion.css -> code utilisé pour mettre en forme l'index




    