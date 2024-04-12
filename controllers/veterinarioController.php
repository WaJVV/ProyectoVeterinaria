<?php
require_once '../models/Veterinario.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $veterinario = new Veterinario();
<<<<<<< HEAD
        $veterinarios = $veterinario->listarTodosDb();
        $data = array();
        foreach ($veterinarios as $reg) {
=======
        $veterinario = $veterinario->listarTodosDb();
        $data = array();
        foreach ($veterinario as $reg) {
>>>>>>> main
            $data[] = array(
                "0" => $reg->getIdVeterinario(),
                "1" => $reg->getNombreVeterinario(),
                "2" => $reg->getApellidoPaterno(),
<<<<<<< HEAD
                "3" => $reg->getCodigoVeterinario()
=======
                "3" => $reg->getCodigoVeterinario(),
                "4" => ""

>>>>>>> main
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
<<<<<<< HEAD
        $nombreVeterinario = isset($_POST["nombreVeterinario"]) ? trim($_POST["nombreVeterinario"]) : "";
        $apellidoPaterno = isset($_POST["apellidoPaterno"]) ? trim($_POST["apellidoPaterno"]) : "";
        $codigoVeterinario = isset($_POST["codigoVeterinario"]) ? trim($_POST["codigoVeterinario"]) : "";
=======
        $nombreVeterinario = isset($_POST["nombre_veterinario"]) ? trim($_POST["nombre_veterinario"]) : "";
        $apellidoPaterno = isset($_POST["apellido_paterno"]) ? trim($_POST["apellido_paterno"]) : "";
        $codigoVeterinario = isset($_POST["codigo_veterinario"]) ? trim($_POST["codigo_veterinario"]) : "";
>>>>>>> main

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
<<<<<<< HEAD
=======
        
>>>>>>> main
}
?>
