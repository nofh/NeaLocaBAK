<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nealoca');

/** MySQL database username */
define('DB_USER', 'nealoca');

/** MySQL database password */
define('DB_PASSWORD', 'nealoca');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'zMfL;]U~xqKC89cdXy^ueb-]gPe!Z~~)PBlQL0Ht~rEI,#HV(k?{_9:)Z{b6D4iV');
define('SECURE_AUTH_KEY',  'K 03Byr1KQHNg^k/e]Wf (`<KeW;y~+S+(U)J~Wn=)Yv0s$~z+gr|-q+cnJBh*vW');
define('LOGGED_IN_KEY',    '!85MAh[4>uoWq=~u4z-Kz_i]0,=:(po;WMv!e#D~UEMBACn+$]wGt_UG{5w-BYjC');
define('NONCE_KEY',        '|_p-a5|!7[Su|=fPTg8@,D[R8f+z?7ydg3J_8.UsQ-}Z(+Xu+$IT^6*X^mDEtg3n');
define('AUTH_SALT',        'zpqH|9S,PCYaGU$9I?Tr+~_NWPVt+-sHon9&1^T,0BaWktS#Uf9=-1 <@luP?o>X');
define('SECURE_AUTH_SALT', '!;!QD*peq:aMfXRIo+o%9|q|m6Z(&_|N|-Kh^upS$<V:5;Yhd7<|u*|^s}_]J(zP');
define('LOGGED_IN_SALT',   'Aq0g_DHe@W {kD+}Ot6|$)c|_(bDJi9Vm{rcq&N&E2dDQ3_;:5kQ%3<a4b7%!PG;');
define('NONCE_SALT',       'Haaw~;8R3n~@0#r$CuPz`p+h>.|0~l!Kse*&8tyF<x1,otP}=$;exJ|1/eX+biu[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nl_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

