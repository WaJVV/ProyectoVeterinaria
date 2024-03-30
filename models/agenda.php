<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrPets</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">        
    <link href="toastr.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/Admin.css">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/locales/es.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/locales/es.js'></script>



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

<div class="botonesAgenda">
    <button id="mostrarFormularioBtn" class="btn btn-primary">Agregar Cita</button>
    <button id="verCitasBtn" class="btn btn-warning">Ver Citas</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal">
    Eliminar Cita
</button>
</div>

<div class="citasNuevas">
    <div id="formulario" style="display: none;">
        <form id="agregarCitaForm" action="../controllers/agendaController.php" method="POST" class="needs-validation" novalidate>
            <input type="hidden" name="accion" value="agregarCita">
            <div class="mb-3 row">
                <label for="nombreCliente" class="col-sm-2 col-form-label">Nombre del cliente:</label>
                <div class="col-auto">
                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="identificacionCliente" class="col-sm-2 col-form-label">Identificación del cliente:</label>
                <div class="col-auto">
                    <input type="text" class="form-control" id="identificacionCliente" name="identificacionCliente" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idMascota" class="col-sm-2 col-form-label">ID de Mascota:</label>
                <div class="col-auto">
                    <input type="text" class="form-control" id="idMascota" name="idMascota" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tipoCita" class="col-sm-2 col-form-label">Tipo de cita:</label>
                <div class="col-auto">
                    <input type="text" class="form-control" id="tipoCita" name="tipoCita" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                <div class="col-auto">
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="hora" class="col-sm-2 col-form-label">Hora:</label>
                <div class="col-auto">
                    <input type="time" class="form-control" id="hora" name="hora" required>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idVeterinario" class="col-sm-2 col-form-label">Veterinario:</label>
                <div class="col-auto">
                    <select class="form-control" id="idVeterinario" name="idVeterinario" required>
                        <option value="">Seleccionar</option>
                        <option value="1">Medicina General</option>
                        <option value="2">Cirugía</option>
                        <option value="3">Dermatología</option>
                        <option value="4">Oftalmología</option>
                        <option value="5">Cardiología</option>
                    </select>
                    <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
            </div>
            <button type="submit" id="guardarCitaBtn" class="btn btn-primary">Guardar</button>
            <button type="button" id="cerrarFormularioBtn" class="btn btn-danger">Cerrar</button>
        </form>
    </div>
</div>
<div id="resultado"></div>

<script>
    document.getElementById('cerrarFormularioBtn').addEventListener('click', function() {
        document.getElementById('formulario').style.display = 'none';
    });
</script>

<script>
  //conexión al controlador para guardar las citas y actualizar la interfaz gráfica.
    document.getElementById('mostrarFormularioBtn').addEventListener('click', function() {
        document.getElementById('formulario').style.display = 'block';
    });

    document.getElementById('agregarCitaForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional
        var formData = new FormData(this);
        fetch('../controllers/agendaController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('resultado').innerHTML = data;
            // Actualizar el calendario con la nueva cita
            calendar.refetchEvents();
            // Limpiar el formulario después de guardar la cita
            document.getElementById('agregarCitaForm').reset();
            // Ocultar el formulario
            document.getElementById('formulario').style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="eliminarCitaForm">
                    <div class="mb-3">
                        <label for="idCitaEliminar" class="form-label">ID de la Cita a Eliminar:</label>
                        <input type="text" class="form-control" id="idCitaEliminar" name="idCitaEliminar" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="confirmarEliminarBtn">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para eliminar la cita
    $("#confirmarEliminarBtn").click(function() {
        var idCita = $("#idCitaEliminar").val();

        // Realizar solicitud AJAX
        $.ajax({
            type: "POST",
            url: "../controllers/agendaController.php",
            data: { idCita: idCita },
            success: function(response) {
                alert(response);
                $("#eliminarModal").modal("hide");
            },
            error: function(xhr, status, error) {
                alert("Error al eliminar la cita: " + error);
            }
        });
    });
</script>

<div class="listadoCitas">
<div class="container mt-5">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" id="citasContainer" style="display: none;">
                    <button id="cerrarCitasBtn" class="btn btn-danger mb-3">Cerrar</button>
                    <div id="citas" class="list-group"></div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>

<script>
    document.getElementById('verCitasBtn').addEventListener('click', function() {
        // Realizar una petición al controlador para obtener las citas
        fetch('../controllers/agendaController.php')
            .then(response => response.json())
            .then(data => {
                // Mostrar el contenedor de citas
                document.getElementById('citasContainer').style.display = 'block';
                
                // Mostrar las citas en el div con id "citas"
                const citasDiv = document.getElementById('citas');
                citasDiv.innerHTML = '';
                data.forEach(cita => {
                    citasDiv.innerHTML += `<li class="list-group-item">Fecha: ${cita.start} - Motivo: ${cita.title}</li>`;
                });
            })
            .catch(error => console.error('Error al obtener las citas:', error));
    });

    document.getElementById('cerrarCitasBtn').addEventListener('click', function() {
        // Ocultar el contenedor de citas
        document.getElementById('citasContainer').style.display = 'none';
    });
</script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#eliminarCitaForm").submit(function(event) {
            event.preventDefault();
            var idCita = $("#idCita").val();
            $.ajax({
                type: "POST",
                url: "agendaController.php",
                data: { idCita: idCita },
                success: function(response) {
                    $("#mensaje").html('<div class="alert alert-success" role="alert">Cita eliminada correctamente</div>');
                    $("#idCita").val('');
                },
                error: function(xhr, status, error) {
                    $("#mensaje").html('<div class="alert alert-danger" role="alert">Error al eliminar la cita</div>');
                }
            });
        });
    });
</script>


<div class="calendar">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var date = new Date();
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear();

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        initialView: 'dayGridMonth',
        events: function(info, successCallback, failureCallback) {
            var eventosEstaticos = [
                {
                    title          : 'Consulta veterinaria',
                    start          : new Date(y, m, 1),
                    backgroundColor: '#f56954',
                    borderColor    : '#f56954',
                    allDay         : true
                },
                {
                    title          : 'Vacunación',
                    start          : new Date(y, m, d - 5),
                    end            : new Date(y, m, d - 2),
                    backgroundColor: '#f39c12',
                    borderColor    : '#f39c12'
                },
                {
                    title          : 'Operación',
                    start          : new Date(y, m, d - 5),
                    end            : new Date(y, m, d - 2),
                    backgroundColor: '#f56954',
                    borderColor    : '#f39c12'
                },
                {
                    title          : 'Control',
                    start          : new Date(y, m, d, 12, 0),
                    end            : new Date(y, m, d, 14, 0),
                    allDay         : false,
                    backgroundColor: '#00c0ef',
                    borderColor    : '#00c0ef'
                }
            ];

            $.ajax({
                url: '../controllers/agendaController.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var eventosTotales = eventosEstaticos.concat(response);
                    successCallback(eventosTotales);
                },
                error: function(xhr, status, error) {
                    failureCallback(error);
                }
            });
        }
    });
    calendar.render();
});
</script>

</head>
<body>
<div id='calendar'>
</div>
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
