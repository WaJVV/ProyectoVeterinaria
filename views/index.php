<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
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
        <a class="nav-link disabled text-white" href="..\views\productoInventario.php">Producto Inventario</a>
      </li>

      <li class="nav-item">
          <a class="nav-link disabled text-white" href="../views/Graficos.php">Ventas</a>
      </li>
    </ul>
  </div>

</nav>
</header>
<body>
<div class="card mb-3">
  <img src="https://media.admagazine.com/photos/618a5f08e702c61c265bba47/master/w_1600%2Cc_limit/91096.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Misión</h5>
    <p class="card-text">TProporcionar atención veterinaria excepcional y compasiva a las mascotas, brindando servicios de alta calidad que promuevan su salud y bienestar. Nos esforzamos por establecer relaciones duraderas con nuestros clientes y sus mascotas, basadas en la confianza, la integridad y el cuidado personalizado. En "Dr. Pet", estamos comprometidos con la excelencia en todo lo que hacemos, desde la atención médica hasta el servicio al cliente, con el objetivo de mejorar la vida de todas las mascotas que atendemos.</p>
    <p class="card-text"><small class="text-body-secondary"></small></p>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Visión</h5>
    <p class="card-text">Nos visualizamos como líderes en el cuidado de la salud animal, reconocidos por nuestra excelencia clínica, nuestro enfoque centrado en el cliente y nuestro compromiso con el bienestar animal. Nos esforzamos por expandir nuestra presencia para poder brindar nuestros servicios a más comunidades, siempre manteniendo los más altos estándares de calidad y ética profesional. Aspiramos a ser un referente en la industria veterinaria, ofreciendo innovación, compasión y dedicación en todo lo que hacemos. En "Dr. Pet", servimos a todos los seres queridos como si fueran parte de nuestra familia.</p>
    <p class="card-text"><small class="text-body-secondary"></small></p>
  </div>
  <img src="https://1.bp.blogspot.com/-mp0p3zN-9Ys/XFYDSZsqnkI/AAAAAAAAB7A/N8FHuAvrrdwvZhoj1agm_7JcOrIEZp_jQCKgBGAs/w5120-h2160-c/cat-1-4K.jpg" class="card-img-bottom" alt="...">
</div>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Nuestros Pacientes</h5>
  </div>
</div>

<div class="card-group">
<br></br>

  <div class="card">
    <img src="https://c4.wallpaperflare.com/wallpaper/710/640/45/dog-dachshund-face-holiday-wallpaper-preview.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Lola, 3 años</h5>
      <p class="card-text">Lola, una encantadora perrita de tres años, llegó a "Dr. Pet" con síntomas de malestar gastrointestinal. Después de una cuidadosa evaluación por parte de nuestros veterinarios, se determinó que Lola tenía una infección estomacal. Fue hospitalizada durante dos días, donde recibió tratamiento médico y atención especializada. Después de su estancia en el hospital, Lola regresó a casa sintiéndose mucho mejor y rápidamente recuperó su energía y apetito habitual. Su familia estaba encantada de verla feliz y juguetona de nuevo..</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Visita el 07 de Febrero 2024</small>
    </div>
  </div>
  <div class="card">
    <img src="https://i.pinimg.com/736x/e4/b3/12/e4b3124c68f41c4d1ffdc1c7c156cfe7.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Grey, 5 años</h5>
      <p class="card-text">Grey, una gatita de cinco años, fue llevada a "Dr. Pet" después de sufrir una lesión en una pata durante un juego en el parque. Tras ser examinado por nuestros veterinarios, se determinó que Grey tenía una fractura en una de sus patas. Fue sometido a una cirugía ortopédica y posteriormente hospitalizado para su recuperación. Después de unas semanas de cuidados intensivos y rehabilitación, Grey pudo regresar a casa con su familia. Estaba encantado de volver a caminar y jugar, y su familia estaba agradecida por el excelente cuidado que recibió en nuestra clínica..</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Visita el 19 de Febrero 2024</small>
    </div>
  </div>
  <div class="card">
    <img src="https://p4.wallpaperbetter.com/wallpaper/82/412/1020/aleman-bosque-pastor-perro-wallpaper-preview.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Atos, 4 años</h5>
      <p class="card-text">Atos, un Pastor Alemán de cuatro años, fue admitido en "Dr. Pet" después de mostrar signos de letargo y pérdida de apetito. Después de una evaluación exhaustiva, se descubrió que Atos había ingerido accidentalmente una sustancia tóxica en casa. Fue tratado de inmediato por nuestro equipo veterinario y hospitalizado para recibir terapia de desintoxicación y monitoreo continuo. Después de unos días de tratamiento intensivo, Atos mostró signos de mejora y finalmente pudo ser dado de alta. Estaba visiblemente más animado y recuperó su apetito. Su familia estaba aliviada y agradecida por la pronta recuperación de su fiel compañero..</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Visita el 28 de Febrero 2024</small>
    </div>
  </div>
</div>
<br></br>

<!--Comentarios-->
<h2>Caja de Comentarios</h2>
<br>
<p class="lead">Introduce tu comentario de nuestra página y servicios brindados.</p>
<br>
<label for="nombreC" class="form-label">Nombre:</label>
<input class="form-control" name="nombreC" type="text" id="nombreC" placeholder="Escribe tu nombre aquí"></input>
<br>
<label for="comentario" class="form-label">Comentario:</label>
<textarea class="form-control" name="comentario" cols="30" rows="5" type="text" id="comentario"
placeholder="Escribe tu comentario aquí...."></textarea>
<br>
<input class="btn btn-primary" type="submit" value="Enviar">
<br>
<br>
<br>
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
