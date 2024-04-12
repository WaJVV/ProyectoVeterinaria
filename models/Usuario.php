<?php
require_once '../config/Conexion.php';

class Usuario extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $id=null;
    private $raza=null;
    private $nombre= null;
    private $peso= null;
    private $nacimiento= null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getRaza()
    {
        return $this->raza;
    }
    public function setRaza($raza)
    {
        $this->raza = $raza;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function getNacimiento()
    {
        return $this->nacimiento;
    }
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
    =            Metodos de la Clase              =
    =============================================*/
    // Aquí irían los métodos de la clase
    /*=====  End of Metodos de la Clase  ======*/

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
            $query = "SELECT * FROM usuarios";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $user = new Usuario();
                    $user->setId($encontrado['id']);
                    $user->setRaza($encontrado['raza']);
                    $user->setNombre($encontrado['nombre']);
                    $user->setPeso($encontrado['peso']);
                    $user->setNacimiento($encontrado['nacimiento']);
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
            $query = "SELECT * FROM usuarios where raza=:raza";
         try {
             self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $email= $this->getRaza();	
                $resultado->bindParam(":raza",$raza,PDO::PARAM_STR);
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
            $query = "INSERT INTO `usuarios`(`raza`, `nombre`, `peso`, `nacimiento`) VALUES (:raza,:nombre,:peso,:nacimiento)";
            try {
                self::getConexion();
                $raza = $this->getRaza();
                $nombre = strtoupper($this->getNombre());
                $peso = $this->getPeso();
                $nacimiento = $this->getNacimiento();
        
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":raza",$raza,PDO::PARAM_STR);
                $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
                $resultado->bindParam(":peso",$peso,PDO::PARAM_STR);
                $resultado->bindParam(":nacimiento",$nacimiento,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return json_encode($error);
            }
        }
    

       

        public function llenarCampos($id){
            $query = "SELECT * FROM usuarios where id=:id";
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":id",$id,PDO::PARAM_INT);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $this->setId($encontrado['id']);
                    $this->setRaza($encontrado['raza']);
                    $this->setNombre($encontrado['nombre']);
                    $this->setPeso($encontrado['peso']);
                    $this->setNacimiento($encontrado['nacimiento']);
                }
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return json_encode($error);
            }
        }
        
        public function actualizarUsuario(){
            $query = "UPDATE usuarios SET nombre=:nombre, raza=:raza, peso=:peso, nacimiento=:nacimiento WHERE id=:id";
            try {
                self::getConexion();
                $id = $this->getId();
                $nombre = strtoupper($this->getNombre());
                $raza = $this->getRaza();
                $peso = $this->getPeso();
                $nacimiento = $this->getNacimiento();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                $resultado->bindParam(":raza", $raza, PDO::PARAM_STR);
                $resultado->bindParam(":peso", $peso, PDO::PARAM_STR);
                $resultado->bindParam(":nacimiento", $nacimiento, PDO::PARAM_STR);
                $resultado->bindParam(":id", $id, PDO::PARAM_INT);
                self::$cnx->beginTransaction(); // desactiva el autocommit
                $resultado->execute();
                self::$cnx->commit(); // realiza el commit y vuelve al modo autocommit
                self::desconectar();
                return $resultado->rowCount();
            } catch (PDOException $Exception) {
                self::$cnx->rollBack();
                self::desconectar();
                $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
                return $error;
            }
        }
        
        
    /*=====  End of Metodos de la Clase  ======*/  
}
?>