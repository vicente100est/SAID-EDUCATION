<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$dato = $_POST['dato'];

$registro = mysql_query("SELECT  material_didactico.idMaterialDidactico AS id, material_didactico.idDocente as idDocente, material_didactico.Descripcion AS Descripcion, material_didactico.Archivo as Archivo, material_didactico.CodigoMaterial as Codigo, material_didactico.Fecha_Subida as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM material_didactico INNER JOIN numeros_asignaciones ON material_didactico.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
where material_didactico.idDocente = '$codigo' and material_didactico.Descripcion LIKE '%$dato%' ORDER BY material_didactico.idMaterialDidactico ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        
                        <th width="15%">Descripcion</th> 
                        <th width="15%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysql_num_rows($registro)>0){
	     while($registro2 = mysql_fetch_array($registro)){
		      echo '<tr>
                          
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="material_didactico/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
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
