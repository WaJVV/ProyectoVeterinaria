<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="./css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="./css/rolAdmin.css" rel="stylesheet">
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="..\model\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\model\servicios.php">Servicios</a></li>
                <li><a href="..\model\productos.php">Productos</a></li>
                <li><a href="..\model\contacto.php">Contacto</a></li>
                <li><a href="..\model\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome-msg">
    <?php
// Mostrar el nombre del usuario
if(isset($_GET['nombre']) && isset($_GET['apellidos'])){ 
    echo "<h3> Bienvenido (a) " . htmlspecialchars($_GET['nombre']) . " " . htmlspecialchars($_GET['apellidos']) . "</h3>"; 
} else {
    echo "Usuario no encontrado";
}
?>

</div>
<div class="opciones-administrador">
    <h2>Opciones de Administrador:</h2>
    <main>
    <button class="botones" onclick="location.href='./model/agregarUsuario.php'">Agregar Usuario</button>
    <button class="botones" onclick="location.href='./model/rolAdmin.php'">Ver Usuarios</button>
    <button class="botones" onclick="location.href='./model/modificarUsuario.php'">Modificar Datos</button>
    <button class="botones" onclick="location.href='./model/eliminarUsuario.php'">Eliminar Usuario</button>
</main>

</div>
<aside class="menu">
    <h3>Menú</h3>
    <ul>
        <li>
            <button class="opcion-desplegable">Tablero</button>
            <ul class="submenu">
                <li><a href="#">Perfil</a></li>
                <li><a href="#">Tablero</a></li>
                <li><a href="#">Compras</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Clientes</button>
            <ul class="submenu">
                <li><a href="#">Lista</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Pacientes</button>
            <ul class="submenu">
                <li><a href="#">Lista</a></li>
                <li><a href="#">Historial</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Servicios</button>
            <ul class="submenu">
                <li><a href="#">Médicos</a></li>
                <li><a href="#">Spa</a></li>
                <li><a href="#">Ventas</a></li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Citas y Recordatorios</button>
            <ul class="submenu">
                <li><a href="#">Agendas</a></li>
                <li>
                    <button class="opcion-desplegable">Inventario</button>
                    <ul class="submenu">
                        <li><a href="#">Lista de inventario</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <button class="opcion-desplegable">Informes</button>
        </li>
        <li>
            <button class="opcion-desplegable">Registros</button>
            <ul class="submenu">
                <li><a href="#">Correos enviados</a></li>
                <li><a href="#">Modificación de Pacientes</a></li>
            </ul>
        </li>
    </ul>
</aside>

<div class= back-button>
<button class="back-button" onclick="atras()">Atrás</button>
<script>
    function atras() {
        window.location.href = 'http://localhost/ProyectoVeterinaria/drPets/view/assets/index.php';
    }
    </script>  
</div>  

<footer>

<?php
// Verificar si se enviaron los datos del formulario de Agregar usuario
if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
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

    // Obtener el último número de usuario registrado
    $sql_last_user = "SELECT MAX(SUBSTRING(usuario, 6)) as last_user FROM admins";
    $result_last_user = $conn->query($sql_last_user);
    $row_last_user = $result_last_user->fetch_assoc();
    $last_user_number = intval($row_last_user['last_user']);

    // Generar el nuevo nombre de usuario
    $new_user_number = $last_user_number + 1;
    $new_username = "admin" . $new_user_number;

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Encriptar la contraseña
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    // Consulta SQL para agregar el usuario a la base de datos
    $sql = "INSERT INTO admins (nombre, apellidos, email, contrasena, usuario) VALUES ('$nombre', '$apellidos', '$email', '$hashed_password', '$new_username')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ..\controller\rolAdmiController.php?nombre=".$nombre."&apellidos=".$apellidos);
        exit();
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>

    <!--cerrar sesión -->
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <input class="botones cerrarSesion" type="submit" value="Cerrar Sesión" name="cerrarSesion">
</form>
<?php
// Comprobar si se ha pulsado el botón de cerrar sesión
if(isset($_POST['cerrarSesion'])) {
    session_start(); // Iniciar una sesión o reanudar la existente
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: ../model/login.php"); // Redireccionar al login.php
}
?>
Derechos Reservados &copy; 2024 

</footer>
</body>
</html>