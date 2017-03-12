<?php
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre'])) {
           $errors[] = "Ingrese Nombre del cliente";
  	 } else if (empty($_POST['ci'])){
			$errors[] = "Ingrese cedula o Rif del cliente";
        } else if (
        	!empty($_POST['nombre']) &&
			!empty($_POST['ci'])
        	){

		/* conectarse a la bd*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// Quitar html/javascript
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$ci=mysqli_real_escape_string($con,(strip_tags($_POST["ci"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$date_added=date("Y-m-d H:i:s");
		// checar si el codigo existe
		 $sql = "SELECT * FROM clientes WHERE ci_cliente = '" . $ci . "';";
           $query_check_ci = mysqli_query($con,$sql);
		   $query_check=mysqli_num_rows($query_check_ci);
         if ($query_check == 1) {
         	   $errors[] = "Cedula o RIF ya existe.";
                } else {
		$sql="INSERT INTO clientes (nombre_cliente, ci_cliente, telefono_cliente, email_cliente, direccion_cliente, date_added) VALUES ('$nombre','$ci','$telefono','$email','$direccion','$date_added')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
				?>
			<script> $("#guardar_cliente")[0].reset();</script>
				<?php
			} else{
				$errors []= "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
			}
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