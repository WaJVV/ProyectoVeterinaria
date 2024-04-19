<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuestraClinica</title>
    <link href="../css/rolAdmin.css" rel="stylesheet"><!-- Enlaza el archivo CSS externo -->
    <link href="assets/css/plantilla.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="..\views\index.php">Dr. Pet</a> <!-- Agrega la clase 'text-white' para hacer que el texto sea blanco -->
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
        <a class="nav-link disabled text-white" href="..\models\login.php">Sesión</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<body><div class="card-header text-center">
    <h3 class="card-title">Nuestra Clínica</h3>
</div>
<br></br>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="https://static.vecteezy.com/system/resources/previews/030/696/799/non_2x/dog-high-quality-4k-hdr-free-photo.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">¿Quienes somos?</h5>
        <p class="card-text">Somos la clínica veterinaria líder en cuidado y bienestar animal en la ciudad. Con más de una década de experiencia, nuestro equipo de profesionales altamente capacitados se dedica a proporcionar atención médica de primera calidad para tus mascotas.</p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary"></small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15714.96356363278!2d-84.1703380042361!3d10.038227491104468!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0f100126db835%3A0xc2c5d1bafa98e61f!2sU%C3%B1as%20Kita!5e0!3m2!1ses-419!2scr!4v1708313564071!5m2!1ses-419!2scr" width="500" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
      <div class="card-body">
        <h5 class="card-title">Ubicación</h5>
        <p class="card-text">Nos encontramos ubicados en Barva de Heredia. Una ubicación excelente para acercarte a conocer nuestras instalaciones y disfrutar de nuestros servicios.</p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary"></small>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://c1.wallpaperflare.com/preview/8/792/8/veterinarian-kitten-feline-doctor.jpg" class="card-img-top" alt="..." width="500" height="550">
      <div class="card-body">
        <h5 class="card-title">Nuestros Especialistas</h5>
        <p class="card-text">Nuestro equipo de especialistas en salud animal está comprometido con el bienestar y la salud de tus mascotas. Con años de experiencia y formación especializada, nuestros veterinarios son expertos en diversas áreas, desde medicina preventiva hasta cirugía avanzada.</p>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary"></small>
      </div>
    </div>
  </div>
</div>
<br></br>
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