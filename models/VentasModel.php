<?php
require_once '../config/Conexion.php';

class ventas extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idProducto = null;
    private $idProveedor = null;
    private $fecha = null;
    private $cantidad = null;
    private $total = null;
    private $idVenta = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Constructores de la Clase         =
    =============================================*/
    public function __construct(){}
    /*=====  End of Constructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdProducto()
    {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function getIdVenta()
    {
        return $this->idVenta;
    }
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/
    
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    
    public function guardarEnDb(){
        $query = "INSERT INTO `ventas`(`idProducto`, `idProveedor`, `fecha`, `cantidad`, `total`, `idVenta`) VALUES (:idProducto, :idProveedor, :fecha, :cantidad, :total, :idVenta)";
        try {
            self::getConexion();
            $idProducto = $this->getIdProducto();
            $idProveedor = $this->getIdProveedor();
            $fecha = $this->getFecha();
            $cantidad = $this->getCantidad();
            $total = $this->getTotal();
            $idVenta = $this->getIdVenta();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $resultado->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $resultado->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $resultado->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $resultado->bindParam(":total", $total, PDO::PARAM_STR);
            $resultado->bindParam(":idVenta", $idVenta, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    
    public function listarVentas(){
        $query = "SELECT * FROM ventas";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }

    public function obtenerCantidadProductosPorFecha()
{
    $fecha_definida = "2020-01-28";

    $arr = array();
    

   
    $query = "SELECT DISTINCT p.idProducto, COUNT(*) AS cantidad
              FROM ventas v
              JOIN productos p ON v.idProducto = p.idProducto
              WHERE v.fecha = :fecha_definida
              GROUP BY p.idProducto";

    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":fecha_definida", $fecha_definida, PDO::PARAM_STR);
        $resultado->execute();
        self::desconectar();

        // Recuperar todos los resultados en un array asociativo
        $arr = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($arr); // Devuelve el resultado como JSON

    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        
        return json_encode(array(
            'success' => false,
            'error' => $error
        )); // Devuelve un array con información de error como JSON
    }
}

public function obtenerNombreProductoPorFechaDefinida()
{
    $fecha_definida = "2020-01-28";
    $arr = array(); // Usamos un array para almacenar el resultado

    $query = "SELECT p.nombre
              FROM ventas v
              JOIN productos p ON v.idProducto = p.idProducto
              WHERE v.fecha = :fecha_definida";

    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":fecha_definida", $fecha_definida, PDO::PARAM_STR);
        $resultado->execute();
        
        // Recoger todos los nombres de productos en un array
        while ($nombre_producto = $resultado->fetchColumn()) {
            $arr[] = $nombre_producto;
        }

        self::desconectar();
        
        return json_encode($arr); // Devuelve el array de nombres de productos como JSON

    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        
        return json_encode(array(
            'success' => false,
            'error' => $error
        )); // Devuelve un array con información de error como JSON
    }
}

    
}

?>