<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Servicios</title>
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
                        <a class="nav-link disabled text-white" href="..\models\login.php">Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-white" href="..\views\pacientes.php">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled text-white" href="..\views\proveedor.php">Proveedor</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div class="container">
        <h1 class="text-center mt-5 pt-5 display-4">
            <h1>Servicios Brindados Anuales</h1>
            <form id="form-reporte" action="../controllers/reporteServiciosController.php" method="GET" class="mb-3">
                <label for="anio">Seleccionar Año:</label>
                <select name="anio" id="anio" class="form-control">
                    <?php
            $selected_year = isset($_GET['anio']) ? $_GET['anio'] : date('Y');
            $anio_actual = date('Y');
            for ($i = $anio_actual; $i >= $anio_actual - 5; $i--) {
                echo "<option value=\"$i\" " . ($i == $selected_year ? 'selected' : '') . ">$i</option>";
            }
            ?>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Generar Reporte</button>
            </form>

    </div>

    <div class="container">
        <h2>Total de servicios</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo de Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $dsn = 'mysql:host=localhost;dbname=drpets';
            $user = 'admin1';
            $pass = '123';

            try {
                $dbh = new PDO($dsn, $user, $pass);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                exit;
            }

           // Consulta a la base de datos para obtener los servicios más brindados durante el año seleccionado
            $stmt = $dbh->prepare('SELECT s.tipoServicio, COUNT(*) AS cantidad, rs.montoColones AS precio_unitario, SUM(rs.montoColones) AS total FROM RegistroServicios rs JOIN Servicios s ON rs.idServicio = s.idServicio WHERE YEAR(rs.fechaServicio) = :selected_year GROUP BY rs.idServicio ORDER BY cantidad DESC');
            $stmt->bindParam(':selected_year', $selected_year);
            $stmt->execute();
            $servicios_brindados = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($servicios_brindados as $row) {
                echo '<tr>';
                echo '<td>' . $row['tipoServicio'] . '</td>';
                echo '<td>' . $row['cantidad'] . '</td>';
                echo '<td>' . $row['precio_unitario'] . '</td>';
                echo '<td>' . $row['total'] . '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>

    <script>
    document.getElementById("mostrar-tabla").addEventListener("click", function() {
        var form = document.getElementById("form-reporte");
        var formData = new FormData(form);
        formData.set("mostrar_tabla", "1");

        // Obtener la acción del formulario y construir la URL con los parámetros de la consulta
        var action = form.getAttribute("action");
        var queryString = new URLSearchParams(formData).toString();
        var url = action + "?" + queryString;

        fetch(url, {
                method: form.method,
            })
            .then(response => response.text())
            .then(data => {
                // Crear un nuevo div y establecer su contenido como la tabla
                var divTabla = document.createElement("div");
                divTabla.innerHTML = data;

                // Obtener el contenedor donde se mostrará la tabla y añadir el nuevo div
                var contenedorTabla = document.getElementById("contenedor-tabla");
                contenedorTabla.innerHTML = "";
                contenedorTabla.appendChild(divTabla);
            })
            .catch(error => {
                console.error('Error:', error);
            });
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
                            <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid "
                                    width="25"></span></small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>