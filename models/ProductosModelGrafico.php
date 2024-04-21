<?php
require_once '../config/Conexion.php';

class Producto extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idProducto = null;
    private $nombre = null;
    private $descripcionProducto = null;
    private $stockProducto = null;
    private $idProveedor = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

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
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getDescripcionProducto()
    {
        return $this->descripcionProducto;
    }
    public function setDescripcionProducto($descripcionProducto)
    {
        $this->descripcionProducto = $descripcionProducto;
    }
    public function getStockProducto()
    {
        return $this->stockProducto;
    }
    public function setStockProducto($stockProducto)
    {
        $this->stockProducto = $stockProducto;
    }
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
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

    public function obtenerProductos() {
        
        $query = "SELECT nombre FROM productos LIMIT 5";
        $productos = array();
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
    
            
            while( $fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                $productos[] = $fila['nombre'];
            }  
    
            self::desconectar();
            return $productos;  
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode(array('error' => $error));  
        }
    }


    public function obtenerStockDeProductos() {
        
        $query = "SELECT stockProducto FROM productos ORDER BY nombre LIMIT 5";
        $stocks = array();
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
    
            
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $stocks[] = $fila['stockProducto'];
            }
    
            self::desconectar();
            return $stocks;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode(array('error' => $error));
        }
    }
    
}



?>
