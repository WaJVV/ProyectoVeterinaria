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
            <li class="nav-item">
              <a class="nav-link disabled text-white" href="..\views\usuario.php">Pacientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled text-white" href="..\views\proveedor.php">Proveedor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled text-white" href="..\views\cliente.php">Cliente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled text-white" href="..\views\veterinario.php">Veterinario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled text-white" href="../views/ventas.php">Ventas</a>
            </li>
          </ul>
        </div>
    </nav>
  </header>

  <main>


    <div>
      <canvas id="myChart"></canvas>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
 
</body>
</html>
