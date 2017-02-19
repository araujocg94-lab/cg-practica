	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" enctype="multipart/form-data" id="editar_producto  name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required></textarea>
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_descripcion" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_descripcion" name="mod_descripcion" placeholder="Descripción del producto" required></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_imagen" class="col-sm-3 control-label">Imagen</label>
				<div class="col-sm-8">
				  <input type="file"  id="mod_imagen" name="mod_imagen">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_cantidad" class="col-sm-3 control-label">Cantidad</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_cantidad" name="mod_cantidad" placeholder="Cantidad del producto" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_tipo" class="col-sm-3 control-label">Tipo</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="0" selected>Unisex</option>
					<option value="2">Dama</option>
					<option value="3">Caballero</option>
					<option value="1">niño</option>
				  </select>
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_costo" class="col-sm-3 control-label">Costo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_costo" name="mod_costo" placeholder="Costo de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_descuento" class="col-sm-3 control-label">Descuento</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_descuento" name="mod_descuento" placeholder="Descuento de venta del producto" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-success" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>