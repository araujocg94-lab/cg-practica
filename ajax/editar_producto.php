<?php
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['mod_cantidad'])) {
           $errors[] = "Cantidad vacía";
        } else if ($_POST['mod_tipo']==""){
			$errors[] = "Selecciona el tipo del producto";
		}  else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_cantidad']) &&
			$_POST['mod_tipo']!="" &&
			!empty($_POST['mod_precio'])
		){
		/* Conectarce a la bd*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// quitar htnl/javascript
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES)));
		// imagen
		$imagen=intval($_POST['mod_imagen']); 
		$cantidad=intval($_POST['mod_cantidad']);
		$tipo=intval($_POST['mod_tipo']);
		$costo_compra=floatval($_POST['mod_costo']);
		$descuento_venta=floatval($_POST['mod_descuento']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];
		$sql="UPDATE productos SET codigo_producto='".$codigo."', nombre_producto='".$nombre."', descripcion_producto='".$descripcion."',imagen_producto='".$imagen."', cantidad_producto='".$cantidad."', tipo_producto='".$tipo."', costo_producto='".$costo_compra."', descuento_producto='".$descuento_venta."', precio_producto='".$precio_venta."' WHERE id_producto='".$id_producto."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
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