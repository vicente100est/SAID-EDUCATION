
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];

switch($proceso){
	case 'Registro': mysql_query("INSERT INTO years_academicos (NombreYear) VALUES('$nombre')");
	break;
	case 'Edicion': mysql_query("UPDATE years_academicos SET NombreYear = '$nombre' where idYearAcademico = '$id'");
	break;
   }
    $registro = mysql_query("SELECT * FROM years_academicos ORDER BY idYearAcademico ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                        <th width="80%">Año Academico</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                      <td>'.$registro2['NombreYear'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idYearAcademico'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idYearAcademico'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                </tr>';
  }
	
   echo '</table>';
?>