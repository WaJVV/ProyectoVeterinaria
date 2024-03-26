<?php
require_once'../config/Conexion.php';

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


    public function contarClientesPorUbicacion(){
        // Query que realiza la agrupación y conteo directamente
        $query = "SELECT direccion, COUNT(*) AS cantidad FROM Clientes GROUP BY direccion";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
    
            // Recuperar todos los resultados en un array asociativo
            foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $fila) {
                $arr[] = $fila;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

}
    

?>