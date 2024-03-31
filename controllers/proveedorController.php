<?php
require_once '../models/Proveedor.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $proveedor = new Proveedor();
        $proveedores = $proveedor->listarTodosDb();
        $data = array();
        foreach ($proveedores as $reg) {
            $data[] = array(
                "0" => $reg->getIdProveedor(),
                "1" => $reg->getNombre(),
                "2" => $reg->getDireccionProveedor(),
                "3" => $reg->getTelefonoCelularProveedor(),
                "4" => ""

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
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $direccionProveedor = isset($_POST["direccionProveedor"]) ? trim($_POST["direccionProveedor"]) : "";
        $telefonoCelularProveedor = isset($_POST["telefonoCelularProveedor"]) ? trim($_POST["telefonoCelularProveedor"]) : "";

        // Crear el objeto Proveedor y establecer los valores
        $proveedor = new Proveedor();
        $proveedor->setNombre($nombre);
        $proveedor->setDireccionProveedor($direccionProveedor);
        $proveedor->setTelefonoCelularProveedor($telefonoCelularProveedor);

        // Llamar al método para guardar en la base de datos
        $proveedor->guardarEnDb();
        if ($proveedor->verificarExistenciaDb()) {
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
