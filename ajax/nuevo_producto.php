<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
		if (empty($_POST['codigo'])) {
	           $errors[] = "Código vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['cantidad'])){
			$errors[] = "Cantidad del producto vacía";
		} else if ($_POST['tipo']==""){
			$errors[] = "Selecciona el tipo del producto";
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

			if (isset($_FILES["imagen"])){

				$target_dir="../catalogo/";

				$extension= explode(".",basename($_FILES["imagen"]["name"]));
				$image_name = $_POST['codigo'].".".$extension[1];

				// $codigo
				$target_file = $target_dir . $image_name;

				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageFileZise=$_FILES["imagen"]["size"];
				
				$logo_update="";	
				
				/* Inicio Validacion*/
				// Allow certain file formats
				if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) and $imageFileZise>0) {
				$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
				} else if ($imageFileZise > 4194304) {//1048576 byte=1MB
				$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 1MB</p>";
				}  else {
				/* Fin Validacion*/
				if ($imageFileZise>0){
					if (file_exists($target_file)) {
						unlink($target_file);
					}
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
					$logo_update='catalogo/'.$image_name;			
				}	else { $logo_update="";}
			}
		}
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

		$sql="INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, imagen_producto, cantidad_producto, tipo_producto, date_added, costo_producto, descuento_producto, precio_producto) VALUES ('$codigo','$nombre', '$descripcion', '$logo_update','$cantidad','$tipo','$date_added','$costo_compra', '$descuento_venta','$precio_venta')";
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

// }
?>