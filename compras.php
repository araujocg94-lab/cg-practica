<?php
	$active_compras="active";	
	$title="Compras";
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
		    <div class="btn-group pull-right">
				<a  href="nueva_compra.php" class="btn btn-success"><span class="glyphicon glyphicon-plus" ></span> Nueva compra</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar compra</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-3 control-label">Provedor o # de compra</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del proveedor o # de compra" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-success" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/compras.js"></script>
  </body>
</html>-