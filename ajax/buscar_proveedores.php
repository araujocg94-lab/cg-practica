<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* conectarse a la bd*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_prov=intval($_GET['id']);
		$query=mysqli_query($con, "select * from compras where id_prov='".$id_prov."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM proveedor WHERE id_prov='".$id_prov."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste  proveedor. Existen compras vinculadas a éste producto. 
			</div>
			<?php
		}

	}
	if($action == 'ajax'){
		// quitar (html/javascript)
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('nombre_prov', 'ci_prov');//Columnas de busqueda
		 $sTable = "proveedor";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by nombre_prov";
		include 'pagination.php'; 
		//Variables de paginacion
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './proveedores.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>Nombre</th>
					<th>CI</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Dirección</th>
					<th>Agregado</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_prov=$row['id_prov'];
						$nombre_prov=$row['nombre_prov'];
						$ci_prov=$row['ci_prov'];
						$telefono_prov=$row['telefono_prov'];
						$email_prov=$row['email_prov'];
						$direccion_prov=$row['direccion_prov'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					
					<input type="hidden" value="<?php echo $nombre_prov;?>" id="nombre_prov<?php echo $id_prov;?>">
					<input type="hidden" value="<?php echo $ci_prov;?>" id="ci_prov<?php echo $id_prov;?>">
					<input type="hidden" value="<?php echo $telefono_prov;?>" id="telefono_prov<?php echo $id_prov;?>">
					<input type="hidden" value="<?php echo $email_prov;?>" id="email_prov<?php echo $id_prov;?>">
					<input type="hidden" value="<?php echo $direccion_prov;?>" id="direccion_prov<?php echo $id_prov;?>">
					
					<tr>
						
						<td><?php echo $nombre_prov; ?></td>
						<td><?php echo $ci_prov; ?></td>
						<td ><?php echo $telefono_prov; ?></td>
						<td><?php echo $email_prov;?></td>
						<td><?php echo $direccion_prov;?></td>
						<td><?php echo $date_added;?></td>

						<?php

                    	$sql_user=mysqli_query($con,"select * from users where user_tipo = 1");
                    	while ($rw=mysqli_fetch_array($sql_user)){
                      	$id_user=$rw["user_id"];
                      	if ($id_user==$_SESSION['user_id']){
                        ?>
					<td ><span class="pull-right">
					<a href="#" class='btn btn-success' title='Editar proveedor' onclick="obtener_datos('<?php echo $id_prov;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 

					<a href="#" class='btn btn-danger' title='Borrar proveedor' onclick="eliminar('<?php echo $id_prov; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span>
					<?php
                      } 
                    }
                  ?>

					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=4><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
					<td colspan=4></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>