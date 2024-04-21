<?php
require_once '../config/Conexion.php';

class Veterinario extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idVeterinario = null;
    private $nombreVeterinario = null;
    private $apellidoPaterno = null;
    private $codigoVeterinario = null;
    private $especialidad = null;

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
        return $this->nombreVeterinario;
    }
    public function setNombreVeterinario($nombreVeterinario)
    {
        $this->nombreVeterinario = $nombreVeterinario;
    }
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    public function getCodigoVeterinario()
    {
        return $this->codigoVeterinario;
    }
    public function setCodigoVeterinario($codigoVeterinario)
    {
        $this->codigoVeterinario = $codigoVeterinario;
    }
    public function getEspecialidad()
    {
        return $this->especialidad;
    }
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
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
            $usuario->setNombreVeterinario($encontrado['nombreVeterinario']);
            $usuario->setApellidoPaterno($encontrado['apellidoPaterno']);
            $usuario->setCodigoVeterinario($encontrado['codigoVeterinario']);
            $usuario->setEspecialidad($encontrado['especialidad']);

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
    $query = "SELECT * FROM Veterinario WHERE codigoVeterinario=:codigoVeterinario";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		
        $raza = $this->getCodigoVeterinario();	
        $resultado->bindParam(":codigoVeterinario", $codigoVeterinario, PDO::PARAM_STR);
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
    $query = "INSERT INTO `Veterinario`(`idVeterinario`, `nombreVeterinario`, `apellidoPaterno`, `codigoVeterinario`, `especialidad`) VALUES (:idVeterinario, :nombreVeterinario, :apellidoPaterno, :codigoVeterinario, :especialidad)";
    try {
        self::getConexion();
        $idVeterinario = $this->getIdVeterinario();
        $nombreVeterinario = strtoupper($this->getNombreVeterinario());
        $apellidoPaterno = $this->getApellidoPaterno();
        $codigoVeterinario = $this->getCodigoVeterinario();
        $especialidad = $this->getEspecialidad();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idVeterinario", $idVeterinario, PDO::PARAM_STR);
        $resultado->bindParam(":nombreVeterinario", $nombreVeterinario, PDO::PARAM_STR);
        $resultado->bindParam(":apellidoPaterno", $apellidoPaterno, PDO::PARAM_STR);
        $resultado->bindParam(":codigoVeterinario", $codigoVeterinario, PDO::PARAM_STR);
        $resultado->bindParam(":especialidad", $especialidad, PDO::PARAM_STR);

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
