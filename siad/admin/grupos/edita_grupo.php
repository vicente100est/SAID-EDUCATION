<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM grupos WHERE idGrupo = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['NumeroGrupo'], 
				1 => $valores2['NombreGrupo'], 
				); 
echo json_encode($datos);
?>