<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
<a class="navbar-brand text-white" href="#">Dr. Pets</a>
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
    </ul>
</div>
</nav>
</header>
<h1> Calendario de Actividades </h1>

<div class= "botonesAgenda"> 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarCitaModal">
    Agregar Cita
  </button>
  <button id="modificarCitaBtn" class="btn btn-warning">Modificar Cita</button>
  <button id="eliminarCitaBtn" class="btn btn-danger">Eliminar Cita</button>
</div>


<div class="calendar">
    <!-- Modal de agregar cita -->
    <div class="modal fade" id="agregarCitaModal" tabindex="-1" aria-labelledby="agregarCitaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="agregarCitaModalLabel">Agregar Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="agregarCitaForm">
            <div class="mb-3">
              <label for="title" class="form-label">Título de la cita:</label>
              <input type="text" class="form-control" id="title" required>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Fecha y hora de la cita:</label>
              <input type="datetime-local" class="form-control" id="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script>
  var date = new Date()
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialView: 'dayGridMonth',
      events: [
        {
          title          : 'Consulta veterinaria',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Vacunación',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Operación',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f56954', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Control',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        }
      ]
    });
    calendar.render();
        // Evento para agregar cita
        document.getElementById('agregarCitaForm').addEventListener('submit', function(event) {
      event.preventDefault(); // Evitar que se recargue la página
      var title = document.getElementById('title').value;
      var date = document.getElementById('date').value;
      var newEvent = {
        title: title,
        start: new Date(date),
        allDay: false,
        backgroundColor: '#3c8dbc', // Primary (blue)
        borderColor: '#3c8dbc' // Primary (blue)
      };
      calendar.addEvent(newEvent);
      $('#agregarCitaModal').modal('hide'); // Cerrar el modal
    });
  });
</script>
</head>
<body>
<div id='calendar'></div>
<div id='form-container'>
</div>
</div>



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
</body>
</html>

