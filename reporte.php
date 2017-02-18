<?php
	/* conectarse a la bd*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_clientes="active";
	$title="Clientes";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	<div class="espacio">
    <div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-search'></i> Reporte ventas</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post"  id="datos_reporte">
			<div class="form-group">
			<label for="fec_inic" class="col-sm-3 control-label">Fecha inicio</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" name="fecha_inicio">
				</div>
			</div>
			<div class="form-group">
			<label for="fec_inic" class="col-sm-3 control-label">Fecha inicio</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" name="fecha_fin">
				</div>
			</div>
			<div class="form-group">
			<div class="col-md-2 col-md-offset-5">
			<button type="submit" class="btn btn-success" id="generar_reporte">Generar reporte</button>
			</div>
			</div>
			</form>

  </div>
</div>
		 
	</div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
  </body>
</html>
