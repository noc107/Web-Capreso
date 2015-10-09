<?php
/*
Template name: Form Login
*/
global $wpdb;
session_start();

get_header();

?>

 <link rel="stylesheet" type="text/css" href="\wordpress\wp-content\themes\Divi\template-css\styles.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div id="main-content">

	<div class="container">
		<div id="content-area" class="clearfix">

		<?php if ($_SESSION["login"]=="error")
		{
							echo "<div class='alert alert-danger alert-position'><strong>Error:</strong> Usuario o contraseña inválido.</div>";
							$_SESSION["login"]="";
		}
		else 
		{
			echo "<div class='alert alert-warning alert-position'> 
			<strong>Nota:</strong> Si es tu primer acceso la contraseña será tu número de cédula.&nbsp;
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
		}
					?>

					<div class="entry-content">

						 <div class='container'>
					
					<form class="signin" method="post" enctype="multipart/form-data" action="<?php echo get_home_url();?>/main-login ">
					<h2 class='signin-head'><strong>Iniciar Sesión</strong></h2>
 					 <input class="signin inputRes" type="text" name="username" placeholder="Cédula" maxlength="10" required>
 					 <input class="signin inputRes" type="password" name="password" placeholder="Contraseña" maxlength="50" required>
				    <br>
       				 <button class='btn btn-primary mobile' type='submit' name='submit'>Aceptar</button>
       				 <a class="btn btn-danger mobile" href="<?php echo get_home_url();?>">Regresar</a>
					</form>
					</div>



					</div> <!-- .entry-content -->

		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->
<?php get_footer(); ?>

