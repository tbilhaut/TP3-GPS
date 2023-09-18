<?php
    $ipserver="192.168.64.86";
    $basename="nintendogs";
    $login="root";
    $password="root";
    $GLOBALS["pdo"] = new PDO('mysql:host='.$ipserver.';dbname='.$basename.'',$login,$password);
?>