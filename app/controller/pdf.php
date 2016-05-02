<?php
require_once('config.php');
require_once('../model/Reporte.php');
require_once('../model/Empleado.php');
require_once('../model/Dependencia.php');
	$tab_empleados        = 'empleados';
	$whereOrderBy = "";
	$empleados = $db->getActiveRecords($tab_empleados, $whereOrderBy);

	$tabla_turnos        = 'turnos';
	$whereOrderBy = "";
	$turnos = $db->getActiveRecords($tabla_turnos, $whereOrderBy);
// personas ingresaron por dependencia
function ingresosGeneral($db,$empleados,$turnos)
{
	$array[]='';
	foreach ($turnos as $turno) {
		foreach ($empleados as $empleado) {
			if($empleado->id == $turno->id_empleado){
				$d= $empleado->nombres." ".$empleado->apellidos." ".$turno->dia." ".$turno->tipo_turno." ".$turno->hora;				
				array_push($array, $d);
			}
		}
	
	}
	
	return $array;

}
// personas ingresaron por dependencia
function ingresosDependencia($db,$empleados)
{

	$array[]='';
	$tab_dependencias        = 'dependencias';
	$whereOrderBy = "";
	$dependencias = $db->getActiveRecords($tab_dependencias, $whereOrderBy);

	foreach ($dependencias as $dep) {
		foreach ($empleados as $empleado) {
			if($empleado->id_dependencia == $dep->id){
				$d= $dep->nombre."   ".$empleado->nombres."".$empleado->apellidos;
				array_push($array, $d);
			}
		}
	
	}
	return $array;
}
// // personal misional que ingreso tipo 1=admin,2=mision,3=visit
function ingresostipo($db,$empleados,$tipo)
{
	$array[]='';
		foreach ($empleados as $empleado) {
			if($empleado->tipo == $tipo){
				$d=$empleado->nombres." ".$empleado->apellidos;
				array_push($array, $d);
				 
			}
		}
		return $array;	
}




// personal administrativo que ingreso
// personal visitante.
//ingresoso por cedula
$pdf = new Reporte();

$pdf->AddPage();
$pdf->titulo(30,10,'Ingresos/salidas General');
$todos=ingresosGeneral($db,$empleados,$turnos);
foreach ($todos as $t) {
	$pdf->dato(10,5,$t);

}

$pdf->titulo(30,10,'Ingresos/salidas por Dependencia');
$deps=ingresosDependencia($db,$empleados);
foreach ($deps as $d) {
	$pdf->dato(10,5,$d);
}


$pdf->titulo(30,10,utf8_decode('Ingresos/salidas Administración'));
$adm=ingresostipo($db,$empleados,1);
foreach ($adm as $t) {
	$pdf->dato(10,5,$t);
}

$pdf->titulo(30,10,utf8_decode('Ingresos/salidas Misional'));
$mis=ingresostipo($db,$empleados,2);
foreach ($mis as $t) {
	$pdf->dato(10,5,$t);
}

$pdf->titulo(30,10,utf8_decode('Ingresos/salidas Visitantes'));
$vis=ingresostipo($db,$empleados,3);
foreach ($vis as $t) {
	$pdf->dato(10,5,$t);
}

$pdf->Output();

?>
