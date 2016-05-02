
<form action="editar_empleado.php" method="POST">
	<!--<label>Id</label><br> -->
	<input hidden name="tipo" value="<?php echo $tipo ?>" /><br>	
	<label>Cedula N°</label><br>
	<input type="text" name="cedula" class="form-control" value="<?php echo $ced; ?>"><br>
	<label>Nombres</label><br>
	<input type="text" name="nombres" class="form-control" value=""><br>	
	<label>Apellidos</label><br>
	<input type="text" name="apellidos" class="form-control" value=""><br>
	<label>Cargo</label><br>
	<input type="text" name="cargo" class="form-control" value=""><br>	
	<label>Dependencia</label><br>
	<input type="text" name="dependencia" class="form-control" value=""><br>	
	<label>Sexo</label><br>
	<select name="sexo" id=""class="form-control">
		<option value="h">Hombre</option>
		<option value="m">Mujer</option>
	</select>	<br>

	<input type="submit" name="action" class="btn btn-primary" value="Guardar" />	

</form>
<h3> <a href="http://localhost:8000/index.php">Cancelar</a></h3>
