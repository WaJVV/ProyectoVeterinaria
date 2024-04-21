<?php

require_once "../views/plugins/fpdf186/fpdf.php";

// Clase PDF que hereda de FPDF
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,utf8_decode('Listado de Cumpleañeros'),0,1,'C');
        $this->Ln(10);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }

    // se ingresa la instruccion utf8_decode para que se muestren las tildes
    function BodyTable($header, $data){
        $this->SetFont('Arial','',10); // Reducir el tamaño de la fuente

        // Encabezado
        $this->SetFillColor(200,220,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        foreach($header as $col){
            $this->Cell(40,7,utf8_decode($col),1,0,'C',true);
        }
        $this->Ln();

        // Datos
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('');
        foreach($data as $row){
            foreach($row as $col){
                $this->Cell(40,6,utf8_decode($col),1);
            }
            $this->Ln();
        }
    }
}

// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=drpets';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Obtener el mes seleccionado desde la URL, si está presente
if (isset($_GET['mes'])) {
    $selected_month = $_GET['mes'];

    // Consulta a la base de datos para obtener las mascotas que cumplen años en el mes seleccionado
    $stmt = $dbh->prepare('SELECT m.idMascota, m.nombre AS nombreMascota, m.raza, m.nacimientoMascota, cl.nombre AS nombreCliente, cl.apellidoPaterno, cl.apellidoMaterno FROM mascotas m JOIN clientes cl ON m.idCliente = cl.idCliente WHERE MONTH(m.nacimientoMascota) = :selected_month');
    $stmt->bindParam(':selected_month', $selected_month);
    $stmt->execute();
    $cumpleaneros = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Creación del objeto PDF con tamaño de página personalizado (ancho y alto en milímetros)
$pdf = new PDF('P','mm','Letter'); // 'P' para orientación vertical
$pdf->AliasNbPages();
$pdf->AddPage();

// Encabezados de la tabla
$header = array('ID', 'Nombre Mascota', 'Raza', 'Fecha de Nacimiento', 'Cliente');

// Contenido de la tabla
$data = array();
foreach($cumpleaneros as $cumpleanero){
    $nombreMascota = $cumpleanero['nombreMascota'];
    $data[] = array($cumpleanero['idMascota'], $cumpleanero['nombreMascota'], $cumpleanero['raza'], $cumpleanero['nacimientoMascota'], $cumpleanero['nombreCliente'] . ' ' . $cumpleanero['apellidoPaterno'] . ' ' . $cumpleanero['apellidoMaterno']);
}

// Generar tabla en el PDF
$pdf->BodyTable($header, $data);

// Enviar el PDF al navegador para su descarga
$pdf->Output('D', 'listado_cumpleaneros.pdf');
exit; // Salir del script después de enviar el PDF
?>