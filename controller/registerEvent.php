<?php
require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger los datos del formulario
    $eventName = $_POST["eventName"];
    $idLocation = $_POST["idLocation"];
    $eventDate = $_POST["eventDate"];
    $eventDescription = $_POST["eventDescription"];
    $secretTokenUser = $_POST["secretToken"];
    $db = new Database();

		$file = $_FILES['eventImg'];
		$nombre = $file['name'];
		$tmp_ruta = $file['tmp_name'];
		$carpeta = 'img/events/';

		$nuevaRuta = $carpeta.$nombre; // img/events/miImagen.png
		move_uploaded_file($tmp_ruta,'../'.$nuevaRuta);
		

    $idUser = $db->getIdUserByST($secretTokenUser);

    $idUser = $idUser[0]['idUser'];
    
    $db->generateNewEvent($idUser, $eventName, $idLocation, $eventDate, $eventDescription, $nuevaRuta);

    $idEvent = $db->getLastId();
    
    $db->addParticipantToEvent($idUser, $idEvent);
}
$db->closeConnection();
$st = $_GET["st"];
header("Location: " . getURL() . "/eventos.php?st=" . $st);
exit();
