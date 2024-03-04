
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "admin1";
$password = "123";
$dbname = "drpets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener la lista de usuarios
$sql = "SELECT * FROM admins";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="../css/plantilla.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="../css/rolAdmin.css" rel="stylesheet">
</head>
<body class="login-page">
    <header>
        <nav>
            <ul>
                <li><a href=".\index.php">DrPets</a></li>
                <li><a href=".\modu\nuestraClinica.php">Nuestra Clínica</a></li>
                <li><a href=".\modu\Servicios.php">Servicios</a></li>
                <li><a href=".\modu\productos.php">Productos</a></li>
                <li><a href=".\modu\contacto.php">Contacto</a></li>
                <li><a href=".\modu\login.php">Cuenta</a></li>
            </ul>
        </nav>
    </header>
<body>
    <h2>Lista de Usuarios</h2>
    <table class="styled-table">
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo electrónico</th>
            
        </tr>
        <?php
        // Mostrar los usuarios en la tabla
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["usuario"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["apellidos"]. "</td><td>" . $row["email"]. "</td></tr>";
            }
        } else {
            echo "0 resultados";
        }
        ?>
    </table>
    <button class="back-button" onclick="atras()">Atrás</button>
    <script>
        function atras() {
            window.history.back();
            }
            </script>
    <footer>
        Derechos Reservados &copy; 2024 
    </footer>
</body>
</html>
<?php
// Cerrar conexión a la base de datos
$conn->close();
?>

