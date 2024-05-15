<?php
require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger los datos del formulario
    $idEvent = $_POST['idEvent'];
    $eventName = $_POST["eventName"];
    $idLocation = $_POST["idLocation"];
    $eventDate = $_POST["eventDate"];
    $eventDescription = $_POST["eventDescription"];
    $st = $_POST["secretToken"];
    $imagen = $_POST["actualImage"];

    if (!empty($_FILES['eventImg']['name'])) {

        $file = $_FILES['eventImg'];
        $nombre = $file['name'];
        $tmp_ruta = $file['tmp_name'];
        $carpeta = 'img/events/';

        $nuevaRuta = $carpeta . $nombre; // img/events/miImagen.png
        move_uploaded_file($tmp_ruta, '../' . $nuevaRuta);
        $imagen = $nuevaRuta;
    }

    $db = new Database();

    $idUser = $db->getIdUserByST($st);
    $idUser = $idUser[0]["idUser"];

    $db->updateEvent($idEvent, $eventName, $idLocation, $eventDate, $eventDescription, $imagen);
}
$db->closeConnection();

header("Location: " . getURL() . "/eventos.php?st=" . $st);
exit();
