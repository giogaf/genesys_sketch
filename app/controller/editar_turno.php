<?php
	require_once 'config.php';
	include_once('../model/Turno.php');
	include_once('../model/Empleado.php');
	$id=$_POST['id'];
	$turno = new Turno();
	$empleado = new Empleado() ;
	$empleados = $empleado->find('id='.$id);
	//print_r($empleados);
	$turno->id_empleado = $empleados[0]->id;
	//$fechaHora= new DateTime('NOW');
	$turno->dia= date('Y-m-d');//$fechaHora->format('Y-m-d');
	$turno->hora=date('H:i:s');//$fechaHora->format('h-i-s A');

	if($_POST['tipo_turno'] == 'Entrada')		
		$turno->tipo_turno = 'e';
	else
		$turno->tipo_turno = 's';
	$turno->replace();


	echo "data turno Guardado.";
	

?>
<script>
	window.location.assign("http://localhost:8000/index.php");
</script>
