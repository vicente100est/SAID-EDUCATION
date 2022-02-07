
<?php session_start(); ?>

		<?php
			include '../admin/conexion.php';
			if(isset($_POST['usuario'])){
				
				$usuario = htmlentities(mysql_real_escape_string($_POST['usuario']));
				$pw = htmlentities(mysql_real_escape_string($_POST['password']));

			//	$numero = srand((double)microtime()*1000000);

				$log = mysql_query("SELECT * FROM usuarios WHERE NombreUsuario='$usuario' AND PassUsuario='$pw'");
				if (mysql_num_rows($log)>0) {
					$row = mysql_fetch_array($log);

					$_SESSION["NombreUsuario"] = $row['NombreUsuario']; 
				  	$_SESSION["NivelUsuario"] = $row['NivelUsuario']; 
				  	$_SESSION["Codigo"] = $row['Codigo']; 
				  	if ($_SESSION["NivelUsuario"] == 1) {
				  		echo '<script> window.location="../admin/admin.php"; </script>';
				  	}
					  	  elseif ($_SESSION["NivelUsuario"] == 2) {
					  	 	echo '<script> window.location="../docentes/docentes.php"; </script>';
					  	 }

							 else {
						  	 	echo '<script> window.location="../estudiantes/estudiantes.php"; </script>';
						  	 	echo $numero;
						  	 }
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos. ");</script>';
					echo '<script> window.location="../login.php"; </script>';
				}
			}
		?>	
