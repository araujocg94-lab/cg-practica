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

			if (isset($_FILES["imagefile"])){

				$target_dir="../img/";

				$extension= explode(".",basename($_FILES["imagefile"]["name"]));
				$image_name = $_POST['mod_codigo'].".".$extension[1];

				// $codigo
				$target_file = $target_dir . $image_name;

				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageFileZise=$_FILES["imagefile"]["size"];
				
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
					move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
					$logo_update='img/'.$image_name;			
				}	else { $logo_update="";}
			}
		}
		/* Conectarce a la bd*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// quitar htnl/javascript
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES)));
		// imagen

		$cantidad=intval($_POST['mod_cantidad']);
		$tipo=intval($_POST['mod_tipo']);
		$costo_compra=floatval($_POST['mod_costo']);
		$descuento_venta=floatval($_POST['mod_descuento']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];
		$sql="UPDATE productos SET 
			codigo_producto='".$codigo."',
			nombre_producto='".$nombre."', 
			descripcion_producto='".$descripcion."', 
			imagen_producto='".$logo_update."', 
			cantidad_producto='".$cantidad."', 
			tipo_producto='".$tipo."', 
			costo_producto='".$costo_compra."', 
			descuento_producto='".$descuento_venta."', 
			precio_producto='".$precio_venta."' 
			WHERE id_producto='".$id_producto."'";

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