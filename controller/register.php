<?php
require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $username = $_POST["username"];
    $age = $_POST["age"];
    $idLocation = $_POST["idLocation"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $secretToken = generateUUID();
    $db = new Database();
    $db->generateNewUser($username, $password, $age, $email, $idLocation, $secretToken);
}
$db->closeConnection();
returnHome();
