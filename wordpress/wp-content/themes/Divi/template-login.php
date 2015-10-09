<?php
/*
Template name: Recibir login
*/
global $wpdb;
session_start();
$home_url = get_home_url();
$cambioDatos=false;
$cambioClave=false;
						if(isset($_POST['username']))
						{
						   $username = $_POST['username'];
                           $password = $_POST['password'];

                           if ($username==$password)
                           {
                           	$results = $wpdb->get_results( "SELECT * FROM web_usuario WHERE cedula ='".$username."' AND password = '".$password."'", OBJECT );
                           }
                           else
                           {
                           	$md5Password = md5($password);
                           	$results = $wpdb->get_results( "SELECT * FROM web_usuario WHERE cedula ='".$username."' AND password = '".$md5Password."'", OBJECT );
                           }

                           
                           if ($results == null)
                           {
                           		$_SESSION["login"]="error";
                           		header("location: ".$home_url."/iniciar-sesion");
                           }
                           else
                           {
                           		foreach ($results as $campo) {
                           		$_SESSION["cedula"] = $username;
                           		$_SESSION["nombre"] = $campo->nombre;
                           		$_SESSION["telefono"] = $campo->telefono;
                           		$_SESSION["correo"] = $campo->correo;
                           		$_SESSION["admin"] = $campo->admin;
                           		}
                           }

                         	 if ($username==$password)
							{
								echo "<script language='javascript' type='text/javascript'>";
								echo " if (window.confirm('Por razones de seguridad te sugerimos que cambies tu contraseña. Para hacerlo ahora presiona Aceptar')) {
        						window.location.href='".$home_url."/cambio-clave';
   								 }";
								echo "</script>";
							}
                         }

                           

get_header();


?>

 <link rel="stylesheet" type="text/css" href="\wordpress\wp-content\themes\Divi\template-css\styles.css" />

<div id="main-content" style="background-color:#ff8c00;">

	<div class="container">
		<div id="content-area" class="clearfix">

					<div class="entry-content" style=" margin: 0 auto; background-color:#ff8c00;">

					<?php

                       	//Si el usuario viene de solicitar un cambio de clave
						if( (isset($_POST['password1'])) && (isset($_POST['password2'])) )
						{
						   $password1 = $_POST['password1'];
                           $password2 = $_POST['password2'];
                           

                           if($password1==$password2)
                           {
                           	$md5Password = md5($password1);
                           	$sql = "UPDATE web_usuario SET password ='".$md5Password."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	$cambioClave=true;

                           }
                        }

                        //Si el usuario viene de solicitar cambio de correo
						if(isset($_POST['nuevocorreo']))
						{
						   $nuevocorreo = $_POST['nuevocorreo'];

                           	$sql = "UPDATE web_usuario SET correo ='".$nuevocorreo."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	$cambioDatos=true;

                           	$_SESSION["correo"]=$nuevocorreo;
                           }

                         //Si el usuario viene de solicitar cambio de correo  	
                           if(isset($_POST['nuevotelefono']))
						{
						   $nuevotlf = $_POST['nuevotelefono'];

                           	$sql = "UPDATE web_usuario SET telefono ='".$nuevotlf."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	$cambioDatos=true;

                           	$_SESSION["telefono"]=$nuevotlf;
                           }



					?>
					<h1 style="padding-left: 10px; margin-top:-40px; color:white; font-size:45px;"><strong>Menú de Usuario</strong></h1>
					&nbsp;
					<?php 

					if ($cambioDatos==true)
                           {
                           	echo "<div class='alert alert-success'><strong>Confirmación:</strong> Información de contacto actualizada correctamente.</div>";
                           	$cambioDatos=false;
                           }

                    //Si las contraseñas no coinciden.	
                           if( (isset($_POST['password1'])) && (isset($_POST['password2'])) )
                           {
                           if($password1!=$password2)
                           {
                           	echo "<div class='alert alert-danger'><strong>Error:</strong> La contraseña y la confirmación no coinciden.</div>";
                           }
                           if ($cambioClave==true)
                           {
                           	echo "<div class='alert alert-success'><strong>Confirmación:</strong> Contraseña actualizada correctamente.</div>";
                           	$cambioClave=false;
                           }
                       }
                           ?>
					<h2 style="padding-left: 50px; color:white;">Consultar estado de cuenta</h2>					
					<p style="padding-left: 70px;">
					<a href="Estado-de-cuenta" class="et_pb_more_button et_pb_button et_pb_button_two" style="color:#ffffff; margin-top:0px; margin-left: 7px;">
					Ir a 'Estado de cuenta'</a></p>

					<h2 style="padding-left: 50px; color:white; margin-top:10px;">Actualizar información de contacto</h2>
					<p style="padding-left: 70px;">
					<a href="modificar-datos" class="et_pb_more_button et_pb_button et_pb_button_two" style="color:#ffffff; margin-top:0px; margin-left: 7px;">
					Ir a 'Modificar datos'</a></p>

					<h2 style="padding-left: 50px; color:white; margin-top:10px;">Cambiar contraseña</h2>
					<p style="padding-left: 70px;">
					<a href="cambiar-contrasena" class="et_pb_more_button et_pb_button et_pb_button_two" style="color:#ffffff; margin-top:0px; margin-left: 7px;">
					Ir a 'Cambiar contraseña'</a></p>

					<h2 style="padding-left: 50px; color:white; margin-top:10px;">Cerrar sesión</h2>
					<p style="padding-left: 70px;">
					<a href="cerrar-sesion" class="et_pb_more_button et_pb_button et_pb_button_two" style="color:red; margin-top:0px; margin-left: 7px;">
					Ir a 'Cerrar sesión'</a></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>


					<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_left  et_pb_text_1">
				
			</div> <!-- .et_pb_text -->



					</div> <!-- .entry-content -->

		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->

<?php get_footer(); ?>