<?php
<<<<<<< HEAD
// Ensure to use the correct path to Cliente.php file
=======
// uso ocrrecto de Cliente.php file
>>>>>>> main
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
<<<<<<< HEAD
                "7" => $reg->getTelefonoCelular()
=======
                "7" => $reg->getTelefonoCelular(),
                "8" => ""

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
        $identificacion = isset($_POST["identificacion"]) ? trim($_POST["identificacion"]) : "";
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellidoPaterno = isset($_POST["apellidoPaterno"]) ? trim($_POST["apellidoPaterno"]) : "";
        $apellidoMaterno = isset($_POST["apellidoMaterno"]) ? trim($_POST["apellidoMaterno"]) : "";
<<<<<<< HEAD
        $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]) : "";
        $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : "";
        $telefonoCelular = isset($_POST["telefonoCelular"]) ? trim($_POST["telefonoCelular"]) : "";

        // Create an instance of the Cliente class
=======
        $nacimientoCliente = isset($_POST["nacimientoCliente"]) ? trim($_POST["nacimientoCliente"]) : "";
        $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : "";
        $telefonoCelular = isset($_POST["telefonoCelular"]) ? trim($_POST["telefonoCelular"]) : "";

>>>>>>> main
        $cliente = new Cliente();
        $cliente->setIdentificacion($identificacion);
        $cliente->setNombre($nombre);
        $cliente->setApellidoPaterno($apellidoPaterno);
        $cliente->setApellidoMaterno($apellidoMaterno);
<<<<<<< HEAD
        $cliente->setNacimientoCliente($nacimiento);
        $cliente->setDireccion($direccion);
        $cliente->setTelefonoCelular($telefonoCelular);

        // Call the method to save into the database
        $cliente->guardarEnDb();
        if ($cliente->verificarExistenciaDb()) {
            //if(enviarCorreo($email,$clave,$nombre)){
            echo 1; // Successful user registration
            //} else {
            //  echo 4; // User registered but failed to send email
            //}
        } else {
            echo 3; // Registration failed
=======
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
>>>>>>> main
        }
        break;
}
?>
