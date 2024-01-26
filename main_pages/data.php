<?php
session_start();
include("../bdd/bdd.php");
include("../class/user.php");

// Inclure la bibliothèque phpWebSocket
require_once __DIR__ . '/vendor/autoload.php'; // Assurez-vous que le chemin est correct

use WebSocket\Client;

// Remplacez l'URL du serveur WebSocket en conséquence
$socket = new Client('ws://192.168.65.9:3055');

$data = json_decode($socket->receive(), true); // Recevez les coordonnées du serveur WebSocket

$tab["latitude"] = $data['latitude'];
$tab["longitude"] = $data['longitude'];
$tab["heure"] = $data['heure']; // Assurez-vous que 'heure' est correctement défini dans vos données



// Retournez les données sous forme de JSON
echo json_encode($tab);
?>