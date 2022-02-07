
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$nivel = $_POST['nivel'];
$codigo = $_POST['codigo'];

switch($proceso){
case 'Registro': mysql_query("INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES('$nombre','$pass','$nivel','$codigo', 'images/fotos_perfil/perfil.jpg')");

	break;
	case 'Edicion': mysql_query("UPDATE usuarios SET NombreUsuario = '$nombre', PassUsuario = '$pass', NivelUsuario = '$nivel', Codigo = '$codigo' where idUsuario = '$id'");
    
	break;
   }
    $registro = mysql_query("SELECT * FROM usuarios ORDER BY idUsuario ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                       <th width="20%">Nombre Usuario</th>
                         <th width="20%">Contraseña</th>
                         <th width="20%">Nivel usuario</th>
                         <th width="20%">Codigo</th>            
                        <th width="20%">Opciones</th>
            </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		echo '<tr>
                              <td>'.$registro2['NombreUsuario'].'</td>
                                <td>'.$registro2['PassUsuario'].'</td>
                                <td>'.$registro2['NivelUsuario'].'</td>
                                 <td>'.$registro2['Codigo'].'</td>
                               <td> <a href="javascript:editarRegistro('.$registro2['idUsuario'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idUsuario'].');">
                              <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>