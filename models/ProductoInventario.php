<?php
require_once '../config/Conexion.php';

class ProductoInventario extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idProducto = null;
    private $nombre = null;
    private $descripcion = null;
    private $stockProducto = null;
    private $idProveedor = null;
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
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    public function listarTodosDb(){
        $query = "SELECT * FROM productoinventario";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $productoInventario = new ProductoInventario();
                $productoInventario->setIdProducto($encontrado['idProducto']);
                $productoInventario->setNombre($encontrado['nombre']);
                $productoInventario->setDescripcion($encontrado['descripcion']);
                $productoInventario->setStockProducto($encontrado['stockProducto']);
                $productoInventario->setIdProveedor($encontrado['idProveedor']);
                $arr[] = $productoInventario;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    
    public function verificarExistenciaDb(){
        $query = "SELECT * FROM productoInventario WHERE idProveedor=:idProveedor";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $idProveedor = $this->getIdProveedor();
            $resultado->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            return $resultado->rowCount() > 0; // Devuelve true si se encontraron resultados
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }
    
    public function guardarEnDb(){
        $query = "INSERT INTO `productoinventario`(`nombre`, `descripcion`, `stockProducto`, `idProveedor`) VALUES (:nombre, :descripcion, :stockProducto, :idProveedor)";
        try {
            self::getConexion();
            $nombre = strtoupper($this->getNombre());
            $descripcion = $this->getDescripcion();
            $stockProducto = $this->getStockProducto();
            $idProveedor = $this->getIdProveedor();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $resultado->bindParam(":stockProducto", $stockProducto, PDO::PARAM_INT);
            $resultado->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    
    public function llenarCampos($idProducto){
        $query = "SELECT * FROM productoinventario WHERE idProducto = :idProducto";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdProducto($encontrado['idProducto']);
                $this->setNombre($encontrado['nombre']);
                $this->setDescripcion($encontrado['descripcion']);
                $this->setStockProducto($encontrado['stockProducto']);
                $this->setIdProveedor($encontrado['idProveedor']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return json_encode($error);
        }
    }
    public function listarProveedores(){
        $query = "SELECT id, nombre FROM proveedores";
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

    public function restarStock($idProducto) {
        try {
            // Verificar si el producto existe y obtener su stock actual
            $query = "SELECT stockProducto FROM productoinventario WHERE idProducto = :idProducto";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
            $resultado->execute();
            $stockActual = $resultado->fetchColumn();
    
            // Verificar si hay suficiente stock para restar una unidad
            if ($stockActual > 0) {
                // Restar una unidad al stock actual
                $nuevoStock = $stockActual - 1;
    
                // Actualizar el stock en la base de datos
                $queryActualizar = "UPDATE productoinventario SET stockProducto = :nuevoStock WHERE idProducto = :idProducto";
                $resultadoActualizar = self::$cnx->prepare($queryActualizar);
                $resultadoActualizar->bindParam(":nuevoStock", $nuevoStock, PDO::PARAM_INT);
                $resultadoActualizar->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
                $resultadoActualizar->execute();
                
                self::desconectar();
                return "Stock restado correctamente";
            } else {
                self::desconectar();
                return "No hay suficiente stock disponible para restar";
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }
    
    
}
?>


