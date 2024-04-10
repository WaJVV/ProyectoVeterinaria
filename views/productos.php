<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    
    <link href="assets/css/plantilla.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
  </head>
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
        <a class="nav-link disabled text-white" href="..\views\pacientes.php">Pacientes</a>
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
          <a class="nav-link disabled text-white" href="../views/Graficos.php">Graficos</a>
      </li>
      
    </ul>
  </div>
</nav>
</header>
<body>
<div class="card-header text-center">
    <h3 class="card-title">Productos</h3>
</div>
<br></br>
<div class="card-columns">
  <div class="card">
    <img class="card-img-top" src="https://th.bing.com/th/id/OIP.YWvgDj2cyk0jyLMDj-Kh2QHaEo?w=822&h=515&rs=1&pid=ImgDetMain" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Productos Dentales</h5>
      <p class="card-text">Ofrece una gama de productos para el cuidado de los dientes de los perros, incluyendo limpiadores de dientes y soluciones para problemas como infecciones.</p>
    </div>
  </div>
  <div class="card p-3">
    <blockquote class="blockquote mb-0 card-body">
    <img class="card-img" src="https://www.k9ofmine.com/wp-content/uploads/2021/01/dog-ear-mites-2-850x520.jpg" alt="Card image">
    <h5 class="card-title">Productos Otológicos</h5>
      <p>Desde gotas para aliviar la irritación hasta tratamientos para condiciones específicas, garantizamos una atención ocular óptima para tus queridas mascotas.</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card">
    <img class="card-img-top" src="https://img.interempresas.net/fotos/3261154.jpeg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Productos Baño</h5>
      <p class="card-text">Haz del baño de tu gato una experiencia segura y efectiva con nuestros productos de calidad.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card bg-primary text-white text-center p-3">
  <img class="card-img" src="https://sepicat.es/wp-content/uploads/2019/04/shutterstock_761323492-1.png" alt="Card image">
    <blockquote class="blockquote mb-0">
    <h5 class="card-title">Antibióticos</h5>
      <p>Antibióticos veterinarios son la solución confiable para combatir infecciones bacterianas en mascotas. Respaldados por la ciencia y la seguridad, nuestros productos ofrecen una rápida y efectiva recuperación para mantener a tus animales saludables y felices.</p>
      <footer class="blockquote-footer">
        <small>
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="card-title">Analgésicos</h5>
      <p class="card-text">La línea de analgésicos veterinarios ofrece alivio efectivo del dolor para mascotas, desde pastillas hasta cremas tópicas, proporcionando confort y bienestar en momentos de incomodidad o dolor.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img" src="https://th.bing.com/th/id/R.9cc90571b5f8fd5cbf35ad97d5fc75ea?rik=T7Ld9zTjKOFKug&pid=ImgRaw&r=0" alt="Card image">
  </div>
  <div class="card p-3 text-right">
    <blockquote class="blockquote mb-0">
    <h5 class="card-title">Desparasitantes</h5>
      <p>La variedad de desparasitantes veterinarios ofrece soluciones efectivas para eliminar parásitos internos y externos en mascotas. Desde comprimidos hasta tratamientos tópicos, estos productos garantizan la salud y el bienestar de tus queridos animales al eliminar y prevenir infestaciones parásitas.</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
        </small>
      </footer>
    </blockquote>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <h5 class="card-title">Entretenimiento</h5>
      <p class="card-text">La amplia gama de juguetes para mascotas ofrece diversión y entretenimiento para perros y gatos de todas las edades y tamaños. Desde pelotas y peluches hasta juguetes interactivos, estos productos estimulan el juego y el ejercicio.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>
</body>
<footer class="bg-dark">

   <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
       <div class="col-12">
           <div class="row my-4 row-1 no-gutters">
               <div class="col-sm-3 col-auto text-center"><small class="text-white">&#9400; Veterinaria Dr.Pet</small></div>
               <div class="col-md-3 col-auto"></div>
               <div class="col-md-3 col-auto"></div>
               <div class="col my-auto text-md-left text-right text-white"> <small> veterinariaDr.Pet@outlook.com <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid "  width="25"></span> <span><img src="https://i.imgur.com/N90KDYM.png" class="img-fluid "  width="25"></span></small>  </div> 
           </div>
       </div>
   </div>
</footer>
</html>