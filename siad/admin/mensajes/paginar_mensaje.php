<?php
include('../conexion.php');
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysql_num_rows(mysql_query("SELECT * FROM mensajes"));
    $nroLotes = 10;
    $nroPaginas = ceil($numeroRegistros/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';

    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$registro = mysql_query("SELECT * FROM mensajes LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        <th width="20%">Remitente</th>  
                       <th width="20%">Correo</th> 
                       <th width="20%">Mensaje</th>  
                       <th width="20%">Fecha Envio</th>         
                        <th width="20%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysql_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                              <td>'.$registro2['Remitente'].'</td>
                              <td>'.$registro2['correo'].'</td>
                               <td>'.$registro2['Mensaje'].'</td>
                                <td>'.$registro2['FechaEnvio'].'</td>
                       <td><a href="javascript:eliminarRegistro('.$registro2['idMensaje'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                              </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>