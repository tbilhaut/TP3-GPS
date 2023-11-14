# PROJET GPS

![Petit meme](https://i.imgflip.com/1n8nsf.jpg)

## 1° LES ACCÈS

Le projet peut être accessible via 2 IP :  
    - __192.168.64.148__, l'adresse sur laquelle vous pouvez accéder au site.  
    - __192.168.65.9__, l'adresse sur laquelle vous pouvez accéder à la BDD.

Un partage Samba existe et est joignable au lecteur suivant : \\192.168.65.9\PartageApache


-----------------


## 2° LA BASE DE DONNÉES

Vous pouvez y accéder grâce au couple d'identifiants root/root.

Base_PROJET     	
      
      └── User  
        ├── id : int (clé primaire)  
        ├── login : varchar unique (200)  
        └── passwd : varchar (200)  
        └── isAdmin : int (1)  

      └── GPSdata  
        ├── id int(11) NOT NULL  
        ├── longitude varchar(10) NOT NULL  
        └── latitude varchar(10) NOT NULL  
        └── heure float NOT NULL  

       
-----------------


## 3° ORGANISATION DU CODE


* __./assets__  
*(Ce fichier est consacré au css, js, etc... utilisé par le Bootstrap. Il contient cette liste non exhaustive :)*    
    /css    
    /img    
    /js  
    /scss    
    /vendor    
    .travis.yml  
    gulpfile.js  
    package-lock.json    
    package.json  


* __./bdd__  
    *bdd.php* -> code permettant une connexion à la BDD, utilisée dans les différentes pages    
    *Base_PROJET.sql* -> un export clean de la base afin que vous puissiez l'importer dans PhpMyAdmin  


* __./class__  
    *user.php* -> code pour la déclaration de la Class "User", contenant les fonctions principales pour gérer celui-ci  


* __./documentation__  
    /img  
        - *Recette et test.pdf*   
        - *cahier des charges.pdf*    
        - *diagrammeclassC.pdf*  
        - *diagrammeclassphp.pdf*     
        - *ganttPrevi.pdf*   
        - *ganttTP2Reel.pdf*     
        - *useCaseGPS.png* 

* __./extend_pages__  
*(Ce fichier est consacré aux pages founies avec le Bootstrap et qui pourrait peut-être vous être utiles, si besoin :)*  
    *blank.php*   
    *buttons.php*    
    *cards.php*     
    *charts.php*      
    *utilities-animation.php*     
    *utilities-border.php*    
    *utilities-color.php*    
    *utilities-other.php*  


* __./main_pages__  
    *404.php* -> page utilisée quand on accède à une page non autorisée ou non trouvée     
    *acceuil.php* -> page quand l'utilisateur se connecte et permet d'accéder aux autres pages    
    *admin.php* -> page de gestion si l'user est Admin qui lui permet d'afficher et de modifier tous les utilisateurs    
    *inscription.php* -> page d'inscription pour les nouveaux utilisateurs    
    *parametres.php* -> page sur laquelle l'user connecté peut modifier ses informations de connexion  


*index.php* -> page servant pour la connexion de l'utilisateur  
*readme.md*

-----------------





















    
