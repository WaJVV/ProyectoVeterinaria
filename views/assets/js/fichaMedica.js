function limpiarForms() {
  $('#fichaMedica_add').trigger('reset');
  $('#fichaMedica_update').trigger('reset');
  $('#fichaMedica_add').trigger('reset'); // Agregado para limpiar el formulario de proveedores
}

function listarFichaMedicaTodos() {
  tabla = $('#tbllistado').DataTable({
    aProcessing: true, //activamos el procesamiento de datatables
    aServerSide: true, //paginación y filtrado del lado del servidor
    dom: 'Bfrtip', //definimos los elementos del control de tabla
    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
    ajax: {
      url: '../controllers/fichaMedicaController.php?op=listar_para_tabla',
      type: 'get',
      dataType: 'json',
      error: function (e) {
        console.log(e.responseText);
      },
      destroy: true, // Destruir tabla existente antes de inicializar
      iDisplayLength: 5,
    },
  });
}

/*
Funcion Principal
*/
$(function () {
  $('#formulario_update').hide();
  listarFichaMedicaTodos();
});

/*
CRUD
*/
$('#fichaMedica_add').on('submit', function (event) {
  event.preventDefault();
  $('#btnRegistar').prop('disabled', true);
  var formData = new FormData($('#fichaMedica_add')[0]);
  $.ajax({
    url: '../controllers/fichaMedicaController.php?op=insertar',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      switch (datos) {
        case '1':
          toastr.success('fichaMedica registrado');
          $('#fichaMedica_add')[0].reset();
          tabla.api().ajax.reload(function(){
            $('#fichaMedica_add')[0].reset();
          });
          break;

        case '2':
          toastr.error('La ficha Medica ya existe... Corrija e inténtelo nuevamente...');
          break;

        case '3':
          toastr.error('Hubo un error al tratar de ingresar los datos.');
          break;

        default:
          toastr.error(datos);
          break;
      }
      $('#btnRegistar').removeAttr('disabled');
    },
  });
});

/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$('#tbllistado tbody').on(
  'click',
  'button[id="modificarFichaMedica"]',
  function () {
    var data = $('#tbllistado').DataTable().row($(this).parents('tr')).data();
    limpiarForms();
    $('#formulario_add').hide();
    $('#formulario_update').show();
    $('#EId').val(data[0]);
    $('#EidMedica').val(data[1]);
    $('#EidMascota').val(data[2]);
    $('#Efecha_cita').val(data[3]);
    $('#EidVeterinario').val(data[4]);
    $('#Epeso').val(data[5]);
    $('#Etemperatura').val(data[6]);
    $('#Emotivo').val(data[7]);
    $('#Ediagnostico').val(data[8]);
    $('#Etratamiento').val(data[9]);

    return false;
  }
);

/* Funcion para modificacion de datos de veterinario */
$('#veterinario_update').on('submit', function (event) {
  event.preventDefault();
  bootbox.confirm('¿Desea modificar los datos?', function (result) {
    if (result) {
      var formData = new FormData($('#fichaMedica_update')[0]);
      $.ajax({
        url: '../controllers/fichaMedicaController.php?op=editar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          switch (datos) {
            case '0':
              toastr.error('Error: No se pudieron actualizar los datos');
              break;
            case '1':
              toastr.success('Veterinario actualizado exitosamente');
              tabla.api().ajax.reload();
              limpiarForms();
              $('#formulario_update').hide();
              $('#formulario_add').show();
              break;
            case '2':
              toastr.error('Error: Ocurrió un problema durante la actualización');
              break;
          }
        },
      });
    }
  });
});
