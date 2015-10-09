<?php
/*
Template name: Form Cambio datos
*/
global $wpdb;
session_start();
$correo = $_SESSION ["correo"];
$telefono = $_SESSION["telefono"];

get_header();

?>

 <link rel="stylesheet" type="text/css" href="\wordpress\wp-content\themes\Divi\template-css\styles.css" />

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">
					<div class="entry-content">

					 <div class='container'>

					<form method="post" class="signin" enctype="multipart/form-data" action="<?php echo get_home_url();?>/main-login ">
  <h2 class='signin-head'><strong>Modificar Datos</strong></h2>
  <input type="email" class="signin inputRes" name="nuevocorreo" value="<?php echo $correo;?>" maxlength="100">
  <input type="text" class="signin inputRes" name="nuevotelefono" value="<?php echo $telefono;?>" maxlength="15">
  <button class='btn btn-primary mobile' type='submit' name='submit'>Aceptar</button>
       				 <a class="btn btn-danger mobile" href="<?php echo get_home_url();?>/main-login">Regresar</a>
</form>
</div>
					</div> <!-- .entry-content -->
		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->


<?php get_footer(); ?>
