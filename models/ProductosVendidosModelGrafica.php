<?php
require_once '../config/Conexion.php';

class Venta extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idCompra = null;
    private $idCliente = null;
    private $idProducto = null;
    private $cantidad = null;
    private $precioUnitario = null;
    private $iva = null;
    private $fechaCompra = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdCompra()
    {
        return $this->idCompra;
    }
    public function setIdCompra($idCompra)
    {
        $this->idCompra = $idCompra;
    }
    public function getIdCliente()
    {
        return $this->idCliente;
    }
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }
    public function getIdProducto()
    {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;
    }
    public function getIva()
    {
        return $this->iva;
    }
    public function setIva($iva)
    {
        $this->iva = $iva;
    }
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
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

    public function obtenerFechas() {
        $query = "SELECT DISTINCT fecha_compra FROM ventas ORDER BY fecha_compra";
        $fechas = array();
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
    
            // Recuperar las fechas y formatearlas
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                // Formatear la fecha como día-mes-año
                $fecha_formateada = date('d-m-Y', strtotime($fila['fecha_compra']));
                $fechas[] = $fecha_formateada;
            }
    
            self::desconectar();
            return json_encode($fechas);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode(array('error' => $error));
        }
    }

    public function contarVentasPorFecha($fecha) {
        $query = "SELECT COUNT(*) AS cantidad FROM ventas WHERE fecha_compra = :fecha";
        $cantidad_ventas = 0;
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(':fecha', $fecha);
            $resultado->execute();
    
            // Recuperar la cantidad de ventas
            $fila = $resultado->fetch(PDO::FETCH_ASSOC);
            $cantidad_ventas = $fila['cantidad'];
    
            self::desconectar();
            // Devolver el resultado en formato JSON
            return json_encode(array('fecha' => $fecha, 'cantidad_ventas' => $cantidad_ventas));
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode(array('error' => $error));
        }
    }
    
    
}
?>
