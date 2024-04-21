<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link href="assets/css/plantilla3.css" rel="stylesheet"> <!-- Enlaza el archivo CSS externo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    </div>
    </ul>
  </div>
</nav>
</header>
<body>
<div class="card-header text-center">
    <h1 class="card-title">Ventas</h1>
    <br><br>
    <h2>Productos</h2>

      <h4>Cuidado de la mascota</h4>
        <div class="container-items">
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/048985/8711231156849.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Beaphar Pasta Multi-Vitaminas Perro</h5>
                  <div class="table-container">
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController.php"?>
                  </table>
                  </div>
                  <p class="price">₡5000</p>
                    <button class="btn btn-success" id="btn_guardado">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/049047/8711231129522-650d7355e0dbb.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Beaphar Pasta Dentífrica con Sabor a Carne para Perro y Gato</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController2.php"?>
                  </table>                  
                  <p class="price">₡3500</p>
                    <button class="btn btn-success" id="btn_guardado1">Agregar producto</button>
                </div>
            </div>
          </div><div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/253349/coatex-complemento-alimenticio-para-pelo-piel-en-perros-gatos_1.jpeg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>VetPlus Coatex Complemento Alimenticio para Pelo y Piel en Perros y Gatos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController3.php"?>
                  </table>
                  <p class="price">₡16500</p>
                  <button class="btn btn-success" id="btn_guardado2">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/423811/8435117818095.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Arquivet Aceite de Salmón Escocés para Perros y Gatos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController4.php"?>
                  </table>
                  <p class="price">₡9500</p>
                  <button class="btn btn-success" id="btn_guardado3">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/070948/70948-ipakitine-60g_1.JPG" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Vétoquinol Ipakitine para Función Renal</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController5.php"?>
                  </table>
                  <p class="price">₡11300</p>
                  <button class="btn btn-success" id="btn_guardado4">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/116901/116901_1.jpeg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Virbac Pronefra para Problemas Renales en Perros y Gatos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController6.php"?>
                  </table>
                  <p class="price">₡14500</p>
                  <button class="btn btn-success" id="btn_guardado5">Agregar producto</button>
                </div>
            </div>
          </div>


          <br><br>
          <h4>Alimentación</h4>
          <br><br>


          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/161953/161953-2_1.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Royal Canin Comida Húmeda Mini Puppy para Perro</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController7.php"?>
                  </table>
                  <p class="price">₡700</p>
                  <button class="btn btn-success" id="btn_guardado6">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/162745/en-gastrointestinal-mousse_1.jpeg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Pro Plan Veterinary Diets Comida Húmeda Enlatada Gastrointestinal Mousse</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController8.php"?>
                  </table>
                  <p class="price">₡26500</p>
                  <button class="btn btn-success" id="btn_guardado7">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/000284/01-RC-SHN-MaxiAdult-MV-1-es-ES-pdf-65df5094e4f4a.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Royal Canin Maxi Adult Pienso para Perro Adulto de Razas Tamaño Grande</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController9.php"?>
                  </table>
                  <p class="price">₡43500</p>
                  <button class="btn btn-success" id="btn_guardado8">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/187843/187843-7613035442535frangoecen_0.png" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Pack 24 Gourmet Comida Húmeda Gold Tartelette de Pollo y Zanahoria para Gatos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController10.php"?>
                  </table>
                  <p class="price">₡14000</p>
                  <button class="btn btn-success" id="btn_guardado9">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/430596/Grature-adult-salmon-cat-6368e596d3818.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Grature Pienso Anti Bolas de Pelo para Gatos Adultos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController11.php"?>
                  </table>
                  <p class="price">₡5000</p>
                  <button class="btn btn-success" id="btn_guardado10">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/003459/3459_0.jpeg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Royal Canin Maine Coon Pienso para Gato Adulto de Raza </h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController12.php"?>
                  </table>
                  <p class="price">₡25500</p>
                  <button class="btn btn-success" id="btn_guardado11">Agregar producto</button>
                </div>
            </div>
          </div>

          <br><br>
          <h4>Accesorios</h4>
          <br><br>

          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/505825/Pelotas-Tenis-22-63ac58059b9ec.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Musqui Pelota de Tenis Amarilla para Perros</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController13.php"?>
                  </table>
                  <p class="price">₡1500</p>
                  <button class="btn btn-success" id="btn_guardado12">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/015550/15550-cocodrilo-latex-35cm-con-sonido-trixie-perro-juguete-3529-h-1-g_1.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Trixie Cocodrilo Látex con Sonido</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController14.php"?>
                  </table>
                  <p class="price">₡6000</p>
                  <button class="btn btn-success" id="btn_guardado13">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/169431/169431-8427458015936_0.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Nayeco Nudo con 2 Pelotas de Tennis Bicolor</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController15.php"?>
                  </table>
                  <p class="price">₡3500</p>
                  <button class="btn btn-success" id="btn_guardado14">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/021139/21139-50725_1_g.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Catit Senses Alfombrilla de Juegos</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController16.php"?>
                  </table>
                  <p class="price">₡14700</p>
                  <button class="btn btn-success" id="btn_guardado15">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/072503/72503-134370-39759_1.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Trixie Guante De Juego Con Juguetes, Marrón</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController17.php"?>
                  </table>
                  <p class="price">₡4500</p>
                  <button class="btn btn-success" id="btn_guardado16">Agregar producto</button>
                </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <img src="https://static.miscota.com/media/1/photos/products/167893/167893-4011905358543_0.jpg" alt="produco" class="img-normalizada">
            </figure>
            <div class="info-product">
                <div>
                  <h5>Trixie Tortuga de Peluche con Sonido</h5>
                  <table border="1">
                    <tr>
                      <th>Unidades</th>
                    </tr>
                    <?php include "..\controllers\stockController18.php"?>
                  </table>
                  <p class="price">₡8000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar producto</button>
                  <br><br>
                  <br><br>
                </div>
            </div>
          </div>

          <br><br>
          <h2>Servicios</h2>
          <br><br>
          
          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Consulta General</h5>
                  <p class="price">₡15000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Cirugía</h5>
                  <p class="price">₡25000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Hospitalizaciones</h5>
                  <p class="price">₡35000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Consultas Especializadas</h5>
                  <p class="price">₡20000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Hotel Y Spa</h5>
                  <p class="price">₡45000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Fisioterapia</h5>
                  <p class="price">₡30000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Control de Salud</h5>
                  <p class="price">₡50000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Consulta Exóticos y Silvestres</h5>
                  <p class="price">₡40000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <div class="item">
            <div class="info-product">
                <div>
                  <h5>Grooming</h5>
                  <p class="price">₡20000</p>
                  <button class="btn btn-success" id="btn_guardado17">Agregar servicio</button>
                </div>
            </div>
          </div>

          <br><br>

        <div>
    </div>
</div>
<script src="assets/js/productos.js"></script>
<script src="assets/js/btn.js"></script>
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