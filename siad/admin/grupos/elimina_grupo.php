<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysql_query("DELETE FROM grupos WHERE idGrupo = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysql_query("SELECT * FROM grupos ORDER BY idGrupo ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                           <th width="40%">Numero de Grupo</th>
                        <th width="40%">Nombre de Grupo</th>            
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		        echo '<tr>
		                    <td>'.$registro2['NumeroGrupo'].'</td>
                      <td>'.$registro2['NombreGrupo'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idGrupo'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idGrupo'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>s>
			         	</tr>';
	}
echo '</table>';
?>