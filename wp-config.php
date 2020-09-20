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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'abraza' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'k^8>5*-d]#U*8?/3I+5 US6<k3ks_z--f)NG2y_}j84+D8Dvw<!B(HCu5G;Bd)|A' );
define( 'SECURE_AUTH_KEY',  'YwC0:nEeD%};D29S]vg0,S9d)+X~C*T2[gf=.X4|Nr,b>k(83DLM+@nW{voSCq}~' );
define( 'LOGGED_IN_KEY',    'i*CPgG_[Yye5Id7KO<DQJGT]3{ylm(7zjvK~.A}_0,`>3~wBx>)C:DJoJUx>%Oi=' );
define( 'NONCE_KEY',        '~vxFga6z4a*?CN$EP3-xbfFO8LSx[wuHb-`L:nKobuerT>[Z=51889:-?R$$^=;~' );
define( 'AUTH_SALT',        '+}]/5!13<kTGSu[M s(AC`FD1;=&C{}e#;O:nC,J*Z9B.{:-]G*SE:pD]e7t<MG^' );
define( 'SECURE_AUTH_SALT', ' @6=3)&:Yj./&GYRw52*f*X{{d-Z$K}GQ%Aukd ($_S`Z~O[B%hH-l%~[XD3 H&M' );
define( 'LOGGED_IN_SALT',   'x$`O2/*yD!v{XW+~[3w Z]f$|w,^bm2vEd53]T.?kQ+t.rr}aF3Wjwp52xkuh74q' );
define( 'NONCE_SALT',       '_>cWM($,/tqc[9gU&HRcy(ER:X!5O~1-E:sEtGDm4NKd<r0,KwBK&x ^q6:K0f?=' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
