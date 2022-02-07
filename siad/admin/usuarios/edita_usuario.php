<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM usuarios WHERE idUsuario = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				 
				0 => $valores2['NombreUsuario'], 
			    1 => $valores2['PassUsuario'], 
				2 => $valores2['NivelUsuario'], 
				3 => $valores2['Codigo'], 
				); 
echo json_encode($datos);
?>