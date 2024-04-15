<?php
require_once "../views/plugins/fpdf186/fpdf.php";

// Clase PDF que hereda de FPDF
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,utf8_decode('Reporte de Proveedores por Producto'),0,1,'C');
        $this->Ln(10);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().'/{nb}'),0,0,'C');
    }

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
            $this->Cell(40,6,utf8_decode($row['idProducto']),1);
            $this->Cell(40,6,utf8_decode($row['producto']),1);
            $this->Cell(40,6,utf8_decode($row['proveedor']),1);
            $this->Ln();
        }
    }
}

// Conexión a la base de datos
$dsn = 'mysql:host=localhost;dbname=drpets';
$user = 'admin1';
$pass = '123';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
// Obtener el ID del proveedor seleccionado
if (isset($_POST['proveedor'])) {
    $proveedor_id = $_POST['proveedor'];

    // Consulta a la base de datos para obtener los proveedores por producto
    $stmt = $dbh->prepare('SELECT pi.idProducto, pi.nombre AS producto, p.nombre AS proveedor 
                           FROM productoinventario pi 
                           JOIN proveedores p ON pi.idProveedor = p.idProveedor 
                           WHERE p.idProveedor = :proveedor_id');
    $stmt->bindParam(':proveedor_id', $proveedor_id, PDO::PARAM_INT);
    $stmt->execute();
    $proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Creación del objeto PDF y generación del reporte
    $pdf = new PDF('L', 'mm', 'Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Encabezados de la tabla
    $header = array('ID Producto', 'Producto', 'Proveedor');

    // Contenido de la tabla
    $data = $proveedores;

    // Generar tabla en el PDF
    $pdf->BodyTable($header, $data);

    // Enviar el PDF al navegador para su descarga
    $pdf->Output('D', 'reporte_proveedores_por_proveedor.pdf');
    exit; // Salir del script después de enviar el PDF
}
?>