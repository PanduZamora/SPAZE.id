<<<<<<< HEAD
<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'spaze_blog' );

/** MySQL database username */
define( 'DB_USER', 'spaze_blog' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Jz2j8FsZ6TyTD6P3' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SfFVf29mUoRk,UJuZ,H5m~{[z`lmRR_LPiB]mf(h?reR1vRnOkdHR%H{|x$8}(rz' );
define( 'SECURE_AUTH_KEY',  'lh:{6Qu|1s/wvlZ=!-xJ;EO_%}Y2JRWV$pmqn(,G:}ndlL6@;d]JI8TNq0}OTrq;' );
define( 'LOGGED_IN_KEY',    'ZzWr/Mm,4qi9FTDCwjSw?3kVAK.62=&>U_fx9N@{l9M_K`%#,MWMUv,Ig;<uKIeN' );
define( 'NONCE_KEY',        'u^DMFF7t16JaHAG8BlfZqD4EF*9SMf1H*;,H&PCeEEf 2T~M~N$?sR,p(fqU,9F+' );
define( 'AUTH_SALT',        'J`pb99#Be y/`8Y[Zo*! du:t*<c{[V;$dGs{q:r~DMgZn*C050qD$]M/3&wQ7Yn' );
define( 'SECURE_AUTH_SALT', 'Zwx]1gH)<X/;2fH`b]y=(sxr?FvawY^9ek~+PB@Wq&UD(0EJULiOYFG$.E+/*qL>' );
define( 'LOGGED_IN_SALT',   'Y}m%H6|Rha7rH}9$)@WF#yy`WW+PhF?0;gHa-I|2TzN.x6;ZK4*#de)?o_pwoAgm' );
define( 'NONCE_SALT',       '`dhll}b*mC)5Xg2=#:hy5t@(NwV!!8+U|G E)q^bnUtFNzVb~xA-:@X=.te^1s@#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
=======
<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'spaze_blog' );

/** Database username */
define( 'DB_USER', 'spaze_blog' );

/** Database password */
define( 'DB_PASSWORD', 'j4hJsYXzMRmrieFt' );

/** Database hostname */
define( 'DB_HOST', '' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h~4K9kzzY[6&B~v$qY37EBtC:.>,x~tTjzu(V69TFzY>1by4WZ!x&#D ]-j<,/[2' );
define( 'SECURE_AUTH_KEY',  'SKU#duRMDb]:q|eg@K2^*0UPS*Ok<.}r%HR6+}mu}Kx>:5j&oJ)D0I=*>7$ Qs}n' );
define( 'LOGGED_IN_KEY',    'l]BpunA4D^HO-PA&h=#N?nG3ej8OT3r448tXG4[B,maK_WI(|.AqlF*|2qyB*gYN' );
define( 'NONCE_KEY',        '!VRVJQuk6>~-?_<vSR<:M&AT?-w=G`D/%gStN YKFLGX1#]t7j~Y7Q~ItG48%HP5' );
define( 'AUTH_SALT',        'DmTOl-tjq= e]f&37p13Js.3TOm_(A5&1m+ X+F7B.YKlI2bJCS96&Dbm?6OiOP=' );
define( 'SECURE_AUTH_SALT', 'A PzR4;ssI^3#ySm!/}^ATt[V#i|sOfvEHYP1E6Noxw=uNrIbsV7q{s2e/WeS?U4' );
define( 'LOGGED_IN_SALT',   '8U=]B8WPFtP}6?U0Je5qS:2,YcYb-m|^FnDqM(*!|~EoloTa)VX *xisKl&+5pI9' );
define( 'NONCE_SALT',       '+z~)42391+xw<>DIwr.MJ&)E3=D)}ca~h__(h_fNG3jWJ$%cbd-xow^I59#$Rgh6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
>>>>>>> 74fb2cee (update)
