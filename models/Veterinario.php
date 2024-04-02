<?php
require_once '../config/Conexion.php';

class Veterinario extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idVeterinario = null;
    private $nombre_veterinario = null;
    private $apellido_paterno = null;
    private $codigo_veterinario = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Constructores de la Clase         =
    =============================================*/
    public function __construct(){}
    /*=====  End of Constructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdVeterinario()
    {
        return $this->idVeterinario;
    }
    public function setIdVeterinario($idVeterinario)
    {
        $this->idVeterinario = $idVeterinario;
    }
    public function getNombreVeterinario()
    {
        return $this->nombre_veterinario;
    }
    public function setNombreVeterinario($nombre_veterinario)
    {
        $this->nombre_veterinario = $nombre_veterinario;
    }
    public function getApellidoPaterno()
    {
        return $this->apellido_paterno;
    }
    public function setApellidoPaterno($apellido_paterno)
    {
        $this->apellido_paterno = $apellido_paterno;
    }
    public function getCodigoVeterinario()
    {
        return $this->codigo_veterinario;
    }
    public function setCodigoVeterinario($codigo_veterinario)
    {
        $this->codigo_veterinario = $codigo_veterinario;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    
    public function listarTodosDb(){
    $query = "SELECT * FROM Veterinario";
    $arr = array();
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $usuario = new Veterinario();
            // Agregar los nuevos atributos de veterinario
            $usuario->setIdVeterinario($encontrado['idVeterinario']);
            $usuario->setNombreVeterinario($encontrado['nombre_veterinario']);
            $usuario->setApellidoPaterno($encontrado['apellido_paterno']);
            $usuario->setCodigoVeterinario($encontrado['codigo_veterinario']);
            $arr[] = $usuario;
        }
        return $arr;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
        return json_encode($error);
    }
}

public function verificarExistenciaDb(){
    $query = "SELECT * FROM Veterinario WHERE codigo_veterinario=:codigo_veterinario";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		
        $raza = $this->getCodigoVeterinario();	
        $resultado->bindParam(":codigo_veterinario", $raza, PDO::PARAM_STR);
        $resultado->execute();
        self::desconectar();
        $encontrado = false;
        foreach ($resultado->fetchAll() as $reg) {
            $encontrado = true;
        }
        return $encontrado;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return $error;
    }
}

public function guardarEnDb(){
    $query = "INSERT INTO `Veterinario`(`idVeterinario`, `nombre_veterinario`, `apellido_paterno`, `codigo_veterinario`) VALUES (:idVeterinario, :nombre_veterinario, :apellido_paterno, :codigo_veterinario)";
    try {
        self::getConexion();
        $idVeterinario = $this->getIdVeterinario();
        $nombreVeterinario = strtoupper($this->getNombreVeterinario());
        $apellidoPaterno = $this->getApellidoPaterno();
        $codigoVeterinario = $this->getCodigoVeterinario();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idVeterinario", $idVeterinario, PDO::PARAM_STR);
        $resultado->bindParam(":nombre_veterinario", $nombreVeterinario, PDO::PARAM_STR);
        $resultado->bindParam(":apellido_paterno", $apellidoPaterno, PDO::PARAM_STR);
        $resultado->bindParam(":codigo_veterinario", $codigoVeterinario, PDO::PARAM_STR);
        $resultado->execute();
        self::desconectar();
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return json_encode($error);
    }
}

}
?>
