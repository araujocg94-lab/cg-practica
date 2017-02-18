<?php
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_nombre'])) {
           $errors[] = "Nombre vacío";
        }  else if (empty($_POST['mod_ci'])) {
           $errors[] = "CI vacío";
        }  else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_ci']) 
		){
		/* conectarse a la bd*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// Quitar html/javascript
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$ci=mysqli_real_escape_string($con,(strip_tags($_POST["mod_ci"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["mod_telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["mod_email"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_direccion"],ENT_QUOTES)));

		
		$id_prov=intval($_POST['mod_id']);
		$sql="UPDATE proveedor SET nombre_prov='".$nombre."', ci_prov='".$ci."', telefono_prov='".$telefono."', email_prov='".$email."', direccion_prov='".$direccion."' WHERE id_prov='".$id_prov."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Proveedor ha sido actualizado satisfactoriamente.";
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