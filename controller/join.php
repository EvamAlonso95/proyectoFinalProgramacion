<?php

require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';
$db = new Database();
$st = $_GET["st"];
$idEvent = $_GET['idEvent'];

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $idUser = $db->getIdUserByST($st);
    $idUser = $idUser[0]['idUser'];


    $db->addParticipantToEvent($idUser, $idEvent);
}



$db->closeConnection();
header("Location: " . getURL() . "/eventos.php?st=" . $st);
exit();
