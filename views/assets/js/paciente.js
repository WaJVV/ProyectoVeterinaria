/* Función para limpiar los formularios */
function limpiarForms() {
    $('#paciente_add').trigger('reset'); // Cambiado de "#usuario_add" a "#paciente_add"
    $('#paciente_update').trigger('reset'); // Cambiado de "#usuario_update" a "#paciente_update"
    $('#paciente_add').trigger('reset'); // Agregado para limpiar el formulario de proveedores

}


/* Función para cargar el listado en el Datatable */
function listarPacientesTodos() { 
    tabla = $('#tbllistado').dataTable({
        "processing": true, // Activamos el procesamiento de datatables
        "serverSide": true, // Paginación y filtrado del lado del servidor
        "dom": 'Bfrtip', // Definimos los elementos del control de tabla
        "buttons": ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        "ajax": {
            "url": '../controllers/pacientesControllers.php?op=listar_para_tabla', 
            "type": 'GET',
            "dataType": 'json',
            "error": function(e) {
                console.log(e.responseText);
            }
        },
        "destroy": true,
        "iDisplayLength": 5,
    });
}


/*
Funcion Principal
*/
$(function() {
    $('#formulario_update').hide();
    listarPacientesTodos();
});

/* Función para agregar un nuevo paciente */
$('#paciente_add').on('submit', function(event) {
    event.preventDefault();
    $('#btnRegistrar').prop('disabled', true);
    var formData = new FormData($('#paciente_add')[0]);
    $.ajax({
        url: '../controllers/pacientesControllers.php?op=insertar', // Cambiado de "usuarioController.php" a "pacientesController.php"
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos) {
            switch (datos) {
                case '1':
                    toastr.success('Paciente registrado');
                    $('#paciente_add')[0].reset();
                    tabla.api().ajax.reload();
                    break;

                case '2':
                    toastr.error('El correo ya existe... Corrija e inténtelo nuevamente...');
                    break;

                case '3':
                    toastr.error('Hubo un error al tratar de ingresar los datos.');
                    break;

                default:
                    toastr.error(datos);
                    break;
            }
            $('#btnRegistrar').removeAttr('disabled');
        },
    });
});


/* Función para activar pacientes 
function activar(id) {
    bootbox.confirm('¿Está seguro de activar el paciente?', function(result) {
        if (result) {
            $.post(
                '../controllers/pacientesControllers.php?op=activar', { idPaciente: id }, // Cambiado de "usuarioController.php" a "pacientesController.php" y "idUser" a "idPaciente"
                function(data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Paciente activado');
                            tabla.api().ajax.reload();
                            break;

                        case '0':
                            toastr.error('Error: El paciente no puede activarse. Consulte con el administrador...');
                            break;

                        default:
                            toastr.error(data);
                            break;
                    }
                }
            );
        }
    });
}

Función para desactivar pacientes 
function desactivar(id) {
    bootbox.confirm('¿Está seguro de desactivar el paciente?', function(result) {
        if (result) {
            $.post(
                '../controllers/pacientesControllers.php?op=desactivar', { idPaciente: id }, // Cambiado de "usuarioController.php" a "pacientesController.php" y "idUser" a "idPaciente"
                function(data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Paciente desactivado');
                            tabla.api().ajax.reload();
                            break;

                        case '0':
                            toastr.error('Error: El paciente no puede desactivarse. Consulte con el administrador...');
                            break;

                        default:
                            toastr.error(data);
                            break;
                    }
                }
            );
        }
    });
}
*/

/* Habilitación de formulario de modificación al presionar el botón en la tabla */
/* Habilitación de formulario de modificación al presionar el botón en la tabla */
$('#tbllistado tbody').on('click', 'button[id="modificarPaciente"]', function () {
    var data = $('#tbllistado').DataTable().row($(this).parents('tr')).data();
    limpiarForms();
    $('#EIdMascota').val(data[0]);
    $('#Enombre').val(data[1]);
    $('#Eraza').val(data[2]);
    $('#Epeso').val(data[3]);
    $('#EnacimientoMascota').val(data[4]);
    $('#EidCliente').val(data[5]);
    $('#formulario_add').hide();
    $('#formulario_update').show();
    return false;
});



/*Funcion para modificacion de datos de paciente*/
$('#paciente_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#paciente_update')[0]);
            $.ajax({
                url: '../controllers/pacientesControllers.php?op=editar',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    switch (datos) {
                        case '0':
                            toastr.error('Error: No se pudieron actualizar los datos del paciente');
                            break;
                        case '1':
                            toastr.success('Datos del paciente actualizados exitosamente');
                            tabla.api().ajax.reload();
                            limpiarForms();
                            $('#formulario_update').hide();
                            $('#formulario_add').show();
                            break;
                        case '2':
                            toastr.error('Error: El correo no pertenece al paciente.');
                            break;
                    }
                },
            });
        }
    });
});
