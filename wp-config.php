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
define('DB_NAME', 'wordpress_wordpress');

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
define('AUTH_KEY',         '/c&p>=$#g `.>|DFZ7!&SY4FU *yb9vtJOy;{<-3X PXY&R:pE7Md<Xn(WjHnQ<N');
define('SECURE_AUTH_KEY',  'a5td6Q]-1~>d.4U48`sJ5Yls?:G#.Mr`AtjncIh}ylIsZs#{cA&n EG:nz-&gbCb');
define('LOGGED_IN_KEY',    '4zsLELHGwoV 6YY72/)ZXG`8<*x!yQe#sROUX<ANOdOkbi&^5W7%8F&0J~F:J*rY');
define('NONCE_KEY',        '.UIklsY%P i-t0$figkJ|Xk Y55@:Gh& ]#t54D9?_RF~Tht=0@Y&<2RA[Lc9aca');
define('AUTH_SALT',        '7!bF^YFzR(+RAra_jvNi}EU%-zg~w#LVVDLID }f;ZiK^P*Pe:t.l=2pDJ mC;>Y');
define('SECURE_AUTH_SALT', ';tf4/DEMwcE(BEk+):SJjW+3~yhWj5t:NOp}w1RH,0JtOEMM1$Bv,gXkU~#Rv~z8');
define('LOGGED_IN_SALT',   '7rKWfG0D-;6fVB^8X+l=-~KWmWo2^lWT$fxjRLA&|aaI|l<,Gtsm.}tcKqcotdi5');
define('NONCE_SALT',       'OskQ#Job`CkhA^XR7;hQ^q372Np:IYt,%)Cz}}-P:`6`{B&@ ~F/kcgBGW>EhAj0');

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
