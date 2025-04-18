<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mysite10' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'maloj2209' );

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
define( 'AUTH_KEY',         '@F#NL2)0E+{L.(*[!v#hJr[|2OYo36<m/Y#$s;))_qz,4xE~-Z0|su6Qfgvnjv}^' );
define( 'SECURE_AUTH_KEY',  'N(%GA{zb]hCRdN2vUQdpNX<[t?A!CV$`hZ>[a`s,;_c.&lzr^Lph.sH{#f=(MF,a' );
define( 'LOGGED_IN_KEY',    '-fXia{kX$B[X)fKRe2#?WCR;A$sM#xM;f%7J>^ZX[v6nssz[acu_)-$drPPof<iV' );
define( 'NONCE_KEY',        'Sfis1_=mE^gy:)oV7!2[:|Dz^=,|YXAPe3&Z:={zSc<*j|ADps<O!-{NB-%(v_7y' );
define( 'AUTH_SALT',        'v(wKM[3uup{.T=_UqP}a:vu~4RK,OcP*7h,TN-H$YJ}{%f}S+_MWAEDMtGjLyc4?' );
define( 'SECURE_AUTH_SALT', 'Jmp=*hU`Tt.cYQ:OWpVY[,B=ah,XbyQkEt&{u[Xc|($Em^k_DMFDW&v9!?)xcc2T' );
define( 'LOGGED_IN_SALT',   'Pq84?tY G?fY7%:>]?L.>0D^!W|?B*yGzTrrc58hp1Tf#6ndTuGj,b#H{qK:y~cl' );
define( 'NONCE_SALT',       'enNT4k61{]1B+--o{r_5]Z*{h&aJ_ZeVU@^6Ltm$lVsy(Of>byHR%bG.C+}EC0!J' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
