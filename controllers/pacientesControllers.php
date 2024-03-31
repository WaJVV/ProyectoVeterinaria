<?php
require_once '../models/Paciente.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $paciente = new Paciente();
        $pacientes = $paciente->listarTodosDb();
        $data = array();
        foreach ($pacientes as $reg) {
            $data[] = array(
                "0" => $reg->getIdMascota(),
                "1" => $reg->getNombre(),
                "2" => $reg->getRaza(),
                "3" => $reg->getPeso(),
                "4" => $reg->getNacimientoMascota(),
                "5" => $reg->getIdCliente(),
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
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $raza = isset($_POST["raza"]) ? trim($_POST["raza"]) : "";
        $peso = isset($_POST["peso"]) ? trim($_POST["peso"]) : "";
        $nacimientoMascota = isset($_POST["nacimientoMascota"]) ? trim($_POST["nacimientoMascota"]) : "";
        $idCliente = isset($_POST["idCliente"]) ? trim($_POST["idCliente"]) : "";
        
        $paciente = new Paciente();
        $paciente->setNombre($nombre);
        $paciente->setRaza($raza);
        $paciente->setPeso($peso);
        $paciente->setNacimientoMascota($nacimientoMascota);
        $paciente->setIdCliente($idCliente);
        
        $paciente->guardarEnDb();
        if ($paciente->verificarExistenciaDb()) {
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
