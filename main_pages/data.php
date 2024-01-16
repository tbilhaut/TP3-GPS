<?php
session_start();
include("../bdd/bdd.php");
include("../class/user.php");


// Mettez en commentaire la récupération des données depuis la base de données
// $sql = "SELECT longitude, latitude, heure FROM GPSdata ORDER BY id DESC LIMIT 0, 1";
// $result = $GLOBALS["pdo"]->query($sql);
// $row = $result->fetch(PDO::FETCH_ASSOC);

// Remplacez la récupération depuis la base de données par les données WebSocket
// Vous pouvez ajuster l'URL du serveur WebSocket en conséquence
$socket = new WebSocket('ws://192.168.65.9:3055');
//$socket->send('give-me-coordinates'); // Envoyez une demande de coordonnées au serveur WebSocket
$data = json_decode($socket->receive(), true); // Recevez les coordonnées du serveur WebSocket

$tab["latitude"] = $data['latitude'];
$tab["longitude"] = $data['longitude'];

// Fermez la connexion WebSocket
$socket->close();

// Retournez les données sous forme de JSON
echo json_encode($tab);
?>
