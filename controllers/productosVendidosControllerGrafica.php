<?php
require_once '../models/ProductosVendidosModelGrafica.php';

if (isset($_GET["op"])) {
    $operacion = $_GET["op"];

    switch ($operacion) {
        case 'obtener_fechas':
            // Crear una instancia de la clase Venta
            $venta = new Venta();
            // Llamar al método obtenerFechas para recuperar todas las fechas de compra
            $resultado = $venta->obtenerFechas();
            // Devolver el resultado como JSON
            echo $resultado;
            break;

        case 'contar_ventas_por_fecha':
            // Verificar si se proporcionó una fecha
            if (isset($_GET["fecha"])) {
                $fecha = $_GET["fecha"];
                // Crear una instancia de la clase Venta
                $venta = new Venta();
                // Llamar al método contarVentasPorFecha para obtener la cantidad de ventas para la fecha dada
                $resultado = $venta->contarVentasPorFecha($fecha);
                // Devolver el resultado como JSON
                echo $resultado;
            } else {
                // No se proporcionó una fecha
                echo json_encode(array("error" => "No se especificó la fecha"));
            }
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
