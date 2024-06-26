<?php
require_once "../views/plugins/fpdf186/fpdf.php";

// Clase PDF que hereda de FPDF
class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',16);
        $this->Cell(0,10,'Reporte de Citas',0,1,'C');
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

// Calcular fecha inicial y final del rango de fechas
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

/// Consulta a la base de datos con el rango de fechas y unión con la tabla clientes y veterinario
$stmt = $dbh->prepare('SELECT c.*, cl.nombre AS nombre_cliente, cl.apellidoPaterno, cl.apellidoMaterno, CONCAT(v.nombreVeterinario, " ", v.apellidoPaterno) AS nombre_veterinario FROM citas c JOIN clientes cl ON c.idCliente = cl.idCliente JOIN veterinario v ON c.idVeterinario = v.idVeterinario WHERE c.fecha_visita BETWEEN :fecha_inicio AND :fecha_final');
$stmt->bindParam(':fecha_inicio', $fecha_inicio);
$stmt->bindParam(':fecha_final', $fecha_final);
$stmt->execute();
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consulta adicional para obtener el nombre de la mascota
$stmtMascotas = $dbh->prepare('SELECT idMascota, nombre FROM mascotas');
$stmtMascotas->execute();
$mascotas = $stmtMascotas->fetchAll(PDO::FETCH_ASSOC);

// Crear un array asociativo para mapear los IDs de las mascotas a sus nombres
$mascotasMap = array();
foreach ($mascotas as $mascota) {
    $mascotasMap[$mascota['idMascota']] = $mascota['nombre'];
}


// Encabezados de la tabla
$header = array('ID', 'Mascota', 'Fecha Visita', 'Motivo', 'Nombre Cliente', 'Veterinario');

// Contenido de la tabla
$data = array();
foreach($citas as $cita){
    $nombreCliente = $cita['nombre_cliente'] . ' ' . $cita['apellidoPaterno'] . ' ' . $cita['apellidoMaterno'];
    $nombreMascota = isset($mascotasMap[$cita['idMascota']]) ? $mascotasMap[$cita['idMascota']] : '';
    $data[] = array($cita['idCitas'], $nombreMascota, $cita['fecha_visita'], $cita['motivo'], $nombreCliente, $cita['nombre_veterinario']);
}

//  tamaño de página personalizado
$pdf = new PDF('L','mm','Letter'); // 'L' para orientación horizontal
$pdf->AliasNbPages();
$pdf->AddPage();

// Generar tabla en el PDF
$pdf->BodyTable($header, $data);

// Enviar el PDF al navegador para su descarga
$pdf->Output('D', 'reporte.pdf');
exit; // Salir del script después de enviar el PDF
?>
