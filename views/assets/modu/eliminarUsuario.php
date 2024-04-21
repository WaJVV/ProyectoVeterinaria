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

    <h2>Buscar Usuario</h2>
    <form action="..\model\eliminarUsuario.php" method="post">
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

    <h2>Eliminar Usuario</h2>
    <form action="eliminarUsuario.php" method="get">
        <label for="id_usuario">ID de Usuario:</label>
        <input type="text" id="id_usuario" name="id_usuario" required><br><br>
        <button type="submit">Eliminar Usuario</button>
    </form>

    <?php
// Verificar si se recibió un ID de usuario para eliminar
if(isset($_GET['id_usuario'])) {
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

    // Obtener el ID de usuario a eliminar
    $id_usuario = $_GET['id_usuario'];

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM admins WHERE usuario='$id_usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>


    <button class="back-button" onclick="atras()">Atrás</button>
    <script>
        function atras() {
        window.history.back();
        }
        </script>
    <footer>
        Derechos Reservados &copy; 2024 
    </footer>