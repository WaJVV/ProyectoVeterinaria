/*Funcion para limpieza de los formularios*/
function limpiarForms() {
    $('#cliente_add').trigger('reset');
    $('#cliente_update').trigger('reset');
}
  
/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarForm() {
    limpiarForms();
    $('#formulario_add').show();
    $('#formulario_update').hide();
}
  
/*Funcion para cargar el listado en el Datatable*/
function listarClientesTodos() {
    tabla = $('#tbllistado').dataTable({
        aProcessing: true, //activamos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del servidor
        dom: 'Bfrtip', //definimos los elementos del control de tabla
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdf'],
        ajax: {
            url: '../controllers/clienteController.php?op=listar_para_tabla',
            type: 'get',
            dataType: 'json',
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        },
    });
}

/*
Funcion Principal
*/
$(function () {
    $('#formulario_update').hide();
    listarClientesTodos();
});

/*
CRUD
*/
$('#cliente_add').on('submit', function (event) {
    event.preventDefault();
    $('#btnRegistar').prop('disabled', true);
    var formData = new FormData($('#cliente_add')[0]);
    $.ajax({
        url: '../controllers/clienteController.php?op=insertar',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case '1':
                    toastr.success(
                        'Cliente registrado'
                    );
                    $('#cliente_add')[0].reset();
                    tabla.api().ajax.reload();
                    break;

                case '2':
                    toastr.error(
                        'El correo ya existe... Corrija e inténtelo nuevamente...'
                    );
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

/*Funcion para activacion de clientes*/
function activar(id) {
    bootbox.confirm('¿Está seguro de activar el cliente?', function (result) {
        if (result) {
            $.post(
                '../controllers/clienteController.php?op=activar',
                { idCliente: id },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Cliente activado');
                            tabla.api().ajax.reload();
                            break;

                        case '0':
                            toastr.error(
                                'Error: El cliente no puede activarse. Consulte con el administrador...'
                            );
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

/*Funcion para desactivacion de clientes*/
function desactivar(id) {
    bootbox.confirm('¿Está seguro de desactivar el cliente?', function (result) {
        if (result) {
            $.post(
                '../controllers/clienteController.php?op=desactivar',
                { idCliente: id },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Cliente desactivado');
                            tabla.api().ajax.reload();
                            break;

                        case '0':
                            toastr.error(
                                'Error: El cliente no puede desactivarse. Consulte con el administrador...'
                            );
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

/*Habilitacion de formulario de modificación al presionar el botón en la tabla*/
$('#tbllistado tbody').on(
    'click',
    'button[id="modificarCliente"]',
    function () {
        var data = $('#tbllistado').DataTable().row($(this).parents('tr')).data();
        limpiarForms();
        $('#formulario_add').hide();
        $('#formulario_update').show();
        $('#EId').val(data[0]);
        $('#EIdentificacion').val(data[1]);
        $('#ENombre').val(data[2]);
        $('#EApellidoPaterno').val(data[3]);
        $('#EApellidoMaterno').val(data[4]);
        $('#ENacimientoCliente').val(data[5]);
        $('#EDireccion').val(data[6]);
        $('#ETelefonoCelular').val(data[7]);
        return false;
    }
);

/*Funcion para modificacion de datos de cliente*/
$('#cliente_update').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
        if (result) {
            var formData = new FormData($('#cliente_update')[0]);
            $.ajax({
                url: '../controllers/clienteController.php?op=editar',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    //alert(datos);
                    switch (datos) {
                        case '0':
                            toastr.error('Error: No se pudieron actualizar los datos');
                            break;
                        case '1':
                            toastr.success('Cliente actualizado exitosamente');
                            tabla.api().ajax.reload();
                            limpiarForms();
                            $('#formulario_update').hide();
                            $('#formulario_add').show();
                            break;
                        case '2':
                            toastr.error('Error: La identificación no pertenece al cliente.');
                            break;
                    }
                },
            });
        }
    });
});
