<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Proveedores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

</head>
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
    <<div class="container mt-5">
    <h1>Reporte de Proveedores por Producto</h1>
    <form action="../controllers/reporteProvController.php" method="post">
        <div class="form-group">
            <label for="proveedor">Seleccione el proveedor:</label>
            <select class="form-control" id="proveedor" name="proveedor" required>
                <option value="" selected disabled>Selecciona un proveedor</option>
                <?php
                // Establecer la conexión a la base de datos
                try {
                    $dsn = 'mysql:host=localhost;dbname=drpets';
                    $user = 'root';
                    $pass = '';
                    $pdo = new PDO($dsn, $user, $pass);
                } catch (PDOException $e) {
                    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
                    die();
                }

                // Consulta para obtener los nombres de los proveedores
                $query = "SELECT idProveedor, nombre FROM proveedores";
                $stmt = $pdo->query($query);

                // Mostrar opciones de proveedores en el select
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row['idProveedor'] . '">' . $row['nombre'] . '</option>';
                }

                // Cerrar la conexión a la base de datos
                $pdo = null;
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Generar Reporte</button>
        <button type="button" class="btn btn-secondary" id="mostrarTabla">Historial de proveedores</button>
    </form>
</div>



    <div class="container mt-5" id="tablaProveedores" style="display:none;">
        <h1>Listado de Proveedores por Producto de Venta</h1>
        <?php
        // Establecer la conexión a la base de datos
        try {
            $dsn = 'mysql:host=localhost;dbname=drpets';
            $user = 'root';
            $pass = '';
            $pdo = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
            die();
        }

        // Consulta para obtener los datos de los proveedores por producto de venta
        $query = "SELECT pi.idProducto, pi.nombre AS producto, p.nombre AS proveedor
                  FROM productoinventario pi
                  JOIN proveedores p ON pi.idProveedor = p.idProveedor";
        $stmt = $pdo->query($query);

        // Mostrar la tabla de proveedores por producto de venta
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Producto</th>';
        echo '<th>Producto</th>';
        echo '<th>Proveedor</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['idProducto'] . '</td>';
            echo '<td>' . $row['producto'] . '</td>';
            echo '<td>' . $row['proveedor'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        // Cerrar la conexión a la base de datos
        $pdo = null;
        ?>
    </div>
    <script>
    document.getElementById("mostrarTabla").addEventListener("click", function() {
        document.getElementById("tablaProveedores").style.display = "block";
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