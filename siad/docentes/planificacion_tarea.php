<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
        ?>
           <?php 
          $consulta2="SELECT asignaturas.idAsignatura as ID, asignaturas.NombreAsignatura as Asignatura FROM asignaciones 
  INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura
where idDocente = $codigo and asignaciones.Estado = 1"; 
          $asignatura=mysql_query($consulta2);
          $consulta3="select idNumeroAsignacion, numeroAsignado from numeros_asignaciones";
          $numeros=mysql_query($consulta3);

           $consultaD=mysql_query("select Foto from docentes where idDocente = $codigo");                  
                while($filas=mysql_fetch_array($consultaD)){
                         $foto=$filas['Foto'];                           
                 }

                 $consultaD2 = mysql_query("select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysql_fetch_array($consultaD2)){
                         $docente=$filas2['Docente'];                           
                 }
         
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIAD</title>
     <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="planificacion_tareas/myjava.js"></script>

</head>
<body>
           <?php
        include ('menu_inicio_docente.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/banerDoc.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $docente ?></h5>
               </div> 

            </div>
              <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="docentes.php">Docentes</a></li>
                    <li class="active">Planificacion de Tareas</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
                        <?php
    include('../docentes/menu_docente.php');
 ?>
            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Administracion de Planificaciones de Tareas</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               
                   <div class="col-md-5">
		                  <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escriba el Codigo de la Tarea">
		               </div>
		               	<div class="col-md-6">
		                  <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nueva Planificacion</button> 
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
include('../admin/conexion.php');
    $numeroRegistros = mysql_num_rows(mysql_query("SELECT * FROM planificacion_tareas where idDocente = $codigo"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#d9534f; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-align-justify'></i>&nbsp;&nbsp;Planificacion de Tareas</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-4 control-label">Proceso:</label>
				<div class="col-md-8"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
			   </div> <br>
   
                     <div class="form-group"> <label for="carrera" class="col-md-4 control-label">Numero Asignacion:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="numero" name="numero">
                     <?php 
                          while($fila=mysql_fetch_row($numeros)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                    <div class="form-group"> <label for="cuatrimestre" class="col-md-4 control-label">Asignatura:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="asignatura" name="asignatura">
                     <?php 
                          while($fila=mysql_fetch_row($asignatura)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                      <div class="form-group"> <label for="cuatrimestre" class="col-md-4 control-label">Unidad:</label>
                         <div class="col-md-8">
                       <select class="form-control" id="unidad" name="unidad">
                               <option>Unidad I</option>
                               <option>Unidad II</option>
                               <option>Unidad III</option>
                               <option>Unidad IV</option>
                               <option>Unidad V</option>
                               <option>Unidad VI</option>
                      </select>
                       </div>
                    </div> <br>
                    
                <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Descripcion Unidad:</label>
                     <div class="col-md-8">
                     <textarea name="descripcionU" id="descripcionU" required="true" class="form-control" rows="2"></textarea>
                     </div>
               </div> <br>

                <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Tarea:</label>
        <div class="col-md-8"><input type="text" class="form-control" id="tarea" name="tarea" required maxlength="50"></div>
         </div> <br>

         <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Descripcion Tarea:</label>
                     <div class="col-md-8">
                     <textarea name="descripcionT" id="descripcionT" required="true" class="form-control" rows="2"></textarea>
                     </div>
               </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Fecha Presentacion:</label>
        <div class="col-md-8"><input type="date" class="form-control" name="fecha" id="fecha" required="true"></div>
         </div> <br>


                    <div class="form-group"> <label for="carnet" class="col-md-4 control-label">Codigo Tarea:</label>
        <div class="col-md-8"><input type="number" class="form-control" name="codigo" id="codigo" required maxlength="50"></div>
         </div> <br><br><br><br>

                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
        <hr>
    </div>
    <?php
    include('../includes/footer.php');
 ?>
</body>
</html>
<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../login.php"; </script>';
}
?>
