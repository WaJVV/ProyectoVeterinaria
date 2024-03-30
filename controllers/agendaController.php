<?php


// Función para eliminar una cita
function eliminarCita($idCita) {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "drpets";

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
        // Hubo un error al eliminar la cita
        echo "Error al eliminar la cita: " . $conn->error;
    }

    $conn->close();
}

// Verificar si se recibió un ID de cita para eliminar
if (isset($_POST["idCita"])) {
    $idCita = $_POST["idCita"];
    eliminarCita($idCita);
}

function agregarCita() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar el formulario
        $nombreCliente = $_POST["nombreCliente"];
        $identificacionCliente = $_POST["identificacionCliente"];
        $idMascota = $_POST["idMascota"];
        $tipoCita = $_POST["tipoCita"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $idVeterinario = $_POST["idVeterinario"];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "admin1";
        $password = "123";
        $dbname = "drpets";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Validar que el idMascota exista en la tabla mascotas
        $sqlValidacionMascota = "SELECT COUNT(*) as count FROM mascotas WHERE idMascota = $idMascota";
        $resultMascota = $conn->query($sqlValidacionMascota);
        $rowMascota = $resultMascota->fetch_assoc();
        if ($rowMascota['count'] == 0) {
            echo "El idMascota ingresado no existe.";
            return;
        }

        $idVeterinario = $_POST["idVeterinario"];
        // Validar que el idVeterinario exista en la tabla veterinario
        $sqlValidacionVeterinario = "SELECT COUNT(*) as count FROM veterinario WHERE idVeterinario = $idVeterinario";
        $resultVeterinario = $conn->query($sqlValidacionVeterinario);
        $rowVeterinario = $resultVeterinario->fetch_assoc();
        if ($rowVeterinario['count'] == 0) {
            echo "El idVeterinario ingresado no existe.";
            return;
        }
        // Validar que el idCliente exista en la tabla clientes
        $sqlValidacionCliente = "SELECT COUNT(*) as count FROM clientes WHERE idCliente = '$identificacionCliente'";
        $resultCliente = $conn->query($sqlValidacionCliente);
        $rowCliente = $resultCliente->fetch_assoc();
        if ($rowCliente['count'] == 0) {
            echo "El idCliente ingresado no existe.";
            return;
        }

        // Insertar la cita en la base de datos
        $sql = "INSERT INTO citas (idMascota, idCliente, fecha_visita, motivo, idVeterinario)
                VALUES ('$idMascota', '$identificacionCliente', '$fecha $hora', '$tipoCita', '$idVeterinario')";
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

agregarCita();

function obtenerCitasJSON() {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "drpets";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para obtener las citas
    $sql = "SELECT * FROM citas";
    $result = $conn->query($sql);

    // Array para almacenar los eventos
    $events = array();

    // Procesar los resultados de la consulta
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Crear un evento para cada cita
            $event = array(
                'id' => $row['idCitas'],
                'title' => $row['motivo'],
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

