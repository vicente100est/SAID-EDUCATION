
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];

switch($proceso){
	case 'Registro': mysql_query("INSERT INTO turnos (NombreTurno) VALUES('$nombre')");
	break;
	case 'Edicion': mysql_query("UPDATE turnos SET NombreTurno = '$nombre' where idTurno = '$id'");
	break;
   }
    $registro = mysql_query("SELECT * FROM turnos ORDER BY idTurno ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                        <th width="80%">Nombre del Turno</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                      <td>'.$registro2['NombreTurno'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idTurno'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idTurno'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                </tr>';
  }
	
   echo '</table>';
?>