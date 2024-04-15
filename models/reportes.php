<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/reportes.css">
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

<div class="container mt-5">
        <article class="Reportesvarios">
            <h1 class="text-center">Reportería</h1>
            <div class="row justify-content-around">
                <div class="col-md-4 col-6 mb-4">
                    <div class="card h-100 rounded">
                        <img class="card-img-top" src="..\img\ventas.jpg" alt="ventas">
                        <div class="card-body text-center">
                            <h5 class="card-title">Ventas</h5>
                            <p class="card-text">Historial de ventas realizadas.</p>
                            <a href="..\models\reporteVentas.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-4">
                    <div class="card h-100 rounded">
                        <img class="card-img-top" src="..\img\servicios.jpg" alt="servicios">
                        <div class="card-body text-center">
                            <h5 class="card-title">Servicios</h5>
                            <p class="card-text">Reporte de servicios anuales.</p>
                            <a href="..\models\reporteServicios.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-4">
                    <div class="card h-100 rounded">
                        <img class="card-img-top" src="..\img\pacientes.jpg" alt="pacientes">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">Reportes de pacientes atendidos.</p>
                            <a href="..\models\reporteCitas.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-4">
                    <div class="card h-100 rounded">
                        <img class="card-img-top" src="..\img\proveedores.jpg" alt="proveedores">
                        <div class="card-body text-center">
                            <h5 class="card-title">Proveedores</h5>
                            <p class="card-text">Proveedores por producto de venta.</p>
                            <a href="..\models\reporteProveedores.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 mb-4">
                    <div class="card h-100 rounded">
                        <img class="card-img-top" src="..\img\cumpleaneros.jpg" alt="cumples">
                        <div class="card-body text-center">
                            <h5 class="card-title">Cumpleañeros</h5>
                            <p class="card-text">Listado de nuestros cumpleaños del mes.</p>
                            <a href="..\models\reportecumple.php" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>

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