<?php
require_once '../config/Conexion.php';

class fichaMedica extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $idFichaMedica = null;
    private $idMascota = null;
    private $fecha_cita = null;
    private $idVeterinario = null;
    private $peso = null;
    private $temperatura = null;
    private $motivo = null;
    private $diagnostico = null;
    private $tratamiento = null;


    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Constructores de la Clase         =
    =============================================*/
    public function __construct(){}
    /*=====  End of Constructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getIdFichaMedica()
    {
        return $this->idFichaMedica;
    }
    public function setIdFichaMedica($idFichaMedica)
    {
        $this->idFichaMedica = $idFichaMedica;
    }
    public function getIdMascota()
    {
        return $this->idMascota;
    }
    public function setIdMascota($idMascota)
    {
        $this->idMascota = $idMascota;
    }
    public function getFecha_cita()
    {
        return $this->fecha_cita;
    }
    public function setFecha_cita($fecha_cita)
    {
        $this->fecha_cita = $fecha_cita;
    }
    public function getIdVeterinario()
    {
        return $this->idVeterinario;
    }
    public function setIdVeterinario($idVeterinario)
    {
        $this->idVeterinario = $idVeterinario;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getTemperatura()
    {
        return $this->temperatura;
    }
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;
    }

    public function getMotivo()
    {
        return $this->motivo;
    }
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    public function getDiagnostico()
    {
        return $this->diagnostico;
    }
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    public function getTratamiento()
    {
        return $this->tratamiento;
    }
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }
    
    public function listarTodosDb(){
        try {
            $query = "SELECT * FROM ficha_medica";
            $arr = array();
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $fichaMedica = new FichaMedica();
                // Agregar los nuevos atributos de proveedor
                $fichaMedica->setIdFichaMedica($encontrado['idFichaMedica']);
                $fichaMedica->setIdMascota($encontrado['idMascota']);
                $fichaMedica->setFecha_cita($encontrado['fecha_cita']);
                $fichaMedica->setIdVeterinario($encontrado['idVeterinario']);
                $fichaMedica->setPeso($encontrado['peso']);
                $fichaMedica->setTemperatura($encontrado['temperatura']);
                $fichaMedica->setMotivo($encontrado['motivo']);
                $fichaMedica->setDiagnostico($encontrado['diagnostico']);
                $fichaMedica->setTratamiento($encontrado['tratamiento']);
                $arr[] = $fichaMedica;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );
            // Devolver un array vacío en caso de error
            return array();
        }
    }
    
public function verificarExistenciaDb(){
    $query = "SELECT * FROM ficha_medica WHERE idMascota=:idMascota";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		
        $idMascota = $this->getIdMascota();	
        $resultado->bindParam(":idMascota", $idMascota, PDO::PARAM_INT);
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
    $query = "INSERT INTO `ficha_medica`(`idMascota`, `fecha_cita`, `idVeterianrio`, `peso`, `temperatura`, `motivo`, `diagnostico`, `tratamiento`) VALUES (:idMascota, :fecha_cita, :idVeterinario, :peso, :temperatura, :motivo, :diagnostico, :tratamiento)";
    try {
        self::getConexion();
        $idMascota = strtoupper($this->getIdMascota());
        $fecha_cita = $this->getFecha_cita();
        $idVeterinario = $this->getIdVeterinario();
        $peso = $this->getPeso();
        $temperatura = $this->getTemperatura();
        $motivo = $this->getMotivo();
        $diagnostico = $this->getDiagnostico();
        $tratamiento = $this->getTratamiento();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idMascota", $idMascota, PDO::PARAM_INT);
        $resultado->bindParam(":fecha_cita", $fecha_cita, PDO::PARAM_STR);
        $resultado->bindParam(":idVeterinario", $idVeterinario, PDO::PARAM_DATE);
        $resultado->bindParam(":peso", $peso, PDO::PARAM_DECIMAL);
        $resultado->bindParam(":temperatura", $temperatura, PDO::PARAM_DECIMAL);
        $resultado->bindParam(":motivo", $motivo, PDO::PARAM_STR);
        $resultado->bindParam(":diagnostico", $diagnostico, PDO::PARAM_STR);
        $resultado->bindParam(":tratamiento", $tratamiento, PDO::PARAM_STR);

        $resultado->execute();
        self::desconectar();
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return json_encode($error);
    }
}
public function llenarCampos($idMascota){
    $query = "SELECT fm.*, 
    (SELECT nombre FROM mascotas WHERE idMascota = fm.idMascota) AS nombre_mascota
FROM ficha_medica fm
WHERE fm.idMascota = :idMascota";

    try
{
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idMascota", $idMascota, PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $this->setIdFichaMedica($encontrado['idFichaMedica']);
            $this->setIdMascota($encontrado['idMascota']);
            $this->setFecha_cita($encontrado['fecha_cita']);
            $this->setIdVeterinario($encontrado['idVeterinario']);
            $this->setPeso($encontrado['peso']);
            $this->setTemperatura($encontrado['temperatura']);
            $this->setMotivo($encontrado['motivo']);
            $this->setDiagnostico($encontrado['diagnostico']);
            $this->setTratamiento($encontrado['tratamiento']);

          
        }
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return json_encode($error);
    }
}
}

?>
