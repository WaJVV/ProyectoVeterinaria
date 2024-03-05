<?php
require_once '../models/Usuario.php';

switch ($_GET["op"]) {
    case 'listar_para_tabla':
        $user_login = new Usuario();
        $usuarios = $user_login->listarTodosDb();
        $data = array();
        foreach ($usuarios as $reg) {
            $data[] = array(
                "0" => $reg->getId(),
                "1" => $reg->getRaza(),
                "2" => $reg->getNombre(),
                "3" => $reg->getPeso(),
                "4" => $reg->getNacimiento(),
                "5" => ""
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
        $id = isset($_POST["id"]) ? trim($_POST["id"]) : "";
        $raza = isset($_POST["raza"]) ? trim($_POST["raza"]) : "";
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $peso = isset($_POST["peso"]) ? trim($_POST["peso"]) : "";
        $nacimiento = isset($_POST["nacimiento"]) ? trim($_POST["nacimiento"]) : "";

        // Crear el objeto Usuario y establecer los valores
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setRaza($raza);
        $usuario->setNombre($nombre);
        $usuario->setPeso($peso);
        $usuario->setNacimiento($nacimiento);

        // Llamar al método para guardar en la base de datos
        $usuario->guardarEnDb();
                      if($usuario->verificarExistenciaDb()){
                          //if(enviarCorreo($email,$clave,$nombre)){
                              echo 1; //usuario registrado y envio de correo exitos
                          //}else{
                            //  echo 4; //usuario registrado y envio de correo fallido
                          //}
                      }else{
                          echo 3; //Fallo al realizar el registro
                      }
                      break;
                  } 
                    

      
        
        
        ?>
        