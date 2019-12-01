<!DOCTYPE html>
<html lang="es-CL">
  <head>
    <?php 
    	require_once("head.php");
    ?>
  </head>
  <body>
  	<div class="navbar navbar navbar-inverse navbar-fixed-top">
	  <?php 
	  	require_once("nav.php");
	  ?>
	</div>
	<div class="container">
		<h2>Bienvenidos a la aplicación realizada con MongoDB y PHP</h2>
		<p class="text-info">En esta app podremos listar, agregar, modificar y eliminar Empleados.</p><br><br>
		<?php
			error_reporting(0);
			$mensaje = $_GET["mensaje"];
			if ($mensaje == 1) {
				echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El employee fue eliminado con éxito.</p><br><br>";
			}
			if ($mensaje == 2) {
				echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> El employee fue guardado con éxito.</p><br><br>";
			}
			if ($mensaje == 3) {
				echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El employee fue modificado con éxito.</p><br><br>";
			}
		?>
		<form class="form-horizontal" action="add_employee.php" method="post">
		  	<div class="control-group">
		    	<label class="control-label" for="inputNameemployee">Nombre del Empleado</label>
		    	<div class="controls">
		      		<input type="text" name="nameemployee" id="inputNameemployee" class="input-xlarge" placeholder="Nombre del employee"/>
		    	</div>
		  	</div>
			<div class="control-group">
		    	<label class="control-label" for="inputcompany">Nombre del company</label>
		    	<div class="controls">
		      		<select name="company">
		      			<?php
							require_once("connect_companyes.php");

							if ($c_companyes->count()>0)
							{
								$companyes = $c_companyes->find();
								foreach ($companyes as $company) {
						?>
						<option value="<?php echo $company['nombre'] ?>"><?php echo $company['nombre'] ?></option>
						<?php 
								}
							}else{
						?>
						<option value="Sin company">Sin company</option>
						<?php } ?>
		      			
		      		</select>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<label class="control-label" for="inputcompany">Breve descripción del employee</label>
		    	<div class="controls">
		      		<textarea name="descripcion" rows="6" class="input-xlarge"></textarea>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		      		<button type="submit" class="btn btn-large btn-primary"><i class="icon-book icon-white"></i> Guardar employee</button>
		    	</div>
		  	</div>
		</form>

		<h3>Lista de employee almacenados</h3>
		<table class="table table-striped table-bordered">
			<thead>
			    <tr class="tr-head">
			    	<th>Nombre del employee</th>
			    	<th>company</th>
			    	<th>Descripción</th>
			    	<th>Modificar</th>
			    	<th>Eliminar</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					require_once("connect_employees.php");

					if ($c_employees->count()>0)
					{
						$employees = $c_employees->find();
						foreach ($employees as $employee) {
						
				?>
				<tr>
					<td><?php echo $employee["nombre"]; ?></td>
					<td><?php echo $employee["company"]; ?></td>
					<td><?php echo $employee["descripcion"]; ?></td>
					<td><a href="mod_employee.php?id=<?php echo $employee['_id'] ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a></td>
					<td><a href="eliminar_employee.php?id=<?php echo $employee['_id'] ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
				</tr>
				<?php
						}
					}else{
				?>
				<tr>
					<td colspan="4"><h4><i class="icon-info-sign"></i> Sin registros en la Base de Datos</h4></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<footer>
		  <p>Desarrollado por @JuanGarciaR</p>
		</footer>
	</div> <!-- /container -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>