<?php
require_once '../config/Conexion.php';

class Paciente extends Conexion
{
    protected static $cnx;
    private $idMascota = null;
    private $nombre = null;
    private $raza = null;
    private $peso = null;
    private $nacimientoMascota = null; // Modificamos el nombre de la variable
    private $idCliente = null;

    public function __construct(){}

    public function getIdMascota()
    {
        return $this->idMascota;
    }

    public function setIdMascota($idMascota)
    {
        $this->idMascota = $idMascota;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getNacimientoMascota()
    {
        return $this->nacimientoMascota;
    }

    public function setNacimientoMascota($nacimientoMascota)
    {
        $this->nacimientoMascota = $nacimientoMascota;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    public function listarTodosDb(){
        $query = "SELECT * FROM pacientes";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $user = new Paciente();
                $user->setIdMascota($encontrado['idMascota']);
                $user->setNombre($encontrado['nombre']);
                $user->setRaza($encontrado['raza']);
                $user->setPeso($encontrado['peso']);
                $user->setNacimientoMascota($encontrado['nacimiento_mascota']); // Modificamos el nombre de la clave
                $user->setIdCliente($encontrado['idCliente']);
                $arr[] = $user;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

    public function verificarExistenciaDb(){
        $query = "SELECT * FROM pacientes WHERE nombre=:nombre";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);       
            $nombre = strtoupper($this->getNombre()); // Assuming nombre is one of the attributes
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            $encontrado = false;
            foreach ($resultado->fetchAll() as $reg) {
                $encontrado = true;
            }
            return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    
    public function guardarEnDb(){
        $query = "INSERT INTO `pacientes`(`nombre`, `raza`, `peso`, `nacimiento_mascota`, `id_Cliente`, `created_at`) VALUES (:nombre,:raza,:peso,:nacimientoMascota,:idCliente,now())";
        try {
            self::getConexion();
            $nombre = strtoupper($this->getNombre());
            $raza = $this->getRaza();
            $peso = $this->getPeso();
            $nacimientoMascota = $this->getNacimientoMascota();
            $idCliente = $this->getIdCliente();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":raza", $raza, PDO::PARAM_STR);
            $resultado->bindParam(":peso", $peso, PDO::PARAM_STR);
            $resultado->bindParam(":nacimientoMascota", $nacimientoMascota, PDO::PARAM_STR);
            $resultado->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }
   
}
?>
