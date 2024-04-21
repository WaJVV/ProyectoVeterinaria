<?php

require_once '../models/VentasModel.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $venta = new Venta();
        $ventas = $venta->listarTodosDb();
        $data = array();
        foreach ($productos as $reg) {
            $data[] = array(
                "0" => $reg->getIdProducto(),
                "1" => $reg->getIdProveedor(),
                "2" => $reg->getFecha(),
                "3" => $reg->getCantidad(),
                "4" => $reg->getTotal(),
                "5" => $reg->getIdVenta(),
                "6" => ""
            );
        }
        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;

    case 'insertar':
        $idProveedor = isset($_POST["idProveedor"]) ? trim($_POST["idProveedor"]) : "";
        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : "";
        $cantidad = isset($_POST["cantidad"]) ? trim($_POST["cantidad"]) : "";
        $total = isset($_POST["total"]) ? trim($_POST["total"]) : "";
        $idVenta = isset($_POST["idVenta"]) ? trim($_POST["idVenta"]) : "";

        $venta = new venta();
        $venta->setIdProveedor($idProveedor);
        $venta->setFecha($fecha);
        $venta->setCantidad($cantidad);
        $venta->setTotal($total);
        $venta->setIdVenta($idVenta);

        $venta->guardarEnDb();
        if ($venta->verificarExistenciaDb()) {
            //if(enviarCorreo($email,$clave,$nombre)){
            echo 1;
            //} else {
            //  echo 4; // 
            //}
        } else {
            echo 3; // 
        }
        break;
}
?>