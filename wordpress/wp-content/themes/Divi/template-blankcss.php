<?php
/*
Template Name: css sin barra
*/

get_header();
 ?>

 <link rel="stylesheet" type="text/css" href="\wordpress\wp-content\themes\Divi\template-css\styles.css" />


<div id="main-content">


	<div class="container">
		<div id="content-area" class="clearfix">
			
					<div class="entry-content">

 <div class='container'>
      <div class="<?php echo $alerta; ?>">
	  <?php
	  	if(isset($_SESSION['error']))
		{
	   echo $_SESSION['error'];
      unset($_SESSION['error']);
		}?></div>
      <form class='signin' method='POST' action='validar_login.php'/>
        <h2 class='signin-head'><strong>Iniciar Sesión</strong></h2>
        <input class='signin' type='text' name='username' placeholder='Cédula' required>
        <input class='signin' type='password' name='password' placeholder='Contraseña' required>
     <br>
        <button class='btn btn-primary' type='submit' name='submit'>Aceptar</button>
        <a class="btn btn-danger" href="index.php">Regresar</a>

      </form>
    </div>

					</div> <!-- .entry-content -->

		</div> <!-- #content-area -->
	</div> <!-- .container -->


</div> <!-- #main-content -->

<div id="footer">
<?php get_footer(); ?>
</div>