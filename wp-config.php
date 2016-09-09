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
define('DB_NAME', 'word');

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
define('AUTH_KEY',         'N-F$f[|UeP6Gf,b9oq2BtAA0c.=i(_oy){H^:vkxT?L.8hd](u /mWKlw+3~ra3P');
define('SECURE_AUTH_KEY',  'C{^Fxuy` 4{L00%GzFt9 UXaNG]D.!]ZgQo:X%}_lII~1r`HLq)u<BnF)MM)3I`z');
define('LOGGED_IN_KEY',    'US~Gn)9+-U<FKA2q6%:k;=JixWFJY2;:oI+?m{.N5 &CRNK;Xf/8jM;ER=?aF4QX');
define('NONCE_KEY',        '1 3-fFV;~W|+-E6] r:R AsHs$j+=I/ft$I?bZ7&m5$0_bZ>3h69-YD&U;Jehu5.');
define('AUTH_SALT',        '$At[L~)rc|tYaLGO/8t_.ttD_ss|Tf1n y>_,xMaY%LU:K#g0_?-W<0/B[;MCgaP');
define('SECURE_AUTH_SALT', 'HYm,~4nCUPpi:.U|z&vvM^ETz+?t]*!.}d4Mw!Yi&@*2A-X#@|;bwItAFe {~BGJ');
define('LOGGED_IN_SALT',   '}?5Qk6K(^eoW;M!@`EPs^R{73p5LHeLN0s^+ONNJt<bgl^o%T]`{z+>2*82f0Avg');
define('NONCE_SALT',       '!MU)xRz!VIH.=8]*$urYa=o.J|<jLBw6#OfN?KcLED/.oel}R&Te@E3nz$/qF@/1');

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
