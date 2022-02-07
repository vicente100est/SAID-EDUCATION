<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM numeros_asignaciones WHERE idNumeroAsignacion = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['numeroAsignado'], 
				1 => $valores2['IdDocente'], 
				); 

echo json_encode($datos);
?>