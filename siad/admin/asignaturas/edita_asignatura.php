<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM asignaturas WHERE idAsignatura = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreAsignatura'], 
				1 => $valores2['Idcarrera'], 
                 2 => $valores2['IdGrupo'], 
                 3 => $valores2['Idcuatrimestre'], 
				); 

echo json_encode($datos);
?>