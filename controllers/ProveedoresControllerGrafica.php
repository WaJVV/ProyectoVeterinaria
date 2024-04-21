<?php
require_once '../models/ProveedoresModelGrafico.php';



if (isset($_GET["op"])) {
    $operacion = $_GET["op"];

    switch ($operacion) {
        
        case 'contarProveedoresPorUbicacion':
            $proveedor = new Proveedor();
            $resultado = $proveedor->contarProveedoresPorUbicacion();
            echo json_encode($resultado);
            break;

        case 'obtenerTodasLasDireccionesDeProveedores':
            $proveedor = new Proveedor();
            $resultado = $proveedor->obtenerTodasLasDireccionesDeProveedores();
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