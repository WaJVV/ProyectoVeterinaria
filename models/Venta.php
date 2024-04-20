<?php
require_once '../config/Conexion.php';

class Servicios extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/

    protected static $cnx;
    private $idServicio = null;
    private $tipoServicio = null;
    private $precioColones= null;

    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Constructores de la Clase         =
    =============================================*/
    public function __construct(){}
    /*=====  End of Constructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdServicio()
    {
        return $this->idServicio;
    }
    public function setIdServicio($idServicio)
    {
        $this->idServicio = $idServicio;
    }
    public function getTipoServicio()
    {
        return $this->tipoServicio;
    }
    public function setTipoServicio($tipoServicio)
    {
        $this->tipoServicio = $tipoServicio;
    }
    public function getPrecioColones()
    {
        return $this->precioColones;
    }
    public function setPrecioColones($precioColones)
    {
        $this->precioColones = $precioColones;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function listarTodosDb()
    {
        $query = "SELECT * FROM servicios";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $servicio = new Servicio();
                $servicio->setIdServicio($encontrado['idServicio']);
                $servicio->setTipoServicio($encontrado['tipoServicio']);
                $servicio->setPrecioColones($encontrado['precioColones']);
                $arr[] = $servicio;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }
}