<?php 
session_start();
include("../bdd/bdd.php");
include("../class/user.php");

$sql = "SELECT longitude, latitude, heure FROM GPSdata ORDER BY id DESC LIMIT 0, 1";
$result = $GLOBALS["pdo"]->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);

$tab["latitude"]=$row['latitude'];
$tab["longitude"]=$row['longitude'];
echo json_encode($tab)
?>