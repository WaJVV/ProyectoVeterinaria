<?php
session_start(); // Iniciar una sesión o reanudar la existente

// Comprobar si se ha pulsado el botón de cerrar sesión
if(isset($_POST['cerrarSesion'])) {
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: ../models/login.php"); // Redireccionar al login.php
    exit; // Salir del script para evitar cualquier salida adicional
}
?>

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
    <link rel="stylesheet" href="../css/rolAdmi.css">
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


    <div class="container-fluid">
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
    </div>

    <div class="opciones-administrador">
        <h2 class="titulo">Opciones de Administrador:</h2>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-info btn-block" onclick="location.href='../models/agregarUsuario.php'">Agregar
                    Usuario</button>
            </div>
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-info btn-block" onclick="location.href='../models/rolAdmi.php'">Ver
                    Usuarios</button>
            </div>
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-info btn-block"
                    onclick="location.href='../models/modificarUsuario.php'">Modificar
                    Datos</button>
            </div>
            <div class="col-sm-6 col-md-2">
                <button class="btn btn-info btn-block" onclick="location.href='../models/eliminarUsuario.php'">Eliminar
                    Usuario</button>
            </div>
        </div>
    </div>


    <div class="contenido">
        <div class="row">
            <nav class="col-md-2">
                <div class="menu">
                    <div class="row justify-content-start">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">Menú</div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush text-start">
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Clientes</button>
                                            <ul class="submenu">
                                                <li><a href="..\views\cliente.php">Lista</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Pacientes</button>
                                            <ul class="submenu">
                                                <li><a href="..\views\pacientes.php">Lista</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Citas y
                                                Recordatorios</button>
                                            <ul class="submenu">
                                                <li><a href="..\models\agenda.php">Agendas</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Informes</button>
                                            <ul class="submenu">
                                                <li><a href="..\models\reportes.php">Reportes</a></li>
                                                <li><a href="..\views\productoInventario.php">Inventario</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Ventas</button>
                                            <ul class="submenu">
                                                <li><a href="..\views\venta.php">Nueva Venta</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Proveedor</button>
                                            <ul class="submenu">
                                                <li><a href="..\views\proveedor.php">Lista</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item">
                                            <button class="opcion-desplegable btn btn-link">Graficos</button>
                                            <ul class="submenu">
                                                <li><a href="../views/Graficos.php">Vista</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <button class="btn btn-secondary back-button" onclick="atras()">Atrás</button>
                                    <script>
                                    function atras() {
                                        window.history.back();
                                    }
                                    </script>
                                </div>
                                <!--cerrar sesión -->
                                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="mt-3">
                                    <button class="btn btn-danger" type="submit" name="cerrarSesion">Cerrar
                                        Sesión</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <article class="infoImportante col md-10">
                <div class="miContenedor">
                    <div class="row justify-content-start">
                        <div class="col-md-5">
                            <div class="card mb-3">
                                <img src="..\img\mision.jpg" class="card-img-top" alt="misionDrPets">
                                <div class="card-body">
                                    <h5 class="card-title">Misión</h5>
                                    <p class="card-text text-justify">Proporcionar atención veterinaria excepcional y
                                        compasiva a las
                                        mascotas, brindando servicios de alta calidad que promuevan su salud y
                                        bienestar. Nos esforzamos por establecer relaciones duraderas con nuestros
                                        clientes y sus mascotas, basadas en la confianza, la integridad y el cuidado
                                        personalizado. En "Dr. Pet", estamos comprometidos con la excelencia en todo lo
                                        que hacemos, desde la atención médica hasta el servicio al cliente, con el
                                        objetivo de mejorar la vida de todas las mascotas que atendemos..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card mb-3">
                                <img src="..\img\vision.jpg" class="card-img-top" alt="visionDrPets">
                                <div class="card-body">
                                    <h5 class="card-title">Visión</h5>
                                    <p class="card-text text-justify">Nos visualizamos como líderes en el cuidado de la
                                        salud animal,
                                        reconocidos por nuestra excelencia clínica, nuestro enfoque centrado en el
                                        cliente y nuestro compromiso con el bienestar animal. Nos esforzamos por
                                        expandir nuestra presencia para poder brindar nuestros servicios a más
                                        comunidades, siempre manteniendo los más altos estándares de calidad y ética
                                        profesional. Aspiramos a ser un referente en la industria veterinaria,
                                        ofreciendo innovación, compasión y dedicación en todo lo que hacemos. En "Dr.
                                        Pet", servimos a todos los seres queridos como si fueran parte de nuestra
                                        familia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card mb-3">
                                <img src="..\img\descuento.jpg" class="card-img-top" alt="descuentoEmpl">
                                <div class="card-body">
                                    <h5 class="card-title">Promociones para empleados</h5>
                                    <p class="card-text  text-justify">Recordemos que tenemos un 30% de descuento en
                                        todos los
                                        servicios al ser parte de esta linda familia como lo es Dr.Pets.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card mb-3">
                                <img src="..\img\estadisticas.jpg" class="card-img-top" alt="Estadísticas">
                                <div class="card-body">
                                    <h5 class="card-title">Estadísticas del mes</h5>
                                    <p class="card-text  text-justify">Recordá que el módulo de reportes es donde
                                        podemos validar la
                                        nuestro desempeño y la importancia de nuestro trabajo, esto es una forma de
                                        mantener la
                                        transparencia en nuestra veterinaria</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <?php
// Verificar si se enviaron los datos del formulario de Agregar usuario
if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "drpets";
    
    // Crear una nueva conexión PDO
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Habilitar el manejo de errores PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el último número de usuario registrado
        $sql_last_user = "SELECT MAX(SUBSTRING(usuario, 6)) as last_user FROM admins";
        $result_last_user = $conn->query($sql_last_user);
        $row_last_user = $result_last_user->fetch(PDO::FETCH_ASSOC);
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
        if ($conn->exec($sql)) {
            header("Location: ./rolAdmiController.php?nombre=".$nombre."&apellidos=".$apellidos);
            exit();
        } else {
            echo "Error al registrar usuario";
        }

    } catch(PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

    // Cerrar conexión
    $conn = null;
}
?>

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