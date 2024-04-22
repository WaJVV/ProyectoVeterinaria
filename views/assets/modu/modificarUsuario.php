<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="../css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="../css/rolAdmin.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="..\index.php">DrPets</a></li>
                <li><a href="..\model\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href="..\model\servicios.php">Servicios</a></li>
                <li><a href="..\model\productos.php#">Productos</a></li>
                <li><a href="..\model\contacto.php">Contacto</a></li>
                <li><a href="..\model\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
    <aside>
    <h2>Buscar Usuario</h2>
    <form action="..\model\modificarUsuario.php" method="post">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <button type="submit">Buscar</button>
    </form>
</aside>
<main>
    <section class="Modificar">
        <?php
        // Buscar los datos del aside donde buscamos los usuarios
        if(isset($_POST['usuario'])) {
            // Datos de conexión a la base de datos
            $servername = "localhost";
            $username = "admin1";
            $password = "123";
            $dbname = "drpetsvet";

            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Obtener el nombre de usuario del formulario
            $nombre_usuario = $_POST['usuario'];

            // Consulta SQL para obtener información del usuario con el nombre de usuario especificado
            $sql = "SELECT * FROM admins WHERE usuario='$nombre_usuario'";
            $result = $conn->query($sql);

            // Mostrar la información del usuario en una tabla si se encontraron resultados
            if ($result->num_rows > 0) {
                echo "<h2>Información del Usuario</h2>";
                echo "<table>";
                echo "<tr><th>Nombre de Usuario</th><th>Nombre</th><th>Apellidos</th><th>Email</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["usuario"]. "</td>";
                    echo "<td>" . $row["nombre"]. "</td>";
                    echo "<td>" . $row["apellidos"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Usuario no encontrado";
            }

            // Cerrar conexión
            $conn->close();
        }
        ?>
    </section>
</main>

<section>
    <h3>Modificar Usuario</h3>
    <form action="..\model\modificarUsuario.php" method="post">
        <input type="hidden" name="usuario" value="<?php echo isset($nombre_usuario) ? $nombre_usuario : ''; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required><br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <button type="submit">Modificar Usuario</button>
    </form>

</section>
        </main>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos necesarios
    if (isset($_POST['usuario']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
        // Datos de conexión a la base de datos
        $servername = "localhost";
        $username = "admin1";
        $password = "123";
        $dbname = "drpetsvet";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener los datos del formulario
        $id_usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        // Consulta SQL para actualizar los datos del usuario
        $sql = "UPDATE admins SET nombre='$nombre', apellidos='$apellidos', email='$email', contrasena='$contrasena' WHERE usuario='$id_usuario'";

        if ($conn->query($sql) === TRUE) {
            echo "Usuario actualizado correctamente";
        } else {
            echo "Error al actualizar usuario: " . $conn->error;
        }

        // Cerrar conexión
        $conn->close();
    } else {
        echo "Faltan datos para actualizar el usuario";
    }
}
?>
    <button class="back-button" onclick="atras()">Atrás</button>
    <script>
    function atras() {
        <?php
        // Verificar si las variables están definidas antes de construir la URL
        $nombre_url = isset($nombre) ? urlencode($nombre) : '';
        $apellidos_url = isset($apellidos) ? urlencode($apellidos) : '';
        ?>
        window.location.href = '../rolAdmiController.php?nombre=<?php echo $nombre_url; ?>&apellidos=<?php echo $apellidos_url; ?>';
    }
</script>

    <footer>
        Derechos Reservados &copy; 2024 
    </footer>