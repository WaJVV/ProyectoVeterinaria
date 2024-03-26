<?php
require_once'../models/ClienteModelGrafica.php';
if (isset($_GET["op"])) {
    $operacion = $_GET["op"];

    // Dependiendo de la operación, ejecutar el método correspondiente de la clase Cliente
    switch ($operacion) {
        case 'contar_clientes_por_ubicacion':
            // Crear una instancia de la clase Cliente
            $cliente = new Cliente();
            // Llamar al método contarClientesPorUbicacion para obtener la cantidad de clientes por ubicación
            $resultado = $cliente->contarClientesPorUbicacion();
            // Devolver el resultado como JSON
            echo json_encode($resultado);
            break;
        
        default:
            // Operación no válida
            echo json_encode(array("mensaje" => "Operación no válida"));
            break;
    }
} else {
    // No se especificó ninguna operación
    echo json_encode(array("mensaje" => "No se especificó ninguna operación"));
}
?>