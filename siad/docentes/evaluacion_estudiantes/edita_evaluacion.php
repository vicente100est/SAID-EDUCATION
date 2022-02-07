<?php
include('../../admin/conexion.php');
$id = $_POST['id'];
$valores = mysql_query("SELECT * FROM evaluaciones WHERE idEvaluacion = '$id'");
$valores2 = mysql_fetch_array($valores);
$datos = array( 
				0 => $valores2['Descripcion'], 
		        1 => $valores2['idEstudiante'], 
		        2 => $valores2['idAsignatura'], 
		        3 => $valores2['Unidad'], 
		        4 => $valores2['Tarea'],
		        5 => $valores2['Puntaje'],
		        6 => $valores2['FechaEvaluacion'],
				); 

echo json_encode($datos);
?>