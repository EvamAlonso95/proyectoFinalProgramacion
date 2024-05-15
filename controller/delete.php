<?php

require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';
$db = new Database();
$st = $_GET["st"];
$idEvent = $_GET["idEvent"];



// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "GET") {


    // Eliminar el evento

    $db->deleteEvent($idEvent);
}


$db->closeConnection();

header("Location: " . getURL() . "/eventos.php?st=" . $st);
exit();
