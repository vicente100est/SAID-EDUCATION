<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysql_query("DELETE FROM estudiantes WHERE idEstudiante = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysql_query("SELECT * FROM estudiantes ORDER BY idEstudiante ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                           <th width="10%">Carnet</th>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="10%">Cedula</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Telefono</th>
                         <th width="10%">Direccion</th>
                         <th width="5%">Estado</th> 
                         <th width="5%">Grupo</th>            
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		        echo '<tr>
		                  <td>'.$registro2['CarnetEstudiante'].'</td>
                      <td>'.$registro2['NombresEstudiante'].'</td>
                      <td>'.$registro2['ApellidosEstudiante'].'</td>
                      <td>'.$registro2['CedulaEstudiante'].'</td>
                       <td>'.$registro2['CorreoEstudiante'].'</td>
                      <td>'.$registro2['CelularEstudiante'].'</td>
                      <td>'.$registro2['TelefonoEstudiante'].'</td>
                      <td>'.$registro2['DireccionEstudiante'].'</td>
                      <td>'.$registro2['Estado'].'</td>
                        <td>'.$registro2['IdGrupo'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idEstudiante'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idEstudiante'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
			         	</tr>';
	}
echo '</table>';
?>