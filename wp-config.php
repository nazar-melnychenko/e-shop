<?php
define('WP_CACHE', true); // Added by WP Rocket
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'e-Shop' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@%|7]pF0&sW^He8fE<$3wPVL-IQ4MN+%6w3oB|-mDRa:2?3_tq-ueH&Q!6m2v{@&' );
define( 'SECURE_AUTH_KEY',  'g:Bsew9{iNC(;(>/W$#uHt<9en@Hz(h=0Q`8s68avwvd[Hg*t5;b)[+pCUQu2/Wj' );
define( 'LOGGED_IN_KEY',    '.Xad;C,;UwWuj)J,M9@ph&R[|dYXMeNBms:ds~i0+)x%5]oG.FSzNUl-RHRm3_%S' );
define( 'NONCE_KEY',        'D7Ls35&tdBnp@wYC%vi%6:k{iaL>FMLz]-[$C5!!1i_Ps039ZAt~e,JLo&4B~lYj' );
define( 'AUTH_SALT',        '43sC7*SC|w/j[?7<|~J^xqExFmf`Bxcc7EfEH:N5EPnA5udpH+RqP9_mVc>-t.t=' );
define( 'SECURE_AUTH_SALT', '^Z0Rfs:*:%7.Iwzp|Ri+2O9<m~.<%r,G ,TM^{.OvLFB|W-vjA]u72`624er5b73' );
define( 'LOGGED_IN_SALT',   'OcGM(kQ) zmJn7sf!@SXhDj n`dE#5hM:$Uic}~S=n1^/7<rpiyo4t0(IXATC?sB' );
define( 'NONCE_SALT',       'XRqWx[n7$4NCOqV5K~>k%V.}!IJ8XLFyO[9 z]_+hnUL6(QqGZ8==9O;d@5d!0wX' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
