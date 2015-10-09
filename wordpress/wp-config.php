<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'C:\wamp\www\wordpress\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'capreso_web');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'gcE&!OAhkAlQH R~DLh b(|7[to=:U:LwOmHR EZGzPm`3na-B/DZt;{(5I.}&ex');
define('SECURE_AUTH_KEY', 'DfbP*6GbS|;cXA_v+ }`B]>l&_KjuvjKq&y/LX3RL?0nyZ[rPjg;;#os*9t |~PE');
define('LOGGED_IN_KEY', 'ycHIK-TL>e2:Q-x.:>Ur,LNVX-$n7oWWVA(>m$ECb9DabiN1dM:`fH2NYMT7*2bF');
define('NONCE_KEY', '$)Cv]5zT)eZ,O3#B5V$?v3~Y?=PT TBxEcM4tq/5B10.Uu0HofM.fm,<j1ld]{r%');
define('AUTH_SALT', '^&l_?Mnt+hgnUw+EY(@OFm=O6qWfJlU4>,c7_Z$v`U+wr!A1<WY{NBhyI+x=2Fyg');
define('SECURE_AUTH_SALT', '>:qZSh}Z/uX5T:<.Bp6qGExwMvO!b0VM*BE3>9==S{gzy[dP=%EfGWcqo+[-^+e!');
define('LOGGED_IN_SALT', '8,%t?/_;G(]Ilp=t]:f5?&b4Cy-ox2-QR4b}@m8;xY%8eVW?xe(oF_XS3*72sOk ');
define('NONCE_SALT', 'S 6l!b=mO,6JfSc=fB1p6wk9%I[eRS~|6uZi$A3BQ]v:{oki}vQuI0K_Vx;a!xo1');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

