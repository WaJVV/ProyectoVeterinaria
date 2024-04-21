<?php
//php para uso de la tabla
$dsn = 'mysql:host=localhost;dbname=drpetsvet';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Consulta a la base de datos para obtener todas las mascotas
$stmt = $dbh->prepare('SELECT idMascota, nombre AS nombreMascota, raza, nacimientoMascota, idCliente FROM mascotas');
$stmt->execute();
$cumpleaneros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Cumpleañeros</title>
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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4"> <!-- Columna para el aside -->
                <aside>
                    <img src="..\img\cumples.jpg" alt="cumples" class="img-fluid">
                </aside>
            </div>
            <div class="col-md-8"> <!-- Columna para el formulario -->
                <h2>Cumpleañeros del mes</h2>
                <form action="../controllers/reporteMascotasController.php" method="GET" class="mb-3">
                    <label for="mes">Seleccionar Mes:</label>
                    <select name="mes" id="mes" class="form-control">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <button type="submit" name="action" value="generar" class="btn btn-primary mt-2">Generar Reporte</button>
                </form>
                <button id="mostrarTabla" class="btn btn-primary">Historial de Clientes</button>
                <table id="tablaCumples" class="table mt-3" style="display: none;">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre Mascota</th>
                            <th>Raza</th>
                            <th>Fecha de Nacimiento</th>
                            <th>ID Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Imprimir los datos de los cumpleañeros en la tabla
                        if (isset($cumpleaneros)) {
                            foreach ($cumpleaneros as $cumpleanero) {
                                echo "<tr>";
                                echo "<td>{$cumpleanero['idMascota']}</td>";
                                echo "<td>{$cumpleanero['nombreMascota']}</td>";
                                echo "<td>{$cumpleanero['raza']}</td>";
                                echo "<td>{$cumpleanero['nacimientoMascota']}</td>";
                                echo "<td>{$cumpleanero['idCliente']}</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-wsKSThzTCYzk5DvzVvD2LGAw00WPhs2m6cPcagjK3s5n9g4Kt6dhYoaNt5D5JVoC"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('mostrarTabla').addEventListener('click', function () {
            document.getElementById('tablaCumples').style.display = 'block';
        });
    </script>
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
                            Dr.Pet</small></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col my-auto text-md-left text-right text-white"> <small> veterinariaDr.Pet@outlook.com
                            <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid " width="25"></span>
                            <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid " width="25"></span></small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
