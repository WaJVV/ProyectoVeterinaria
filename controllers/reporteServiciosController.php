<?php
require_once "../views/plugins/fpdf186/fpdf.php";

// Clase PDF que hereda de FPDF
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,utf8_decode('Servicios Más Brindados'),0,1,'C');
        $this->Ln(10);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }

    function BodyTable($header, $data){
        $this->SetFont('Arial','',10);
    
        // Encabezado de la tabla
        $this->SetFillColor(200,220,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        foreach($header as $col){
            $this->Cell(50,7,utf8_decode($col),1,0,'C',true);
        }
        $this->Ln();
        // Datos de la tabla
        $this->SetFillColor(255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $total = 0;
        foreach($data as $row){
            $this->Cell(50,6,utf8_decode($row['tipoServicio']),1);
            $this->Cell(50,6,utf8_decode($row['cantidad']),1);
            $this->Cell(50,6,number_format($row['precio_unitario']),1);
            $subtotal = $row['cantidad'] * $row['precio_unitario'];
            $total += $subtotal;
            $this->Cell(50,6,number_format($subtotal, 2),1);
            $this->Ln();
        }
    
        // Mostrar el total al final de la tabla
        $this->SetFont('Arial','B',10); 
        $this->Cell(150,7,'Total',1,0,'R',true);
        $this->Cell(50,7,number_format($total, 2),1,0,'R',true);
    
    }
}

// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=drpetsvet';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
// Obtener el año seleccionado desde el formulario
if (isset($_GET['anio'])) {
    $selected_year = $_GET['anio'];

    // Consulta a la base de datos para obtener los servicios más brindados durante el año seleccionado
    $stmt = $dbh->prepare('SELECT s.tipoServicio, COUNT(*) AS cantidad, rs.montoColones AS precio_unitario, SUM(rs.montoColones) AS total FROM RegistroServicios rs JOIN Servicios s ON rs.idServicio = s.idServicio WHERE YEAR(rs.fechaServicio) = :selected_year GROUP BY rs.idServicio ORDER BY cantidad DESC');
    $stmt->bindParam(':selected_year', $selected_year);
    $stmt->execute();
    $servicios_brindados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
   // Creación del objeto PDF
$pdf = new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();

// Encabezados de la tabla
$header = array('Tipo de Servicio', 'Cantidad', 'Precio Unitario', 'Total');

// Generar tabla en el PDF
$pdf->BodyTable($header, $servicios_brindados);

// Generar el PDF y guardar en el servidor
ob_clean();
$pdf->Output('D', 'servicios_mas_brindados.pdf');

}

exit;
?>
