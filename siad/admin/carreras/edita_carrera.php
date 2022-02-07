<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM carreras WHERE idCarrera = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreCarrera'], 
				); 
echo json_encode($datos);
?>