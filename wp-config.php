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
define( 'DB_NAME', 'filancy' );

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
define( 'AUTH_KEY',         'VMp/A06I:(?N]{.aF]>aK]ZR/tZl(i1)5pB*)Qt8 i@JK/%I2LGBXZ|GPP)1^Pxk' );
define( 'SECURE_AUTH_KEY',  '.y]WZ w;SpcRVDr4lB.5)Dse[;hp;,2?;Yns<=e6w[vFFusZ8s ,W8T_J5pewBzo' );
define( 'LOGGED_IN_KEY',    '^L^$6c3NSU+0xK.zbH0XrVp^N/fOS]gq&lV-`y5AipkClr@|$E+KH>>~gKoC>v7D' );
define( 'NONCE_KEY',        'NgRqV45rsn_hV=a`;n.&*Klm7|PDk+Q?sJ*>`]Yw0cOhnfJn8>X7yk2)XS+ka;&w' );
define( 'AUTH_SALT',        'IZOD+2nvbUcqGp(+U,YfwR?ec[c6l1$<5g6DDb9~93=XaCr4AwKvD0a=(p(d&gS#' );
define( 'SECURE_AUTH_SALT', ' &UW7CZk.3h{t{pQ$jw4+$~s@(N[%qxk&ych=0$GDBNy<96T;rVm&-[]8#@%~kp.' );
define( 'LOGGED_IN_SALT',   '5!j>u;q~o{rrOZ~{*3NOSNZmW%V;,`[]u> n{eQC]bCSd,wt]B^v`f<X[2~oceFm' );
define( 'NONCE_SALT',       '-rzgH)M_,q87A%zk;H=CMLXE2(eWU%(DaC ?Fk~#jtp|l%WxB.*?7|ES=;ew(2cB' );

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
