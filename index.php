
<?php
include ('app/template/header.php');
?>

<form action="app/controller/pagina_empleados.php" method="POST">
	<label>Ingrese Número de cédula</label><br>
	<input type="text" name="cedula" class="form-control" value="" /><br>		
	<label>Seleccione tipo de vinculación</label><br>
	<select name="tipo" id="" class="form-control">
		<option value="1">Administrativo</option>
		<option value="2">Misional</option>
		<option value="3">Visitante</option>
	</select>	<br>
	<input type="submit" class="btn btn-primary" name="action" />	
	
</form>

<?php
include_once('app/template/footer.php');
?>
