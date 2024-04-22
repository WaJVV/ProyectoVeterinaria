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
        $colWidths = array(); // Ancho de las columnas

        // Encabezado
        foreach($header as $col){
            $colWidths[] = $this->GetStringWidth(utf8_decode($col)) + 6; // Ancho de la columna basado en el texto
        }
        $this->SetWidths($colWidths);
        $this->Row($header);

        // Datos
        foreach($data as $row){
            $this->Row($row);
        }
    }

    function SetWidths($widths){
        $this->widths = $widths;
    }

    function Row($data){
        $nb = 0;
        for($i=0;$i<count($data);$i++)
            $nb = max($nb,$this->NbLines($this->widths[$i],utf8_decode($data[$i])));
        $h = 5*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($data);$i++){
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x,$y,$w,$h);
            $this->MultiCell($w,5,utf8_decode($data[$i]),0,$a);
            $this->SetXY($x+$w,$y);
        }
        $this->Ln($h);
    }

    function NbLines($w,$txt){
        $cw = $this->CurrentFont['cw'];
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',$txt);
        $nb = strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb){
            $c = $s[$i];
            if($c=="\n"){
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep = $i;
            $l += $cw[$c];
            if($l>$wmax){
                if($sep==-1){
                    if($i==$j)
                        $i++;
                } else
                    $i = $sep+1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function CheckPageBreak($h){
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
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
    $data = array();
    foreach($proveedores as $proveedor){
        $data[] = array($proveedor['idProducto'], $proveedor['producto'], $proveedor['proveedor']);
    }
    

    // Generar tabla en el PDF
    $pdf->BodyTable($header, $data);

    // Enviar el PDF al navegador para su descarga
    $pdf->Output('D', 'reporte_proveedores_por_proveedor.pdf');
    exit; // Salir del script después de enviar el PDF
}
?>