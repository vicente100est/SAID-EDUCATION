<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM years_academicos WHERE idYearAcademico = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array(
				0 => $valores2['NombreYear'], 
				); 
echo json_encode($datos);
?>