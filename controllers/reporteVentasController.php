<?php

require_once "../views/plugins/fpdf186/fpdf.php";

// Clase PDF que hereda de FPDF
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,utf8_decode('Reporte Ventas'),0,1,'C');
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
$dsn = 'mysql:host=localhost;dbname=drpetsvet';
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Calcular fecha inicial y final del rango de fechas
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

// Consulta a la base de datos con el rango de fechas y unión con la tabla de ventas
$stmt = $dbh->prepare('SELECT v.*, p.nombre AS nombre_producto, pr.nombre AS nombre_proveedor FROM ventas v JOIN productos p ON v.idProducto = p.idProducto JOIN proveedores pr ON v.idProveedor = pr.idProveedor WHERE v.fecha BETWEEN :fecha_inicio AND :fecha_final');
$stmt->bindParam(':fecha_inicio', $fecha_inicio);
$stmt->bindParam(':fecha_final', $fecha_final);
$stmt->execute();
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Creación del objeto PDF con tamaño de página personalizado (ancho y alto en milímetros)
$pdf = new PDF('L','mm','Letter'); // 'L' para orientación horizontal
$pdf->AliasNbPages();
$pdf->AddPage();

// Encabezados de la tabla
$header = array('ID Venta', 'Producto', 'Proveedor', 'Cantidad', 'Precio Unitario', 'Fecha Venta');

// Contenido de la tabla
$data = array();
foreach($ventas as $venta){
    $data[] = array($venta['idVenta'], $venta['nombre_producto'], $venta['nombre_proveedor'], $venta['cantidad'], $venta['total'], $venta['fecha']);
}

// Generar tabla en el PDF
$pdf->BodyTable($header, $data);

// Enviar el PDF al navegador para su descarga
$pdf->Output('D', 'reporte_ventas.pdf');
exit; // Salir del script después de enviar el PDF
?>
