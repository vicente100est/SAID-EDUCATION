<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM horarios WHERE idHorario = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreHorario'], 
				); 
echo json_encode($datos);
?>