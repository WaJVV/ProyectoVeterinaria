<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">Dr. Pet</a>
        <!-- Agrega la clase 'text-white' para hacer que el texto sea blanco -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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

<body>
    <div class="container mt-5">
        <h1>Generar Reporte de Ventas</h1>
        <form action="../controllers/reporteVentasController.php" method="post">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <label for="fecha_final">Fecha de Fin:</label>
                <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
            </div>
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
            <button type="button" class="btn btn-secondary" id="mostrarTabla">Historial de ventas</button>
        </form>
    </div>
    <div class="container mt-5" id="tablaVentas" style="display:none;">
    <h2>Tabla de Ventas</h2>
    <table class="table">
        <?php
        // Establecer la conexión a la base de datos
        try {
            $dsn = 'mysql:host=localhost;dbname=drpets';
            $user = 'admin1';
            $pass = '123';
            $pdo = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
            die();
        }
        // Consulta para obtener los datos de las ventas con join a la tabla de productos
        $query = "SELECT v.idVenta, v.fecha, p.nombre AS producto, v.cantidad, v.total
                  FROM ventas v
                  JOIN productos p ON v.idProducto = p.idProducto";
        $stmt = $pdo->query($query);

        // Mostrar la tabla de ventas
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Venta</th>';
        echo '<th>Fecha</th>';
        echo '<th>Producto</th>';
        echo '<th>Cantidad</th>';
        echo '<th>Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['idVenta'] . '</td>';
            echo '<td>' . $row['fecha'] . '</td>';
            echo '<td>' . $row['producto'] . '</td>';
            echo '<td>' . $row['cantidad'] . '</td>';
            echo '<td>' . $row['total'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        // Cerrar la conexión a la base de datos
        $pdo = null;
        ?>

    </tbody>
    </table>
</div>

        <script>
        document.getElementById("mostrarTabla").addEventListener("click", function() {
            document.getElementById("tablaVentas").style.display = "block";
        });
        </script>
<button type="button" class="btn btn-outline-info" onclick="atras()">Atrás</button>

<script>
function atras() {
    window.history.back();
}
</script>
</body>

<footer class="bg-dark">

    <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
        <div class="col-12">
            <div class="row my-4 row-1 no-gutters">
                <div class="col-sm-3 col-auto text-center"><small class="text-white">&#9400; Veterinaria Dr.Pet</small>
                </div>
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

</html>
