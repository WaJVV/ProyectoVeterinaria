<?php
require_once '../models/Paciente.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $paciente = new Paciente();
        $pacientes = $paciente->listarTodosDb();
        $data = array();
        foreach ($pacientes as $reg) {
            $data[] = array(
<<<<<<< HEAD
                "idMascota" => $reg->getIdMascota(),
                "nombre" => $reg->getNombre(),
                "raza" => $reg->getRaza(),
                "peso" => $reg->getPeso(),
                "nacimientoMascota" => $reg->getNacimientoMascota(),
                "idCliente" => $reg->getIdCliente(),
                "acciones" => '<button class="btn btn-warning" id="modificarPaciente">Modificar</button> ' .
                        '<button class="btn btn-danger" onclick="desactivar(\'' . $reg->getIdMascota() . '\')">Desactivar</button>',
            );
=======
                "0" => $reg->getIdMascota(),
                "1" => $reg->getNombre(),
                "2" => $reg->getRaza(),
                "3" => $reg->getPeso(),
                "4" => $reg->getNacimientoMascota(),
                "5" => $reg->getIdCliente(),
                "6" => ""

                );
>>>>>>> main
        }
        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;
<<<<<<< HEAD
=======

>>>>>>> main
    case 'insertar':
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $raza = isset($_POST["raza"]) ? trim($_POST["raza"]) : "";
        $peso = isset($_POST["peso"]) ? trim($_POST["peso"]) : "";
<<<<<<< HEAD
        $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]) : "";
=======
        $nacimientoMascota = isset($_POST["nacimientoMascota"]) ? trim($_POST["nacimientoMascota"]) : "";
>>>>>>> main
        $idCliente = isset($_POST["idCliente"]) ? trim($_POST["idCliente"]) : "";
        
        $paciente = new Paciente();
        $paciente->setNombre($nombre);
        $paciente->setRaza($raza);
        $paciente->setPeso($peso);
<<<<<<< HEAD
        $paciente->setNacimientoMascota($nacimiento);
        $paciente->setIdCliente($idCliente);
        
        $paciente->guardarEnDb();
        break;
    case 'existePaciente':
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $paciente = new Paciente();
        $paciente->setNombre($nombre);
        $encontrado = $paciente->verificarExistenciaDb();
        if ($encontrado != null) {
            echo 1;
        } else {
            echo 0;
        }
        break;
    case 'activar':
        $idMascota = isset($_POST['idMascota']) ? trim($_POST['idMascota']) : "";
        $paciente = new Paciente();
        $paciente->setIdMascota($idMascota);
        $rspta = $paciente->activar();
        echo $rspta;
        break;
    case 'desactivar':
        $idMascota = isset($_POST['idMascota']) ? trim($_POST['idMascota']) : "";
        $paciente = new Paciente();
        $paciente->setIdMascota($idMascota);
        $rspta = $paciente->desactivar();
        echo $rspta;
        break;
    case 'mostrar':
        $idMascota = isset($_POST["idMascota"]) ? trim($_POST["idMascota"]) : "";
        $paciente = new Paciente();
        $paciente->setIdMascota($idMascota);
        $encontrado = $paciente->mostrar();
        if ($encontrado != null) {
            echo json_encode($encontrado);
        } else {
            echo 0;
        }
        break;
    case 'editar':
        $idMascota = isset($_POST["idMascota"]) ? trim($_POST["idMascota"]) : "";
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $raza = isset($_POST["raza"]) ? trim($_POST["raza"]) : "";
        $peso = isset($_POST["peso"]) ? trim($_POST["peso"]) : "";
        $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]) : "";
        $idCliente = isset($_POST["idCliente"]) ? trim($_POST["idCliente"]) : "";
        
        $paciente = new Paciente();
        $paciente->setIdMascota($idMascota);
        $paciente->setNombre($nombre);
        $paciente->setRaza($raza);
        $paciente->setPeso($peso);
        $paciente->setNacimientoMascota($nacimiento);
        $paciente->setIdCliente($idCliente);
        $modificados = $paciente->actualizarPaciente();
        if ($modificados > 0) {
            echo 1;
        } else {
            echo 0;
=======
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
>>>>>>> main
        }
        break;
}
?>
