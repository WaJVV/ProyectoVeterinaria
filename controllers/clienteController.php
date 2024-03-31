<?php
// uso ocrrecto de Cliente.php file
require_once '../models/Cliente.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $cliente = new Cliente();
        $clientes = $cliente->listarTodosDb();
        $data = array();
        foreach ($clientes as $reg) {
            $data[] = array(
                "0" => $reg->getIdCliente(),
                "1" => $reg->getIdentificacion(),
                "2" => $reg->getNombre(),
                "3" => $reg->getApellidoPaterno(),
                "4" => $reg->getApellidoMaterno(),
                "5" => $reg->getNacimientoCliente(),
                "6" => $reg->getDireccion(),
                "7" => $reg->getTelefonoCelular(),
                "8" => ""

            );
        }
        $resultados = array(
            "sEcho" => 1, ##informacion para datatables
            "iTotalRecords" => count($data), ## total de registros al datatable
            "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;

    case 'insertar':
        $identificacion = isset($_POST["identificacion"]) ? trim($_POST["identificacion"]) : "";
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellidoPaterno = isset($_POST["apellidoPaterno"]) ? trim($_POST["apellidoPaterno"]) : "";
        $apellidoMaterno = isset($_POST["apellidoMaterno"]) ? trim($_POST["apellidoMaterno"]) : "";
        $nacimientoCliente = isset($_POST["nacimientoCliente"]) ? trim($_POST["nacimientoCliente"]) : "";
        $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : "";
        $telefonoCelular = isset($_POST["telefonoCelular"]) ? trim($_POST["telefonoCelular"]) : "";

        $cliente = new Cliente();
        $cliente->setIdentificacion($identificacion);
        $cliente->setNombre($nombre);
        $cliente->setApellidoPaterno($apellidoPaterno);
        $cliente->setApellidoMaterno($apellidoMaterno);
        $cliente->setNacimientoCliente($nacimientoCliente);
        $cliente->setDireccion($direccion);
        $cliente->setTelefonoCelular($telefonoCelular);

        $cliente->guardarEnDb();
        if ($cliente->verificarExistenciaDb()) {
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
