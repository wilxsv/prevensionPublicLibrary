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
define('DB_NAME', 'pl4t4f0rm4');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'pl4t4f0rm4');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '20j?9yn$IBNj/2U');

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
define('AUTH_KEY', 'j@@L8?Iu~[>V]zb4WL]KK{D5x~yXymQP# LigeT1A>TZ@to%1t6Nf+D>?7.g?~lI');
define('SECURE_AUTH_KEY', ';B ?!w#mZKmPZ~v_Ui@_y]|s?=g=KYd+OJ% |++sJZJsl,#&9+g+iLq~(/I--d-G');
define('LOGGED_IN_KEY', 'kgKqr;*_evgI[;jJ=rB1lQ!w9*Q]w=V^Wdz] ,v;nVOC@Bpho&CkL^i$2@`-YY5X');
define('NONCE_KEY', '(xHM62!Gz+Fl{g3.HLds6e.jhP+?_W,zm5`0f8|/W~8u4;~;fBm|y6no07w+Y<))');
define('AUTH_SALT', '(FcX97-|A:~Q856-t%2w||Fl~2G[DC(+;4vB<7mjbx!zIC m#:j9E2X;=$).EAo3');
define('SECURE_AUTH_SALT', '`@+o UP_S}2L-Mf Bm`E,h->[=Y|aVP._xM-=+reFY}+X6|?6mPtP;hw;-++Ka(M');
define('LOGGED_IN_SALT', '^|r5S*tr@t#dG_Ly[uhz6|-d}=lr{,eGqgR+ZtgT2 I7*{_A-deg)U-Y-2IF}D/&');
define('NONCE_SALT', 'dW)bY{8)gW*+OI7P$`1+(8|x-+vcQ7A.-f[]<ko@:Uq(*/rVa 1nfQN>{aX~f3^h');

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


