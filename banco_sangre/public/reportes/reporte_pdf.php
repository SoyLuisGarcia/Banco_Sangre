<?php

require("../fpdf/fpdf.php");
require_once "../config/database.php";

$db = $conexion;

$sql = "SELECT * FROM citas";
$stmt = $db->query($sql);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Reporte de citas');

$pdf->Ln();

while($row = $stmt->fetch()){

$pdf->Cell(40,10,$row['id']);
$pdf->Cell(40,10,$row['fecha']);
$pdf->Ln();

}

$pdf->Output();

?>