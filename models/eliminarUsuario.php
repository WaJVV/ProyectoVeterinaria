<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/Admin.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand text-white" href="#">Dr. Pet</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="..\views\index.php"> Inicio <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="..\views\nuestraClinica.php">Nuestra Clínica <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="..\views\Servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="..\views\productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-white" href="..\views\contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-white" href="..\views\login.php">Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="FormBuscar d-flex justify-content-start align-items-left">
        <aside class="bg-light p-1">
            <h2 class="mb-4">Buscar Usuario</h2>
            <form action="..\models\eliminarUsuario.php" method="post">
                <div class="mb-0">
                    <label for="usuario" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </aside>
    </div>

    <main>
        <section class="Buscar">
        <?php
// Buscar los datos del aside donde buscamos los usuarios
if(isset($_POST['usuario'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "drpets";

    try {
        // Crear conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurar PDO para que lance excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el nombre de usuario del formulario
        $nombre_usuario = $_POST['usuario'];

        // Consulta SQL para obtener información del usuario con el nombre de usuario especificado
        $sql = "SELECT * FROM admins WHERE usuario=:usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $nombre_usuario);
        $stmt->execute();

        // Mostrar la información del usuario en una tabla si se encontraron resultados
        if ($stmt->rowCount() > 0) {
            echo "<h2 class='text-center'>Información del Usuario</h2>";
            echo "<div class='container'>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead class='thead-dark'><tr><th>Nombre de Usuario</th><th>Nombre</th><th>Apellidos</th><th>Email</th></tr></thead>";
            echo "<tbody>";
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
    } catch(PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }

    // Cerrar conexión
    $conn = null;
}
?>
</section>
    </main>

    <div class="container">
        <h2 class="titulo">Eliminar Usuario</h2>
        <form action="eliminarUsuario.php" method="get">
            <div class="mb-3">
                <label for="id_usuario" class="form-label">ID de Usuario:</label>
                <input type="text" class="form-control" id="id_usuario" name="id_usuario" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Usuario</button>
        </form>
    </div>


    <?php
// Verificar si se recibió un ID de usuario para eliminar
if(isset($_GET['id_usuario'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "admin1";
    $password = "123";
    $dbname = "drpets";

    try {
        // Crear conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurar PDO para que lance excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el ID de usuario a eliminar
        $id_usuario = $_GET['id_usuario'];

        // Consulta SQL para eliminar el usuario
        $sql = "DELETE FROM admins WHERE usuario=:id_usuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();

        echo "Usuario eliminado correctamente";
    } catch(PDOException $e) {
        echo "Error al eliminar usuario: " . $e->getMessage();
    }

    // Cerrar conexión
    $conn = null;
}
?>



    <button class="btn btn-secondary back-button" onclick="atras()">Atrás</button>
    <script>
    function atras() {
        window.history.back();
    }
    </script>


    <footer class="bg-dark">
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
            <div class="col-12">
                <div class="row my-4 row-1 no-gutters">
                    <div class="col-sm-3 col-auto text-center"><small class="text-white">&#9400; Veterinaria
                            Dr.Pet</small>
                    </div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col my-auto text-md-left text-right text-white"> <small>
                            veterinariaDr.Pet@outlook.com
                            <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid " width="25"></span>
                            <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid "
                                    width="25"></span></small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>