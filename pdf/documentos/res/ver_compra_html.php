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
			<td style="width: 25%;text-align:right">
			COMPRA Nº <?php echo $numero_compra;?>
			</td>
			
        </tr>
    </table>
    <br>
    
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:20%;" class='midnight-green'>COMPRADO A</td>
           <td style="width:20%;" class='midnight-green'>CI</td>
           <td style="width:20%;" class='midnight-green'>DIRECCION</td>
           <td style="width:20%;" class='midnight-green'>TELEFONO</td>
           <td style="width:20%;" class='midnight-green'>E-MAIL</td>
        </tr>
		<tr>
           <td style="width:20%;" >
			<?php 
				$sql_prov=mysqli_query($con,"select * from proveedor where id_prov='$id_prov'");
				$rw_prov=mysqli_fetch_array($sql_prov);
				echo $rw_prov['nombre_prov'];
			?>
			
		   </td>
		   	<td style="width:20%;"><?php echo $rw_prov['ci_prov'];?></td>
		    <td style="width:20%;"><?php echo $rw_prov['direccion_prov'];?></td>
		    <td style="width:20%;"><?php echo $rw_prov['telefono_prov'];?></td>
		    <td style="width:20%;"><?php echo $rw_prov['email_prov'];?></td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-green'>COMPRADOR</td>
		  <td style="width:25%;" class='midnight-green'>FECHA</td>
		   <td style="width:40%;" class='midnight-green'>FORMA DE PAGO</td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['nombre']." ".$rw_user['apellido'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_compra));?></td>
		   <td style="width:40%;" >
				<?php 
				if ($condiciones==1){echo "Efectivo";}
				elseif ($condiciones==2){echo "Cheque";}
				elseif ($condiciones==3){echo "Transferencia bancaria";}
				elseif ($condiciones==4){echo "Crédito";}
				?>
		   </td>
        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-green'>CANT.</th>
            <th style="width: 60%" class='midnight-green'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-green'>COSTO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-green'>COSTO TOTAL</th>
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from productos, detalle_compra, compras where productos.id_producto=detalle_compra.id_producto and detalle_compra.numero_compra=compras.numero_compra and compras.id_compra='".$id_compra."'");

while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['nombre_producto'];
	
	$costo_compra=$row['costo_compra'];
	$costo_compra_f=number_format($costo_compra,2);//Formateo variables
	$costo_compra_r=str_replace(",","",$costo_compra_f);//Reemplazo las comas
	$costo_total=$costo_compra_r*$cantidad;
	$costo_total_f=number_format($costo_total,2);//COSTO total formateado
	$costo_total_r=str_replace(",","",$costo_total_f);//Reemplazo las comas
	$sumador_total+=$costo_total_r;//Sumador
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $costo_compra_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $costo_total_f;?></td>
            
        </tr>

	<?php 

	
	$nums++;
	}
	$subtotal=number_format($sumador_total,2,'.','');
	$IVA=($subtotal * TAX )/100;
	$IVA=number_format($IVA,2,'.','');
	$total_compra=$subtotal+$IVA;
?>
	  
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL Bs. </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">IVA (<?php echo TAX; ?>)% </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($IVA,2);?></td>
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL Bs. </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_compra,2);?></td>
        </tr>
    </table>


</page>

     <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "INVERSIONES RONMIGUEL, C.A "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>