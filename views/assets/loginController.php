<?php
// Verificar si se enviaron los datos del formulario
if(isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "admindrpet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT * FROM admindrpet WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
    
        // Usuario autenticado correctamente
        // Redirigir a la página de rolAdmi.php con el nombre del usuario como parámetro GET
        header("Location: ../assets/js/rolAdmi.php?nombre=".urlencode($nombre));
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "Usuario o contraseña incorrectos";
    }

    // Cerrar conexión
    $conn->close();
}
?>
