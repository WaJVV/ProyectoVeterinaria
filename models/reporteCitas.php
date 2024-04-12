<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/Admin.css">
    <link rel="stylesheet" href="plugins/fpdf186/fpdf.css">
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

<body>
    <div class="container">
        <h1 class="mt-5">Generar Reporte de Citas</h1>
        <form action="../controllers/reporteCitasController.php" method="post" class="mt-3">
            <div class="mb-3">
                <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_final" class="form-label">Fecha Final:</label>
                <input type="date" id="fecha_final" name="fecha_final" class="form-control" required>
            </div>
            <!-- Campos ocultos para las fechas seleccionadas -->
            <input type="hidden" id="fecha-inicio-seleccionada" name="fecha-inicio-seleccionada" value="">
            <input type="hidden" id="fecha-final-seleccionada" name="fecha-final-seleccionada" value="">

            <button type="submit" class="btn btn-primary" onclick="actualizarFechas()">Generar Reporte</button>

        </form>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("fecha_inicio").addEventListener("change", function() {
            var fechaInicioSeleccionada = document.getElementById("fecha_inicio").value;
            document.getElementById("fecha-inicio-seleccionada").value = fechaInicioSeleccionada;
        });

        document.getElementById("fecha_final").addEventListener("change", function() {
            var fechaFinalSeleccionada = document.getElementById("fecha_final").value;
            document.getElementById("fecha-final-seleccionada").value = fechaFinalSeleccionada;
        });
    });

    // Agregamos esta función para actualizar los campos ocultos antes de enviar el formulario
    function actualizarFechas() {
        var fechaInicioSeleccionada = document.getElementById("fecha_inicio").value;
        var fechaFinalSeleccionada = document.getElementById("fecha_final").value;
        document.getElementById("fecha-inicio-seleccionada").value = fechaInicioSeleccionada;
        document.getElementById("fecha-final-seleccionada").value = fechaFinalSeleccionada;
    }
</script>

<button class="btn btn-secondary back-button" onclick="atras()">Atrás</button>

<script>
function atras() {
    window.history.back();
}
</script>
 </div>
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
                                    width="25"></span></small> </div>
                </div>
            </div>
        </div>
    </footer>
</body>
 
        <!-- Enlace de descarga para el reporte PDF -->
        <?php if(isset($_GET['reporte'])): ?>
        <p><a href="controllers/reporte.pdf" download>Descargar Reporte</a></p>
        <?php endif; ?>
</html>
