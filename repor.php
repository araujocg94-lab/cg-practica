      
<?php 
require ("reporte.php"); 
?>

<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-green{
	background:#277c22;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>

<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "Inverciones Ronmiguel, C.A "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
            </td>

			
        </tr>
    </table>
    <br>

 <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-green'>FECHA</th>
            <th style="width: 10%;text-align:center" class='midnight-green'>COMPRA N°</th>
            <th style="width: 10%;text-align:center" class='midnight-green'>PROVEEDOR</th>
            <th style="width: 15%;text-align: right" class='midnight-green'>COSTO</th>
            
        </tr>
<?php
$nums=1;
$sumador_total=0;
if (isset($_POST['generar_reporte'])) {
	$fecha_ini=$_POST['fecha_inic'];
	$fecha_fin=$_POST['fecha_fin'];
	$sql="SELECT * FROM compras WHERE fecha_compra BETWEEN  $fecha_ini AND $fecha_fin";
	$consulta=mysqli_query($con, $sql);
	echo($sql);
	while ($row=mysqli_fetch_array($$consulta))
		{
			$id=$row["id_compra"];
			$numero=$row["numero_compra"];
			$fecha=$row['fecha_compra'];
			$porv=$row['id_prov'];
			
			$costo_compra=$row['total_compra'];
			$costo_compra_f=number_format($costo_compra,2);//Formateo variables
			$costo_compra_r=str_replace(",","",$costo_compra_f);//Reemplazo las comas

			$sumador_total+=$costo_compra_r;//Sumador
			if ($nums%2==0){
				$clase="clouds";
			} else {
				$clase="silver";
			}
			?>

		        <tr>
		            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $fecha;?></td>
		            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $numero;?></td>
		            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $porv;?></td>
		            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $costo_compra_r;?></td>
		            
		        </tr>

			<?php 
			//Insert en la tabla detalle_cotizacion
			
			$nums++;
		}
		
}
	$total=number_format($sumador_total,2,'.','');

?>
	  
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL Bs. </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total,2);?></td>
        </tr>

    </table>