<?php
    $ipserver="192.168.64.157";
    $basename="Base_PROJET";
    $login="root";
    $password="root";
    $GLOBALS["pdo"] = new PDO('mysql:host='.$ipserver.';dbname='.$basename.'',$login,$password);
?>