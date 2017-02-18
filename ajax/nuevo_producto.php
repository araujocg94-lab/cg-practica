<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['cantidad'])){
			$errors[] = "Cantidad del producto vacía";
		} else if ($_POST['mod_tipo']==""){
			$errors[] = "Selecciona el tipo del producto";
		} else if ($_POST['estado']==""){
			$errors[] = "Selecciona el estado del producto";
		} else if (empty($_POST['precio'])){
			$errors[] = "Precio de venta vacío";
		}else if (empty($_POST['costo'])){
			$errors[] = "Costo de compra vacío";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['cantidad']) &&
			!empty($_POST['costo']) &&
			$_POST['tipo']!="" &&
			!empty($_POST['precio'])
		){
		/* Conectarse a la bd*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// quitar html y javascript
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
		$cantidad=intval($_POST['cantidad']);
		$tipo=intval($_POST['tipo']);
		$costo_compra=floatval($_POST['costo']);
		$descuento_venta=floatval($_POST['descuento']);
		$precio_venta=floatval($_POST['precio']);
		$date_added=date("Y-m-d H:i:s");
		$sql="INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, imagen_producto, cantidad_producto, tipo_producto, date_added, compra, descuento_producto, precio_producto) VALUES ('$codigo','$nombre', '$descripcion', '$imagen','$cantidad','$tipo','$date_added','$costo_compra', '$descuento_venta','$precio_venta')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>