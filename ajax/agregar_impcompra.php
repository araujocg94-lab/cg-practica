<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['costo_compra'])){$costo_compra=$_POST['costo_compra'];}
	/* Connectarce a la base de datos*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectarse a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
if (!empty($id) and !empty($cantidad) and !empty($costo_compra))
{
	$insert_tmp=mysqli_query($con, "INSERT INTO tmp_compra (id_producto,cantidad_tmp,costo_tmp,session_id) VALUES ('$id','$cantidad','$costo_compra','$session_id')");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
	$id_tmp=intval($_GET['id']);	
	$delete=mysqli_query($con, "DELETE FROM tmp_compra WHERE id_tmp='".$id_tmp."'");
}

?>
<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCION</th>
	<th class='text-right'>COSTO UNIT.</th>
	<th class='text-right'>COSTO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from productos, tmp_compra where productos.id_producto=tmp_compra.id_producto and tmp_compra.session_id='".$session_id."'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	
	
	$costo_compra=$row['costo_tmp'];
	$costo_compra_f=number_format($costo_compra,2);//Formateo variables
	$costo_compra_r=str_replace(",","",$costo_compra_f);//Reemplazo las comas
	$costo_total=$costo_compra_r*$cantidad;
	$costo_total_f=number_format($costo_total,2);//costo total formateado
	$costo_total_r=str_replace(",","",$costo_total_f);//Reemplazo las comas
	$sumador_total+=$costo_total_r;//Sumador
	
		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td class='text-right'><?php echo $costo_compra_f;?></td>
			<td class='text-right'><?php echo $costo_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * TAX )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_compra=$subtotal+$total_iva;

?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL </td>
	<td class='text-right'><?php echo number_format($subtotal,2);?>Bs.</td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo TAX?>)% </td>
	<td class='text-right'><?php echo number_format($total_iva,2);?>Bs.</td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL </td>
	<td class='text-right'><?php echo number_format($total_compra,2);?>Bs.</td>
	<td></td>
</tr>

</table>
