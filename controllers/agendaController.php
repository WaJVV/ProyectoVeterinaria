<?php

// Función para eliminar una cita
function eliminarCita($idCita) {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "drpetsvet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Eliminar la cita de la base de datos
    $sql = "DELETE FROM citas WHERE idCitas = $idCita";
    if ($conn->query($sql) === TRUE) {
        // La cita se eliminó correctamente
        echo "Cita eliminada correctamente";
    } else {
        // Error al eliminar la cita
        echo "Error al eliminar la cita: " . $conn->error;
    }

    $conn->close();
}

// Función para agregar una cita
function agregarCita() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar el formulario
        $identificacionCliente = $_POST["identificacionCliente"];
        $nombreMascota = $_POST["nombreMascota"];
        $tipoCita = $_POST["tipoCita"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $idVeterinario = $_POST["idVeterinario"];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "drpetsvet";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Obtener el idCliente de la tabla clientes
        $sqlIdCliente = "SELECT idCliente FROM clientes WHERE identificacion = '$identificacionCliente'";
        $resultIdCliente = $conn->query($sqlIdCliente);
        if ($resultIdCliente->num_rows == 0) {
            echo "El idCliente ingresado no existe.";
            return;
        }
        $rowIdCliente = $resultIdCliente->fetch_assoc();
        $idCliente = $rowIdCliente["idCliente"];

        // Obtener el idMascota de la tabla mascotas
        $sqlIdMascota = "SELECT idMascota FROM mascotas WHERE idCliente = '$idCliente' AND nombre = '$nombreMascota'";
        $resultIdMascota = $conn->query($sqlIdMascota);
        if ($resultIdMascota->num_rows == 0) {
            echo "La mascota ingresada no existe para el cliente indicado.";
            return;
        }
        $rowIdMascota = $resultIdMascota->fetch_assoc();
        $idMascota = $rowIdMascota["idMascota"];

        // Obtener el último ID de la tabla citas
        $sqlLastId = "SELECT MAX(idCitas) AS lastId FROM citas";
        $resultLastId = $conn->query($sqlLastId);
        $rowLastId = $resultLastId->fetch_assoc();
        $lastId = $rowLastId["lastId"];

        // Incrementar el último ID para obtener el nuevo ID de la cita
        $newId = $lastId + 1;

        // Insertar la cita en la base de datos con el nuevo ID
        $sql = "INSERT INTO citas (idCitas, idCliente, idMascota, fecha_visita, motivo, idVeterinario)
                VALUES ('$newId', '$idCliente', '$idMascota', '$fecha $hora', '$tipoCita', '$idVeterinario')";
        if ($conn->query($sql) === TRUE) {
            echo "Cita agregada correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
        // Finalizar la ejecución del script después de mostrar el mensaje
        exit();
    }
}


// Verifica ID de cita para eliminar
if (isset($_POST["idCita"])) {
    $idCita = $_POST["idCita"];
    eliminarCita($idCita);
}

// Llamar a la función para agregar una cita solo si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["identificacionCliente"])) {
    agregarCita();
}

function obtenerCitasJSON() {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "drpetsvet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para obtener las citas con el nombre del cliente y la mascota
    $sql = "SELECT citas.idCitas, citas.motivo, citas.fecha_visita, clientes.nombre AS nombreCliente, mascotas.nombre AS nombreMascota
            FROM citas
            INNER JOIN clientes ON citas.idCliente = clientes.idCliente
            INNER JOIN mascotas ON citas.idMascota = mascotas.idMascota";
    $result = $conn->query($sql);

    // Array para almacenar los eventos
    $events = array();

    // Procesar los resultados de la consulta
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Crear un evento para cada cita
            $event = array(
                'id' => $row['idCitas'], // Agregar el ID de la cita
                'title' => $row['motivo'],
                'cliente' =>$row['nombreCliente'],
                'mascota' =>$row['nombreMascota'],
                'start' => $row['fecha_visita']
            );
            array_push($events, $event);
        }
    }

    // Convertir el array de eventos a formato JSON
    $eventsJSON = json_encode($events);

    $conn->close();

    return $eventsJSON;
}

// Llamar a la función para obtener el JSON de las citas
$eventsJSON = obtenerCitasJSON();


// Mostrar el JSON en la página para que pueda ser utilizado por el calendario
echo $eventsJSON;

?>
