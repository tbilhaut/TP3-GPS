# PROJET GPS

![Petit meme](https://i.imgflip.com/1n8nsf.jpg)

## 1° LES IP

Le projet peux être accessible via 2 IP :  
    - __192.168.65.186__, l'adresse sur laquelle vous pouvez accéder au site.  
    - __192.168.64.157__, l'adresse sur laquelle vous pouvez accéder à la BDD.


-----------------


## 2° LA BASE DE DONNÉES

Actuellement, la BDD contient 1 base. Vous pouvez y accéder grâce au couple d'identifiants root/root.

Base_PROJET     	
      
      └── User  
        ├── id : int (clé primaire)  
        ├── login : varchar(200)  
        └── password : varchar (200)  


-----------------


## 3° ORGANISATION DU CODE

* *index.php* -> page servant de page d'inscription / connexion à l'utilisateur
* *readme.md* -> ce même fichier que vous êtes en train de lire pour vous aider à comprendre le code  


* __./image__    
    logo_boussole.png -> petite image png servant de logo au site


* __./accueil__  
    *accueil.php* -> page sur laquelle tombe l'utilisateur une fois connecté, elle sert de page principale accueillant tous les liens
                   vers les autres pages et fonctionnalités du site


* __./bdd__  
    *bdd.php* -> code permettant une connexion à la BDD, utilisée dans les différentes pages  
    *user.sql* -> un export clean de la base afin que vous puissiez l'importer dans PhpMyAdmin


* __./class__  
    *user.php* -> code pour la déclaration de la Class "User", contenant les fonctions principales pour gérer celui-ci


* __./compte__  
    *compte.php* -> page pour que l'utilisateur ait accès aux propriétés de son compte et puisse les modifier (comme le passwd)


* __./connexion__  
    *connexion.css* -> code utilisé pour mettre en forme l'index




    