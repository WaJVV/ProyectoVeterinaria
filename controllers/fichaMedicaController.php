<?php
require_once '../models/fichaMedica.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $fichaMedica = new fichaMedica();
        $fichasMedicas = $fichaMedica->listarTodosDb();
        $data = array();
        foreach ($fichasMedicas as $reg) {
            $data[] = array(
                "0" => $reg->getIdFichaMedica(),
                "1" => $reg->getIdMascota(),
                "2" => $reg->getFecha_cita(),
                "3" => $reg->getIdVeterinario(),
                "4" => $reg->getPeso(),
                "5" => $reg->getTemperatura(),
                "6" => $reg->getMotivo(),
                "7" => $reg->getDiagnostico(),
                "8" => $reg->getTratamiento(),
                "9" => ""

            );
        }
        $resultados = array(
            "sEcho" => 1, // Información para DataTables
            "iTotalRecords" => count($data), // Total de registros al DataTables
            "iTotalDisplayRecords" => count($data), // Enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;

    case 'insertar':
        $idMascota = isset($_POST["idMascota"]) ? trim($_POST["idMascota"]) : "";
        $fecha_cita = isset($_POST["fecha_cita"]) ? trim($_POST["fecha_cita"]) : "";
        $idVeterinario = isset($_POST["idVeterinario"]) ? trim($_POST["idVeterinario"]) : "";
        $peso = isset($_POST["peso"]) ? trim($_POST["peso"]) : "";
        $temperatura = isset($_POST["temperatura"]) ? trim($_POST["temperatura"]) : "";
        $motivo = isset($_POST["motivo"]) ? trim($_POST["motivo"]) : "";
        $diagnostico = isset($_POST["diagnostico"]) ? trim($_POST["diagnostico"]) : "";
        $tratamiento = isset($_POST["tratamiento"]) ? trim($_POST["tratamiento"]) : "";

        // Crear el objeto Proveedor y establecer los valores
        $fichaMedica = new fichaMedica();
        $fichaMedica->setIdMascota($idMascota);
        $fichaMedica->setFecha_cita($fecha_cita);
        $fichaMedica->setIdVeterinario($idVeterinario);
        $fichaMedica->setPeso($peso);
        $fichaMedica->setTemperatura($temperatura);
        $fichaMedica->setMotivo($motivo);
        $fichaMedica->setDiagnostico($diagnostico);
        $fichaMedica->setTratamiento($tratamiento);

        // Llamar al método para guardar en la base de datos
        $fichaMedica->guardarEnDb();
        if ($fichaMedica->verificarExistenciaDb()) {
            //if(enviarCorreo($email,$clave,$nombre)){
            echo 1; // Registro de proveedor exitoso
            //} else {
            //  echo 4; // Registro de proveedor exitoso pero falló al enviar el correo electrónico
            //}
        } else {
            echo 3; // Fallo al realizar el registro del proveedor
        }
        break;
        
}
?>
