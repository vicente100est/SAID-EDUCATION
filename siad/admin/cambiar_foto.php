
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
                $codigo = $_SESSION["Codigo"];

              $consulta=mysql_query("select Foto from usuarios where Codigo = $codigo");                  
                while($filas=mysql_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
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

    <title>SIAD UNI</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"
     <link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">
</head>

<body>
<?php
    include ('menuAdmin.php');
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
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?>    
              </h5>
               </div> 

            </div>

            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Cambiar Foto</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->

            <!-- Content Column -->
            <div class="col-md-9">
                      <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center>
            <h4><b>Cambio de Foto de Usuario</b></h4>
            </center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
                       <div style="margin-left: : 10px; margin-right: 10px;">
                  <form id="formulario" action="recibir_foto.php" class="form-group" method="post" enctype="multipart/form-data">
            <div class="modal-body">

          <div class="form-group"> <label for="carrera" class="col-md-1 control-label">Foto:</label>
                         <div class="col-md-9">
                      <input type="file" name="foto" id="foto" required="true" class="form-control">
                       </div>
                    </div> <br>
              <div style="margin-top: 10px"> <center><input type="submit" value="Cambiar Foto"  class="btn btn-success" /></center>    </div>         
             </div>         
            </form>
                            </div>
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
