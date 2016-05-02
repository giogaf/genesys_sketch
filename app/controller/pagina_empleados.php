

<?php
	require_once 'config.php';
	include_once('../model/Empleado.php');    
	include ('../template/header.php');
	
	$ced= $_POST['cedula'];
	$tipo=$_POST['tipo'];
	

	$empleado = new Empleado(); 			   
    $empleados = $empleado->find("cedula=".$ced);
    if( isset($empleados[0]) )
    {
    	$id=$empleados[0]->id;
    	include_once('../template/forma_turno.php');
    }
    else
    {
    	include_once('../template/forma_empleado.php');
    }    


?>

<?php
include_once('../template/footer.php');
?>



