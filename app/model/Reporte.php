<?php
require_once("../../vendors/fpdf181/fpdf.php");

class Reporte extends FPDF{

function  titulo($x=0,$y=0,$t=''){

$this->SetFont('Arial','B',16);
$this->Cell(80);
$this->Cell($x,$y,$t,'B',1,'C');

}

function  dato($x=0,$y=0,$t='',$negrita='',$size=12, $tipo='Arial'){

$this->SetFont($tipo,$negrita,$size);
$this->Cell($x,$y,utf8_decode($t),0,1,'L');

}



}

?>