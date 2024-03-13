<?php
define( 'WP_CACHE', true );
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'w.baumli-saal.ch' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'i X:R-E[`fXsPzniA_Ht=A_OV`d4j[p5Hfr0Mj:jwTR,]6(|PU<sO;0MvqCP,Y&4' );
define( 'SECURE_AUTH_KEY',  'Z1wBjvz u&!S6E6Yf8Aj6M0dA&JZp|6q1@5%vf/7)oug2+r=8O?(9s$Ialj!;07J' );
define( 'LOGGED_IN_KEY',    'kWs~M0mUx+S1_CQtw,MTZmkrU.#B}u#D?EkS|{7gDzOhIM&dK6PAB1S&0b#k^N/B' );
define( 'NONCE_KEY',        'D|Bj /HoXPPK>|?Z<ipXlYX3llZ>- ^pPkR7}G~Gi(`*/.fnYz?W>zMuV(b`^=I3' );
define( 'AUTH_SALT',        'Na<UBMsE]6?d!<jJh./HmrI:&8%>DuiHLwx(BFVzwg)RBKj3JW&i-ezl#i]Cvob>' );
define( 'SECURE_AUTH_SALT', '/:sy*z4SuN>v|D&[I.q^0sDt>l84~1v ySY*gp_1mqGO99AjOR=H/Y//[Gzuqyn!' );
define( 'LOGGED_IN_SALT',   '`8bs-u#6oMu4m+gVcwvc?icZiy<>%3x9&z} ?-#+/:P tWxJYX ]9n~qiEiF^r7M' );
define( 'NONCE_SALT',       'cJZ(GGkl`4U>+<gyL=gB*~e02&iJ eGMf@n+7iP%n3U5,wECE<`rO?@@<^I(Nb2`' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
