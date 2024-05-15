<?php
require_once '../utilities/utils.php';
require_once '../utilities/bbdd.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Llama al método isValidUser de la clase BBDD para verificar si el usuario es válido
    $isValid = $db->isValidUser($email, $password);

    if ($isValid) {
        // Si el usuario es válido, llama al método getSecretTokenUser de la clase BBDD para obtener el token secreto del usuario
        try {
            $secretToken = $db->getSecretTokenUser($email, $password);

            if ($secretToken == false) {
                returnHome();
            }
            // Obtiene el valor de la columna "secretToken" del conjunto de resultados.
            $st = $secretToken[0]['secretToken'];
            // Redirige la respuesta a "events.jsp" con el token secreto como parámetro.
            header("Location: " . getURL() . "/eventos.php?st=" . $st);
            exit();
        } catch (PDOException $e) {
            //Aquí manejariamos si hubiera un error
        }
    }
}
$db->closeConnection();
returnHome();




// header("Location: " . getURL() . "/eventos.php");
// exit();