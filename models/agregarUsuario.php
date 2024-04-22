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
    <link rel="stylesheet" href="../css/rolAmi.css">
    <link rel="stylesheet" href="../css/footer.css">
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

    <main class="mt-4">
        <div class="container">
            <h2 class="titulo">Agregar Usuario</h2>
            <form action="../controllers/rolAdmiController.php" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            </form>
        </div>
    </main>

    <button onclick="goToPreviousPage()" class="btn btn-primary">Continuar</button>

    <script>
    function goToPreviousPage() {
        window.history.back();
    }
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