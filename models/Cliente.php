<?php
require_once '../config/Conexion.php';

class Cliente extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idCliente = null;
    private $identificacion = null;
    private $nombre = null;
    private $apellidoPaterno = null;
    private $apellidoMaterno = null;
    private $nacimientoCliente = null;
    private $direccion = null;
    private $telefonoCelular = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }
    public function getNacimientoCliente()
    {
        return $this->nacimientoCliente;
    }
    public function setNacimientoCliente($nacimientoCliente)
    {
        $this->nacimientoCliente = $nacimientoCliente;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
	=            Metodos de la Clase              =
	=============================================*/
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    public function listarTodosDb(){
        $query = "SELECT * FROM clientes";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $cliente = new Cliente();
                $cliente->setIdCliente($encontrado['idCliente']);
                $cliente->setIdentificacion($encontrado['identificacion']);
                $cliente->setNombre($encontrado['nombre']);
                $cliente->setApellidoPaterno($encontrado['apellidoPaterno']);
                $cliente->setApellidoMaterno($encontrado['apellidoMaterno']);
                $cliente->setNacimientoCliente($encontrado['nacimientoCliente']);
                $cliente->setDireccion($encontrado['direccion']);
                $cliente->setTelefonoCelular($encontrado['telefonoCelular']);
                $arr[] = $cliente;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    public function verificarExistenciaDb(){
        $query = "SELECT * FROM clientes WHERE identificacion=:identificacion";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);      
            $identificacion = $this->getIdentificacion();  
            $resultado->bindParam(":identificacion", $identificacion, PDO::PARAM_STR);
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
        $query = "INSERT INTO `clientes`(`identificacion`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `nacimientoCliente`, `direccion`, `telefonoCelular`) VALUES (:identificacion, :nombre, :apellidoPaterno, :apellidoMaterno, :nacimientoCliente, :direccion, :telefonoCelular)";
        try {
            self::getConexion();
            $identificacion = $this->getIdentificacion();
            $nombre = strtoupper($this->getNombre());
            $apellidoPaterno = strtoupper($this->getApellidoPaterno());
            $apellidoMaterno = strtoupper($this->getApellidoMaterno());
            $nacimientoCliente = $this->getNacimientoCliente();
            $direccion = $this->getDireccion();
            $telefonoCelular = $this->getTelefonoCelular();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":identificacion", $identificacion, PDO::PARAM_STR);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoPaterno", $apellidoPaterno, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoMaterno", $apellidoMaterno, PDO::PARAM_STR);
            $resultado->bindParam(":nacimientoCliente", $nacimientoCliente, PDO::PARAM_STR);
            $resultado->bindParam(":direccion", $direccion, PDO::PARAM_STR);
            $resultado->bindParam(":telefonoCelular", $telefonoCelular, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    public function llenarCampos($id){
        $query = "SELECT * FROM clientes WHERE idCliente = :id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setId($encontrado['idCliente']);
                $this->setIdentificacion($encontrado['identificacion']);
                $this->setNombre($encontrado['nombre']);
                $this->setApellidoPaterno($encontrado['apellidoPaterno']);
                $this->setApellidoMaterno($encontrado['apellidoMaterno']);
                $this->setNacimientoCliente($encontrado['nacimientoCliente']);
                $this->setDireccion($encontrado['direccion']);
                $this->setTelefonoCelular($encontrado['telefonoCelular']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    



}
?>

