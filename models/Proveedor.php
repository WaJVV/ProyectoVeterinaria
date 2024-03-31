<?php
require_once '../config/Conexion.php';

class Proveedor extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idProveedor = null;
    private $nombre = null;
    private $direccionProveedor = null;
    private $telefonoCelularProveedor = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Constructores de la Clase         =
    =============================================*/
    public function __construct(){}
    /*=====  End of Constructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getDireccionProveedor()
    {
        return $this->direccionProveedor;
    }
    public function setDireccionProveedor($direccionProveedor)
    {
        $this->direccionProveedor = $direccionProveedor;
    }
    public function getTelefonoCelularProveedor()
    {
        return $this->telefonoCelularProveedor;
    }
    public function setTelefonoCelularProveedor($telefonoCelularProveedor)
    {
        $this->telefonoCelularProveedor = $telefonoCelularProveedor;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    
    public function listarTodosDb(){
    $query = "SELECT * FROM proveedores";
    $arr = array();
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $proveedor = new Proveedor();
            // Agregar los nuevos atributos de proveedor
            $proveedor->setIdProveedor($encontrado['idProveedor']);
            $proveedor->setNombre($encontrado['nombre']);
            $proveedor->setDireccionProveedor($encontrado['direccionProveedor']);
            $proveedor->setTelefonoCelularProveedor($encontrado['telefonoCelularProveedor']);
            $arr[] = $proveedor;
        }
        return $arr;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
        return json_encode($error);
    }
}

public function verificarExistenciaDb(){
    $query = "SELECT * FROM proveedores WHERE telefonoCelularProveedor=:telefonoCelularProveedor";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		
        $telefono = $this->getTelefonoCelularProveedor();	
        $resultado->bindParam(":telefonoCelularProveedor", $telefono, PDO::PARAM_STR);
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
    $query = "INSERT INTO `proveedores`(`nombre`, `direccionProveedor`, `telefonoCelularProveedor`) VALUES (:nombre, :direccionProveedor, :telefonoCelularProveedor)";
    try {
        self::getConexion();
        $nombre = strtoupper($this->getNombre());
        $direccionProveedor = $this->getDireccionProveedor();
        $telefonoCelularProveedor = $this->getTelefonoCelularProveedor();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $resultado->bindParam(":direccionProveedor", $direccionProveedor, PDO::PARAM_STR);
        $resultado->bindParam(":telefonoCelularProveedor", $telefonoCelularProveedor, PDO::PARAM_STR);
        $resultado->execute();
        self::desconectar();
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return json_encode($error);
    }
}
public function llenarCampos($idProveedor){
    $query = "SELECT * FROM proveedores WHERE idProveedor = :idProveedor";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $this->setIdProveedor($encontrado['idProveedor']);
            $this->setNombre($encontrado['nombre']);
            $this->setDireccionProveedor($encontrado['direccionProveedor']);
            $this->setTelefonoCelularProveedor($encontrado['telefonoCelularProveedor']);
          
        }
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return json_encode($error);
    }
}
}
?>
