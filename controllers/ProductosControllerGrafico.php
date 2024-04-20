<?php
require_once '../models/ProductosModelGrafico.php';


if (isset($_GET["op"])) {
    $operacion = $_GET["op"];

   
    switch ($operacion) {
        case 'obtenerProductos':
          
            $producto = new Producto();
            
            $resultado = $producto->obtenerProductos();
            
            echo json_encode($resultado);
            break;

        case 'obtenerStockDeProductos':
            
            $producto = new Producto();
            
            $resultado = $producto->obtenerStockDeProductos();
            
            echo json_encode($resultado);
            break;

        default:
            
            echo json_encode(array("mensaje" => "Operación no válida"));
            break;
    }
} else {
    
    echo json_encode(array("mensaje" => "No se especificó ninguna operación"));
}
?>
