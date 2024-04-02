<?php
require_once '../models/Veterinario.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $veterinario = new Veterinario();
        $veterinario = $veterinario->listarTodosDb();
        $data = array();
        foreach ($veterinario as $reg) {
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
        $nombreVeterinario = isset($_POST["nombre_veterinario"]) ? trim($_POST["nombre_veterinario"]) : "";
        $apellidoPaterno = isset($_POST["apellido_paterno"]) ? trim($_POST["apellido_paterno"]) : "";
        $codigoVeterinario = isset($_POST["codigo_veterinario"]) ? trim($_POST["codigo_veterinario"]) : "";

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
