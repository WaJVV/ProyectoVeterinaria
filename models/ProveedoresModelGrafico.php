<?php
require_once '../config/Conexion.php';

class Proveedor extends Conexion
{
    protected static $cnx;
    private $idProveedor = null;
    private $nombre = null;
    private $direccionProveedor = null;
    private $telefonoCelularProveedor = null;

    public function __construct(){}

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

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function contarProveedoresPorUbicacion(){
        $query = "SELECT COUNT(*) AS cantidad FROM proveedores GROUP BY direccionProveedor";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            
            
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $arr[] = $fila['cantidad'];
            }
            
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    

    public function obtenerTodasLasDireccionesDeProveedores(){
        $query = "SELECT DISTINCT direccionProveedor FROM proveedores";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            
            
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $arr[] = $fila['direccionProveedor'];
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
