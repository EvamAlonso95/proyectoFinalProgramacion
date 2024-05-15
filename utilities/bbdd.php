<?php
//====================================================
// Conexión a BBDD
class Database
{
    private $host = "localhost";
    private $username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
    private $password = ""; // Cambia esto por tu contraseña de la base de datos
    private $database = "agora"; // Cambia esto por el nombre de tu base de datos
    private $charset = "utf8mb4";

    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset={$this->charset}";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    //====================================================
    ///------- Peticiones a la BBDD
    public function query($sql, $params = [])
    {
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement->fetchAll();
        } catch (PDOException $e) {
            // Maneja la excepción aquí según tus necesidades
            // Puedes lanzarla nuevamente si deseas que se maneje en el archivo principal
            // throw new PDOException($e->getMessage(), (int)$e->getCode());
            // O puedes retornar un valor predeterminado o vacío
            return [];
        }
    }

    ///Acceder al último id generado
    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }


    //====================================================
    //------- REGISTER
    public function generateNewUser($username, $password, $age, $email, $idLocation, $secretToken)
    {
        return $this->query("INSERT INTO user (name,password,age,email,idLocation,secretToken) VALUES (:name,:password,:age,:email,:idLocation,:secretToken);", [":name" => $username, ":password" => $password, ":age" => $age, ":email" => $email, ":idLocation" => $idLocation, ":secretToken" => $secretToken]);
    }

    public function getUser($idUser)
    {
        return $this->query("SELECT user.name, user.age, location.name as country FROM user INNER JOIN location ON user.idLocation = location.idLocation WHERE idUser=?;", [$idUser]);
    }

    //Localizaciones
    public function getLocations()
    {
        return $this->query("SELECT * FROM location");
    }
    //====================================================
    //------- LOGIN

    //Validar si el usuario está registrado
    public function isValidUser($email, $password)
    {
        try {
            $result = $this->query("SELECT * FROM user WHERE email =? AND password =?;", [$email, $password]);

            // Comprobar si $result es un array y no está vacío
            if (is_array($result) && !empty($result)) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            // Manejar la excepción, puedes imprimir el mensaje de error o realizar otras acciones de manejo de errores
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            // En este caso, podrías devolver false indicando que la consulta no se pudo ejecutar correctamente
            return false;
        }
    }

    //Recuperar el SecretToken del usuario

    public function getSecretTokenUser($email, $password)
    {
        return $this->query("SELECT secretToken FROM user WHERE email =? AND password =?;", [$email, $password]);
    }

    // Conseguir el ID del usuario con el SECRET TOKEN
    public function getIdUserByST($secretTokenUser)
    {
        return $this->query("SELECT idUser FROM user WHERE secretToken = ?", [$secretTokenUser]);
    }
    //====================================================
    //------- EVENTOS

    // Devuelve todos los eventos

    public function getEvents()
    {
        return $this->query("SELECT * FROM event");
    }


    public function getIdEvents()
    {
        return $this->query("SELECT idEvent FROM event");
    }

    // Nuevo Evento
    public function generateNewEvent($idUser, $eventName, $idLocation, $eventDate, $eventDescription, $rutaImagen)
    {
        return $this->query(
            "INSERT INTO event (idUser, name, idLocation, dateTime, description,imagen) VALUES (:idUser, :eventName, :idLocation, :eventDate, :eventDescription, :imagen);",
            [
                ":idUser" => $idUser,
                ":eventName" => $eventName,
                ":idLocation" => $idLocation,
                ":eventDate" => $eventDate,
                ":eventDescription" => $eventDescription,
                ":imagen" => $rutaImagen
            ]
        );
    }

    // Editar Evento
    public function updateEvent($idEvent, $eventName, $eventLocation, $eventDate, $eventDescription, $imagen)
    {
        $query = "UPDATE event SET idLocation = ?, name = ?, dateTime = ?, description = ?, imagen = ? WHERE idEvent = ?";
        $this->query($query, [$eventLocation, $eventName, $eventDate, $eventDescription, $imagen, $idEvent]);
    }


    //Eliminar Evento
    public function deleteEvent($idEvent)
    {
        return $this->query("DELETE FROM event WHERE idEvent = ?;", [$idEvent]);
    }


    // Conseguir el ID de un evento ???????
    public function getEventById($idEvent)
    {
        // Construir la consulta SQL para obtener el evento por su ID
        $query = "SELECT event.idEvent, event.name AS nameEvent, event.dateTime, location.name AS nameLocation, event.description, event.imagen FROM event INNER JOIN location ON event.idLocation = location.idLocation WHERE idEvent = ? ORDER BY event.dateTime ASC;";

        // Ejecutar la consulta y obtener el objeto PDOStatement
        return $this->query($query, [$idEvent]);
    }


    // Agregar Participante a Evento

    public function addParticipantToEvent($idUser, $idEvent)
    {
        $this->query("INSERT INTO participants (idUser, idEvent) VALUES (:idUser, :idEvent);", [":idUser" => $idUser, ":idEvent" => $idEvent]);
    }

    //Si el Usuario es el creado del Evento
    public function isUserCreator($idEvent, $idUser)
    {
        try {
            $result = $this->query("SELECT * FROM event WHERE idEvent =? AND idUser =?;", [$idEvent, $idUser]);

            // Comprobar si $result es un array y no está vacío
            if (is_array($result) && !empty($result)) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            // Manejar la excepción, puedes imprimir el mensaje de error o realizar otras acciones de manejo de errores
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            // En este caso, podrías devolver false indicando que la consulta no se pudo ejecutar correctamente
            return false;
        }
    }

    public function isUserInEvent($idUser, $idEvent)
    {
        try {
            $result = $this->query("SELECT * FROM participants WHERE idEvent =? AND idUser =?;", [$idEvent, $idUser]);

            // Comprobar si $result es un array y no está vacío
            if (is_array($result) && !empty($result)) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            // Manejar la excepción, puedes imprimir el mensaje de error o realizar otras acciones de manejo de errores
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            // En este caso, podrías devolver false indicando que la consulta no se pudo ejecutar correctamente
            return false;
        }
    }


    //Contar los participantes apuntados a un evento
    public function getParticipantsByEvent($idEvent)
    {
        $result = $this->query("SELECT COUNT(*) AS participantCount FROM participants WHERE idEvent = ?;", [$idEvent]);
        // Verificar si la consulta fue exitosa y si se devolvió un resultado
        if (!empty($result) && isset($result[0]["participantCount"])) {
            return $result[0]["participantCount"]; // Devuelve el recuento de participantes
        } else {
            return 0; // Devuelve 0 si no se encontraron participantes o hubo un error en la consulta
        }
    }

    //Eliminar al idUSer el evento
    public function deleteIdUserFromEvent($idUser, $idEvent)
    {
        return $this->query("DELETE FROM participants WHERE idUser = :idUser AND idEvent = :idEvent;", [":idUser" => $idUser, ":idEvent" => $idEvent]);
    }





    //====================================================
    // Cerrar conexion BBDD
    public function closeConnection()
    {
        $this->pdo = null;
    }

    public function getLocationById($idLocation)
    {

        return $this->query("SELECT * FROM location WHERE idLocation = :idLocation", [":idLocation" => $idLocation])[0];
    }
}
