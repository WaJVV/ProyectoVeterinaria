function limpiarForms() {
    $('#productoInventario_add').trigger('reset');
    $('#productoInventario_update').trigger('reset');
    $('#productoInventario_add').trigger('reset'); // Agregado para limpiar el formulario de proveedores

}

  function listarProductosInventarioTodos() {
    tabla = $('#tbllistado').dataTable({
        "processing": true, // Activamos el procesamiento de datatables
        "serverSide": true, // Paginación y filtrado del lado del servidor
        "dom": 'Bfrtip', // Definimos los elementos del control de tabla
        "buttons": ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        "ajax": {
            "url": '../controllers/productoInventarioController.php?op=listar_para_tabla', 
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

  $(function () {
    $('#formulario_update').hide();
    listarProductosInventarioTodos();
  });

/*CRUD*/
  $('#productoInventario_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistar').prop('disabled', true);
    var formData = new FormData($('#productoInventario_add')[0]);
    $.ajax({
      url: '../controllers/productoInventarioController.php?op=insertar',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success('Producto registrado');
            $('#productoInventario_add')[0].reset();
            tabla.api().ajax.reload();
            break;
  
          case '2':
            toastr.error('El producto ya existe. Corrija e inténtelo nuevamente.');
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


  $('#tbllistado tbody').on(
    'click',
    'button[id="modificarProducto"]',
    function () {
        var data = $('#tbllistado').DataTable().row($(this).parents('tr')).data();
        limpiarForms();
        $('#EIdProducto').val(data[0]); // Cambiar el índice si es diferente
        $('#Enombre').val(data[1]); // Cambiar el índice si es diferente
        $('#Edescripcion').val(data[2]); // Cambiar el índice si es diferente
        $('#EstockProducto').val(data[3]); // Cambiar el índice si es diferente
        $('#EidProveedor').val(data[4]); // Cambiar el índice si es diferente
        $('#EPrecio').val(data[5]); // Cambiar el índice si es diferente

        $('#formulario_add').hide();
        $('#formulario_update').show();
        return false;
    }
);

/* Funcion para modificacion de datos de proveedor */
$('#productoInventario_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#productoInventario_update')[0]);
            $.ajax({
                url: '../controllers/productoInventarioController.php?op=editar',
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
                            toastr.success('Producto actualizado exitosamente');
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
