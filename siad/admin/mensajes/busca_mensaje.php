<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysql_query("SELECT * FROM mensajes WHERE Remitente LIKE '%$dato%' ORDER BY idMensaje ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="20%">Remitente</th>  
                       <th width="20%">Correo</th> 
                       <th width="20%">Mensaje</th>  
                       <th width="20%">Fecha Envio</th>         
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysql_num_rows($registro)>0){
	     while($registro2 = mysql_fetch_array($registro)){
		      echo '<tr>
                              <td>'.$registro2['Remitente'].'</td>
                              <td>'.$registro2['correo'].'</td>
                               <td>'.$registro2['Mensaje'].'</td>
                                <td>'.$registro2['FechaEnvio'].'</td>
                       <td><a href="javascript:eliminarRegistro('.$registro2['idMensaje'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                              </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
