<?php
// Verificar si se enviaron los datos del formulario
if(isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "drpets";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

       $sql = "SELECT * FROM admins WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
    
        // Redirigir a la página de rolAdmin.php con el nombre y apellidos del usuario como parámetros GET
        header("Location: ./rolAdmiController.php?nombre=".urlencode($nombre)."&apellidos=".urlencode($apellidos));
        exit();
    } else {
        // Credenciales incorrectas, redirigir a la página de login con un mensaje de error
        header("Location: ../modu/login.php?error=incorrecto");
        exit();
    }
    
    // Cerrar conexión
    $conn->close();
}
?>
