	<?php
		if (isset($con))
	$query_empresa=mysqli_query($con,"select * from productos where id_producto=1");
	$row=mysqli_fetch_array($query_empresa);
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Imagen producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" enctype="multipart/form-data" id="imagen_producto"  name="imagen_producto">
			<div id="resultados_ajax2"></div>
				<input type="text" name="$id_producto" id="$id_producto" >
                <div class=" form-group" align="center"> 
				<div id="load_img">
					<img class="img-responsive" src="<?php echo $row['imagen_producto'];?>" alt="Logo">
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
							<div class="form-group">
							   <input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
							</div>
						</div>
					</div>
				</div>

		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-success" id="actualizar_imagen">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	</div>
	<?php
		}
	?>