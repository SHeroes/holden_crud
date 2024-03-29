<!DOCTYPE html>
<html lang="es-CL">
  <head>
    <?php 
    	require_once("head.php");
    	require_once("model/db.php");
    ?>
  </head>
  <body>
  	<div class="navbar navbar navbar-inverse navbar-fixed-top">
	  <?php 
	  	require_once("view/nav.php");
	  ?>
	</div>
	<div class="container">
		<h2>Bienvenidos a la aplicación Elija la compañía</h2>
		<h6>Por motivos prácticos no se coloco un Login, pero es lo que correpsondería para separar el uso para cada Compañia diferente</h6>
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
		<form class="form-horizontal" action="index.php" method="get">
			<div class="control-group">
		    	<label class="control-label" for="inputcompany">Nombre de la Compañía</label>
		    	<div class="controls">
		      		<select name="company">
		      			<?php
							$c_companyes = $db->getCollection('companies')->distinct('name');
							foreach ($c_companyes as $key => $company) {
								echo '<option value="'.$company.'">'.$company.'</option>';
							}
						?>
		      		</select>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		      		<button type="submit" class="btn btn-large btn-primary"><i class="icon-user icon-white"></i> Ver Empleados</button>
		    	</div>
		  	</div>
		</form>

		<h3>Lista de Empleados</h3>
		<table class="table table-striped table-bordered">
			<thead>
			    <tr class="tr-head">
			    	<th>Nombre</th>
			    	<th>Apellido</th>
			    	<th>Email</th>
			    	<th>Cargo</th>
			    	<th>Centro Trabajo</th>
			    	<th>Salario</th>
			    	<th>Horas</th>
			    	<th>Acciones</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					//require_once("connect_employees.php");


					if ( isset($_GET["company"]))
					{
						$c_company = $db->getCollection('companies')->find( [ 'name' => $_GET["company"]]);
						
						foreach ($c_company as $entry) {
							
							//echo $entry['_id'].'<br>';
							$employee = $entry['employees'];
							//print_r($entry['employees']);
							
						?><tr><?php	/*									
							            [name] => Pedro
							            [lastName] => Gutierrez
							            [email] => pgut@gmail.com
							            [position] => technical
							            [workingPlace] => Barcelona Office
							            [perfilImageUrl] => 
							            [salary] => 20000
							            [weeklyWorking] => 40			*/
							        ?>
							<td><img src="<?php echo $employee['perfilImageUrl']; ?>" /><?php echo $employee["name"]; ?></td>
							<td><?php echo $employee["lastName"]; ?></td>
							<td><?php echo $employee["email"]; ?></td>
							<td><?php echo $employee["position"]; ?></td>
							<td><?php echo $employee["workingPlace"]; ?></td>
							<td><?php echo $employee["salary"]; ?></td>
							<td><?php echo $employee["salary"]; ?></td>
							<td><a href="mod_employee.php?id=<?php echo $employee['_id'] ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a><a href="eliminar_employee.php?id=<?php echo $employee['_id'] ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
						</tr>
						<?php
						}
							//die();
					}else{
				?>
				<tr>
					<td colspan="4"><h4><i class="icon-info-sign"></i>Elija una compañía</h4></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<footer>
		  <p></p>
		</footer>
	</div> <!-- /container -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>