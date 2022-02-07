
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysql_query("select Foto from docentes where idDocente = $codigo");                  
                while($filas=mysql_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysql_query("select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
                 while($filas2=mysql_fetch_array($consulta2)){
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"
</head>

<body>
<?php
include ('menu_inicio_docente.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
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
                    <li class="active">Docentes</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <?php
include ('menu_docente.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h3>Docente conectado : <b style="color:green;"><?php echo $docente; ?></b></h3>
                <p>En esta seccion del sistema usted podra administrar los alumnos que le fueron asignados en la direccion o por el administrador. Usted podra enviar tareas a sus alumnos asi como talbien evaluar dichas tareas, ver reportes, entregar material de estudio, entre otras cosas.</p>

                  <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">                 
                              <img src="../imagenes/docente1.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Material Didactico para estudiantes</h4>
                        <a href="material_didactico.php" class="btn btn-primary"> <i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="../imagenes/docente2.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Planificacion de Tareas</h4>
                        <a href="planificacion_tarea.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>  Entrar</a>
                    </div>
                </div>
            </div>

             <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                               <img src="images/tareas.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Tareas de Estudiantes</h4>
                        <a href="ver_tarea_estudiante.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                               <img src="../imagenes/docente3.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Pantalla de Evaluaciones</h4>
                        <a href="evaluacion_estudiantes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                             <img src="../imagenes/docente4.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Pantalla de Reportes</h4>
                        <a href="pantalla_reportes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
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
