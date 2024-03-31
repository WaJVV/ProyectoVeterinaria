<?php
require_once '../models/Veterinario.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $veterinario = new Veterinario();
        $veterinarios = $veterinario->listarTodosDb();
        $data = array();
        foreach ($veterinarios as $reg) {
            $data[] = array(
                "0" => $reg->getIdVeterinario(),
                "1" => $reg->getNombreVeterinario(),
                "2" => $reg->getApellidoPaterno(),
                "3" => $reg->getCodigoVeterinario(),
                "4" => ""

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
        $idVeterinario = isset($_POST["idVeterinario"]) ? trim($_POST["idVeterinario"]) : "";
        $nombreVeterinario = isset($_POST["nombreVeterinario"]) ? trim($_POST["nombreVeterinario"]) : "";
        $apellidoPaterno = isset($_POST["apellidoPaterno"]) ? trim($_POST["apellidoPaterno"]) : "";
        $codigoVeterinario = isset($_POST["codigoVeterinario"]) ? trim($_POST["codigoVeterinario"]) : "";

        // Crear el objeto Veterinario y establecer los valores
        $veterinario = new Veterinario();
        $veterinario->setIdVeterinario($idVeterinario);
        $veterinario->setNombreVeterinario($nombreVeterinario);
        $veterinario->setApellidoPaterno($apellidoPaterno);
        $veterinario->setCodigoVeterinario($codigoVeterinario);

        // Llamar al método para guardar en la base de datos
        $veterinario->guardarEnDb();
        if ($veterinario->verificarExistenciaDb()) {
            //if(enviarCorreo($email,$clave,$nombre)){
            echo 1; // Registro de veterinario exitoso
            //} else {
            //  echo 4; // Registro de veterinario exitoso pero falló al enviar el correo electrónico
            //}
        } else {
            echo 3; // Fallo al realizar el registro del veterinario
        }
        break;
        
}
?>
