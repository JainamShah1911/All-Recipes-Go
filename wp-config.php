<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'allrecipe');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'U.-mLr*R-Igd39?S=WhRrLx@7`{V Ma@DPtW#!WL$2!Gw Q6DJeksc#6Y?{;R+9m');
define('SECURE_AUTH_KEY',  're[VN]MY[W1/|v&m@baY1jt]#Y?QSzb:==kN38J!(K42U29uy_c= 3tVRbC0,wnc');
define('LOGGED_IN_KEY',    'Hl<Ll~QMcJhBqnTb.=]U>s8acqH%8ho5k+fpgrS-.%5Gpt*6_?>3?.AWAnR9sek}');
define('NONCE_KEY',        ';2/w*(JGy*N%ga#BQtci3?nH&VY9jb>SK3/Y5#gv|^Do1PT@YZ^+-mk]*fJ~SfXe');
define('AUTH_SALT',        'e4WnUy3;o~!h~[h&jG3{0Jh2<kPvV$65wComJc%( Q!Y0Q/vGeX+D^RRJR6<$sB>');
define('SECURE_AUTH_SALT', 'qjg$=. 7Fp_JNQ5&Cn[:CjTBJzrgBNF9tva&<:_|`{pImTTNL44PI]GkG6M^%cog');
define('LOGGED_IN_SALT',   'n=U[MH>CK{ nJ9bX,1BD ^)YXsp/:QPrO$>RAV_Ygo(Pri;9_n1$LK|GgKyJF#q~');
define('NONCE_SALT',       'E#*I/#&LIqlK)ev>eMpdY|Bt/r,bcY.i>{A=V.sgGSwi4i|N$f I8MD&6T.D`x69');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
