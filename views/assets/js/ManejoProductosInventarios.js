$(document).ready(function() {
    $(".btn.btn-success").click(function() {
        var productoId = $(this).data("producto-id");
        restarStock(productoId);
    });
});

function restarStock(productoId) {
    $.ajax({
        type: "POST",
        url: "../controllers/ManejoInventarioProductoController.php",
        data: { idProducto: productoId },
        success: function(response) {
            alert(response); // Aquí se muestra la respuesta del servidor
        },
        error: function(xhr, status, error) {
            console.error(error); // Manejar errores de la solicitud
        }
    });
}