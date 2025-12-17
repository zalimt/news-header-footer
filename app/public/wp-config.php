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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '3<QN3N;Dr4M5$E2F0Q]0K}k<kz?k;1?6RnMASAE?/AV[]9@p^V5TGpM;kw0}Si3<' );
define( 'SECURE_AUTH_KEY',   '5Ot{%B^/D#|WmJ#5Wb>)$_;}x].Z.U}}V6K;PL`>>Ee>$/}J]q9tLkkS7,v*L1Sg' );
define( 'LOGGED_IN_KEY',     '((p[B,BAu r{l`@K-t4th}0WeJ6ndBn{J^AeeN7wnqqx-*oW|/z?Tc@3h}RT3}x:' );
define( 'NONCE_KEY',         '[=IqK6di?RjHM&Ak3`nM[COa3_S&fC[I[-`n]r7ki?wa.ot4js4u5/yl^q-Zj0KK' );
define( 'AUTH_SALT',         '$SjTVeTgr]O1##jM-9v?8,j8ve`qX.Li,[,eO!5_;:t&|x8DyNib*?qzSqu?@5+)' );
define( 'SECURE_AUTH_SALT',  '@b?#$t84Fg;Y=X;!4E9dDx0CD8O04y6vqBD52|fs$_0-+[R<,r@IX,8} {m[ tT#' );
define( 'LOGGED_IN_SALT',    ']XFC7&QZL;7E;zUNyc{u4gn8s-O&EKX@_o=%`~WjC0.?g=1IRW,/3sI| A1vZ.8{' );
define( 'NONCE_SALT',        '[T(*;{ByGn;o4k|@ZZIv50~}MVCx(xpC$meyYcq<IY]7bCs2_v1c??ct<dQU;1dx' );
define( 'WP_CACHE_KEY_SALT', '+h%mdOq^Pv*Zw!}HwswGW>J[*+y,,$n{LFd~drzD<=EB{E~N(~ CfBKw^y0,,A@~' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
