
<h1></h1>
<form action="editar_turno.php" method="POST">
	<label>Tipo de registro</label><br>
	<input type=hidden name="id" value="<?php echo $id ?>;" />
	<input type="submit" name="tipo_turno" class="btn btn-primary" value="Entrada" />	
	<input type="submit" name="tipo_turno" class="btn btn-primary" value="Salida" />
</form>
<h3> <a href="http://localhost:8000/index.php">Cancelar</a></h3>


