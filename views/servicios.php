<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="../css/plantilla.css" rel="stylesheet">
    <link href="assets/css/plantilla.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
  </head>
  <header>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="..\views\index.php">Dr. Pet</a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
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
    </ul>
  </div>
</nav>
</header>
<body>
  <div class="card-header text-center">
    <h3 class="card-title">Servicios</h3>
</div>
<br></br>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="https://th.bing.com/th/id/OIP.ldUezA8YnKX_OWfnAEVdMgHaE8?rs=1&pid=ImgDetMain" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Cirugía</h5>
        <p class="card-text">Procedimientos quirúrgicos requeridos por tus mascotas.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://c4.wallpaperflare.com/wallpaper/993/777/108/cat-inspection-hands-vet-treatment-wallpaper-preview.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Consulta general</h5>
        <p class="card-text">Atendemos las necesidades y controlamos de la salud de tu mascota.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://www.centroveterinarioalbayda.com/wp-content/uploads/2016/09/analisis-de-sangre-preanestesicos-para-mascotas.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Hospitalizaciones</h5>
        <p class="card-text">Nos encargamos del internamiento de tu mascota, administrando medicamentos indicados por nuestros especialistas.</p>
      </div>
    </div>
  </div>
  
</div>

<br></br>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="https://img.freepik.com/fotos-premium/medico-mascotas-profesional-haciendo-ecografia-perros-raza-yorkshire-terrier-dentro-coche-ambulancia_105751-9182.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Consultas Especializadas</h5>
        <p class="card-text">Consultas de cardiología, ecografía, radiografía, otología, oftalmología, dermatología y más.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://lightbox-prod.imgix.net/images/assets/PROMO_WIDE_mac_10186322_C5282681-0DFF-4E3F-8A3A94A49D587774.jpg?auto=format&fit=crop&crop=faces%2Cright&ar=16%3A9&ixlib=react-9.0.1" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Hotel y Spa</h5>
        <p class="card-text">Nos dedicamos a cuidar a tus mascotas cuando no estás en casa, proporcionando área de juegos y actividades relajantes.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://img.freepik.com/fotos-premium/perro-sometido-hidroterapia-piscina-rehabilitacion-mascotas_419341-124464.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Fisioterapia</h5>
        <p class="card-text">Realizamos terapias en conjunto con nuestros especialistas a tu mascota.</p>
      </div>
    </div>
  </div>
  </div>
  <br></br>

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="https://infomascota.com/wp-content/uploads/2016/03/sangre-perros-2-art.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Control de salud</h5>
        <p class="card-text">En nuestro laboratorio procesamos las muestras de bioquímica clínica e inmunología de tu mascota.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://t4.ftcdn.net/jpg/01/46/22/73/360_F_146227351_nfUic5kpavG8anaOCPp9jGHeEgryGqFu.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Consulta Éxoticos y Silvestres</h5>
        <p class="card-text">Consulta general para animales exóticos y silvestres.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://animalscenter.com/blog/wp-content/uploads/2018/12/grooming-canino-bogota.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Grooming</h5>
        <p class="card-text">Cuidado completo del pelaje de nuestra mascota, mediante baños, cortes e hidratación.</p>
      </div>
    </div>
  </div>
</div>
</div>
<br></br>
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
