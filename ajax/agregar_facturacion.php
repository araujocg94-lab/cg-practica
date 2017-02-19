<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$session_id= session_id();
	if (isset($_POST['id'])){$id=$_POST['id'];}
	if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
	if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}
	if (isset($_POST['descuento'])){$descuento=$_POST['descuento'];}
		/* Connectarce a la base de datos*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectarse a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		
	if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
	{
		$sql_pro="SELECT cantidad_producto FROM productos WHERE id_producto = '$id' ";
		$consult_tmp=mysqli_query($con, $sql_pro);
		while ($row=mysqli_fetch_array($consult_tmp)) {
			echo($row[0]);
			$compara = $row[0];
		}
		if ($cantidad > $compara) {
			echo ("<br>"."asdasdasdas".$compara);
		}else{
			echo (' yo soy menor');
			$sql_tmp="INSERT INTO tmp (id_producto, cantidad_tmp, descuento_tmp, precio_tmp, session_id) VALUES ('$id','$cantidad','$descuento','$precio_venta','$session_id')";
			$insert_tmp=mysqli_query($con, $sql_tmp);
		}
	}

	// echo $sql_tmp;

	if (isset($_GET['id']))//codigo elimina un elemento del array
	{
		$id_tmp=intval($_GET['id']);	
		$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
	}

	?>
	<table class="table">
	<tr>
		<th class='text-center'>CODIGO</th>
		<th class='text-center'>CANT.</th>
		<th>DESCRIPCION</th>
		<th class='text-right'>PRECIO UNIT.</th>
		<th class='text-right'>DESCUENTO.</th>
		<th class='text-right'>PRECIO TOTAL</th>
		<th></th>
	</tr>
	<?php
		$sumador_total=0;
		$sql=mysqli_query($con, "select * from productos, tmp where productos.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
		while ($row=mysqli_fetch_array($sql))
		{
		$id_tmp=$row["id_tmp"];
		$codigo_producto=$row['codigo_producto'];
		$cantidad=$row['cantidad_tmp'];
		$nombre_producto=$row['nombre_producto'];
		
		$descuento=$row['descuento_tmp'];
		$descuento_f=number_format($descuento,2);//Formateo variables
		$descuento_r=str_replace(",","",$descuento_f);//Reemplazo las comas
		
		$precio_venta=$row['precio_tmp'];
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas

		$precio_total=($precio_venta_r*$cantidad)-$descuento_r;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador
		
			?>
			<tr>
				<td class='text-center'><?php echo $codigo_producto;?></td>
				<td class='text-center'><?php echo $cantidad;?></td>
				<td><?php echo $nombre_producto;?></td>
				<td class='text-right'><?php echo $precio_venta_f;?></td>
				<td class='text-right'><?php echo $descuento_f;?></td>
				<td class='text-right'><?php echo $precio_total_f;?></td>
				<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
			</tr>		
			<?php
		}


		// $descuento_cliente=
		$subtotal=number_format($sumador_total,2,'.','');
		$total_iva=($subtotal * TAX )/100;
		$total_iva=number_format($total_iva,2,'.','');
		$total_factura=$subtotal+$total_iva;

	?>
	<tr>
		<td class='text-right' colspan=5>SUBTOTAL </td>
		<td class='text-right'><?php echo number_format($subtotal,2);?>Bs.</td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=5>DESCUENTO CLIENTE </td>
		<td class='text-right'><?php echo number_format($subtotal,2);?>Bs.</td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=5>IVA (<?php echo TAX?>)% </td>
		<td class='text-right'><?php echo number_format($total_iva,2);?>Bs.</td>
		<td></td>
	</tr>
	<tr>
		<td class='text-right' colspan=5>TOTAL </td>
		<td class='text-right'><?php echo number_format($total_factura,2);?>Bs.</td>
		<td></td>
	</tr>

	</table>
