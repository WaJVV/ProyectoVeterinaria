<?php
require_once '../models/ProductoInventario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];
    $productoInventario = new ProductoInventario();
    $resultado = $productoInventario->restarStock($idProducto);
    echo $resultado;
} else {
    echo "Error: ID de producto no proporcionado o método de solicitud incorrecto.";
}
?>

