<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/fichaMedica.js"></script>
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
        <a class="nav-link disabled text-white" href="..\views\fichaMedica.php">Ficha Medica</a>
      </li>
    </ul>
  </div>
</nav>
</header>
<body>
<div class="row">
    <!-- Formulario de creación de Ficha Médica -->
    <div class="col-md-12" id="formulario_add">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="nav">Agregar Ficha Médica de Paciente</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form name="proveedor_add" id="proveedor_add" method="POST">
                            <input type="hidden" id="existeModulo" name="existeModulo">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idMascota">Identificación Mascota</label>
                                        <input type="text" class="form-control" id="idMascota" name="idMascota" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_cita">Fecha Cita Médica</label>
                                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idVeterinario">Veterinario</label>
                                        <input type="text" class="form-control" id="idVeterinario" name="idVeterinario" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <input type="text" class="form-control" id="peso" name="peso" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="temperatura">Temperatura</label>
                                        <input type="text" class="form-control" id="temperatura" name="temperatura" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="motivo">Motivo Consulta</label>
                                        <input type="text" class="form-control" id="motivo" name="motivo" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idVeterinario">Diagnóstico</label>
                                        <input type="text" class="form-control" id="diagnostico" name="diagnostico" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idVeterinario">Tratamiento</label>
                                        <input type="text" class="form-control" id="tratamiento" name="tratamiento" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="submit" id="btnRegistrar" class="btn btn-success" value="Registrar">
                                    <input type="reset" class="btn btn-warning" value="Borrar datos">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<!-- Listado de Proveedores -->
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Fichas Médicas registradas</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="row mt-2">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table id="tbllistado" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>Id Ficha Medica</th>
                            <th>Id Mascota</th>
                            <th>Fecha Cita</th>
                            <th>Id Veterinario</th>
                            <th>Peso</th>
                            <th>Temperatura</th>
                            <th>Motivo</th>
                            <th>Diagnóstico</th>
                            <th>Tratamiento</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th>Id Ficha Medica</th>
                            <th>Id Mascota</th>
                            <th>Fecha Cita</th>
                            <th>Id Veterinario</th>
                            <th>Peso</th>
                            <th>Temperatura</th>
                            <th>Motivo</th>
                            <th>Diagnóstico</th>
                            <th>Tratamiento</th>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/fichaMedica.js"></script>
</body>
</HTML>





