<?php

	require_once 'config.php';
	include_once('../model/Empleado.php');
	include_once('../model/Dependencia.php');
	$empleado = new Empleado();
	$nd= new Dependencia();
	$d_post= $_POST['dependencia'];
	$dependencias=$nd->find("id<30");
	//print_r($dependencias[1]);
	$id_dep=null;
	if(isset($dependencias)){
		foreach ($dependencias as $dep) {
			if($dep->nombre == $d_post){
				$id_dep=$dep->id;
			}
		}
		if(!$id_dep){
			$nd->nombre=$d_post;
			$nd->replace();
			$id_dep=$nd->id;			
		}		
	}	
	$empleado->cedula=$_POST['cedula'];
	$empleado->nombres=$_POST['nombres'];
	$empleado->apellidos=$_POST['apellidos'];	
	$empleado->cargo=$_POST['cargo'];	
	$empleado->id_dependencia=$id_dep;
	$empleado->sexo=$_POST['sexo'];
	$empleado->tipo=$_POST['tipo'];		
	$empleado->save();
	
	echo "data empleado Guardada.";
	

?>
<script>
	window.location.assign("http://localhost:8000/index.php");
</script>
