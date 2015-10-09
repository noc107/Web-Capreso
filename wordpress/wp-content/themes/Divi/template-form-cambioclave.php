<?php
/*
Template name: Form Cambio clave
*/
global $wpdb;
session_start();

get_header();

?>

 <link rel="stylesheet" type="text/css" href="\wordpress\wp-content\themes\Divi\template-css\styles.css" />

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">

					<div class="entry-content">

					 <div class='container'>

					<form class="signin" style="max-width:370px;" method="post" enctype="multipart/form-data" action="<?php echo get_home_url();?>/main-login ">
	<h2 class='signin-head'><strong>Cambiar Contraseña</strong></h2>
 					 <input class="signin inputRes" style="width:95%" type="password" name="password1" placeholder="Nueva Contraseña" maxlength="50" required>
 					 <input class="signin inputRes" style="width:95%" type="password" name="password2" placeholder="Confirmar Contraseña" maxlength="50" required>
				    <br>
       				 <button class='btn btn-primary mobile' style="margin-left:17px;" type='submit' name='submit'>Aceptar</button>
       				 <a class="btn btn-danger mobile" style="margin-left:17px;" href="<?php echo get_home_url();?>/main-login">Regresar</a>
</form>
</div>

					</div> <!-- .entry-content -->

		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->


<?php get_footer(); ?>
