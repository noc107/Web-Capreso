<?php
/*
Template name: Main after login
*/
global $wpdb;
session_start();
$home_url = get_home_url();
              

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );



//Mensaje de alerta si la clave es igual a la cedula
if(isset($_POST['username']))
{
	if ($username==$password)
		{
			echo "<script language='javascript' type='text/javascript'>";
			echo " if (window.confirm('Por razones de seguridad te sugerimos que cambies tu contraseña. Para hacerlo ahora presiona Aceptar')) {
        			window.location.href='".$home_url."/cambio-clave';
   				 }";
			echo "</script>";
		}
}


?>

<div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

					<h1 class="main_title"><?php the_title(); ?></h1>
				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">
					<?php
						the_content();

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					<?php

                       	//Si el usuario viene de solicitar un cambio de clave
						if( (isset($_POST['password1'])) && (isset($_POST['password2'])) )
						{
						   $password1 = $_POST['password1'];
                           $password2 = $_POST['password2'];
                           

                           //Si las contraseñas no coinciden.	
                           if($password1!=$password2)
                           {
                           	echo "Error: La contraseña no coincide con la confirmación. <br>";
                           }
                           else
                           {
                           	$md5Password = md5($password1);
                           	$sql = "UPDATE web_usuario SET password ='".$md5Password."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	echo "Contraseña cambiada exitosamente. <br>";
                           }
                        }

                        //Si el usuario viene de solicitar cambio de correo
						if(isset($_POST['nuevocorreo']))
						{
						   $nuevocorreo = $_POST['nuevocorreo'];

                           	$sql = "UPDATE web_usuario SET correo ='".$nuevocorreo."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	echo "Correo actualizado correctamente. <br>";

                           	$_SESSION["correo"]="";

                           	$_SESSION["correo"]=$nuevocorreo;
                           }

                         //Si el usuario viene de solicitar cambio de correo  	
                           if(isset($_POST['nuevotelefono']))
						{
						   $nuevotlf = $_POST['nuevotelefono'];

                           	$sql = "UPDATE web_usuario SET telefono ='".$nuevotlf."' WHERE cedula ='".$_SESSION["cedula"]."'";

                           	$rez = $wpdb->query($sql);

                           	echo "Teléfono actualizado correctamente. <br>";

                           	$_SESSION["telefono"]="";

                           	$_SESSION["telefono"]=$nuevotlf;
                           }
					?>
					</div> <!-- .entry-content -->

				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

<?php endif; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>