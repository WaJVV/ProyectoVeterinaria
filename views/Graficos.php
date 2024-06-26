<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link href="assets/css/plantilla.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <a class="navbar-brand text-white" href="#">Dr. Pet</a> <!-- Agrega la clase 'text-white' para hacer que el texto sea blanco -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-white" href="..\views\index.php"> Inicio <span class="sr-only">(current)</span></a>
            </li>  
            <li class="nav-item active">
              <a class="nav-link text-white" href="..\views\nuestraClinica.php">Nuestra Clínica <span class="sr-only">(current)</span></a>
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

  <main>


    <div>
      <canvas id="grafica"></canvas>
    </div>

    <div>
      <canvas id="grafica2"></canvas>
    </div>

    <div>
      <canvas id="grafica3"></canvas>
    </div>

  

  </main>

  <footer class="bg-dark">
    <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
      <div class="col-12">
        <div class="row my-4 row-1 no-gutters">
          <div class="col-sm-3 col-auto text-center"><small class="text-white">&#9400; Veterinaria Dr.Pet</small></div>
          <div class="col-md-3 col-auto"></div>
          <div class="col-md-3 col-auto"></div>
          <div class="col my-auto text-md-left text-right text-white">
            <small> veterinariaDr.Pet@outlook.com <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid "  width="25"></span> <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid "  width="25"></span></small>  
          </div> 
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript" src="../views/assets/js/graficaCliente.js"></script>
  <script type="text/javascript" src="../views/assets/js/graficaProductos.js"></script>
  <script type="text/javascript" src="../views/assets/js/graficaProveedores.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  

 
</body>
</html>
