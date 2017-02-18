<?php
if (isset($_GET['term'])){
include("../../config/db.php");
include("../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM proveedor where ci_prov like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_prov=$row['id_prov'];
		$row_array['value'] = $row['ci_prov'];
		$row_array['id_prov']=$id_prov;
		$row_array['nombre_prov']=$row['nombre_prov'];
		$row_array['ci_prov']=$row['ci_prov'];
		$row_array['telefono_prov']=$row['telefono_prov'];
		$row_array['email_prov']=$row['email_prov'];
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>