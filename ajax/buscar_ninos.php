<?php
	/* Conectarse a la bd*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
	if($action == 'ajax'){
		// quitar html/javascript 
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('codigo_producto', 'nombre_producto');//Columnas de busqueda
		 $sTable = "productos";
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
		$sWhere.=" order by id_producto desc";
		include 'pagination.php'; 
		//Variables de paginacion
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 12; //catidad de registro mostrados
		$adjacents  = 4; //brecha entre paginas adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas en la tabla
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './ninos.php';
		//consulta para odtener datos
		$sql="SELECT * FROM  $sTable Where tipo_producto= '1' or tipo_producto='0' LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//enlazar datos odtenidos
		if ($numrows>0){
			
			?>
			  <div class="row">
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$codigo_producto=$row['codigo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$descripcion_producto=$row['descripcion_producto'];
						$imagen_producto=$row['imagen_producto'];
						$cantidad_producto=$row['cantidad_producto'];
						$tipo_producto=$row['tipo_producto'];
						if ($tipo_producto==1){$tipo="niño";}
						elseif ($tipo_producto==2) { $tipo="caballero";} 
						elseif ($tipo_producto==3) { $tipo="dama";} 
						else {$tipo_producto="Unisex";}
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$descuento_producto=$row['descuento_producto'];
						$precio_producto=$row['precio_producto'];
						$total=$precio_producto-$descuento_producto;
					?>
					
  					<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $imagen_producto; ?>" class="img-thumbnail">
                             <hr>
                            <div class="caption">
                                <h4 class="pull-right"><?php echo number_format($total,2);?>Bs.</h4>
                                <?php
                            		if ($descuento_producto > 0) {
                            	?>
                            		<h5 class="pull-right"><strike><?php echo number_format($precio_producto,2);?>Bs.</strike></h5>	
                            	<?php
                           			 }
                           		 ?>
                                <h4><?php echo $nombre_producto; ?></h4>
                                <p><?php echo $descripcion_producto; ?> </p>
                            </div>
                        </div>
                    </div>
					<?php
				}
				?>
			</div>
			<div class="col-md-4 col-md-offset-5"">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?>
				</div>
			<?php
		}
	}
?>