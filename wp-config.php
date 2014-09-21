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

$vcap = getenv('VCAP_SERVICES');
$vcap_json = json_decode($vcap,true);
$vcap_arr = $vcap_json['cleardb'][0];

/** The name of the database for WordPress */
define('DB_NAME', $vcap_arr['credentials']['name']);

/** MySQL database username */
define('DB_USER', $vcap_arr['credentials']['username']);

/** MySQL database password */
define('DB_PASSWORD', $vcap_arr['credentials']['password']);

/** MySQL hostname */
define('DB_HOST', $vcap_arr['credentials']['hostname']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**Define AWS access keys for S3 Plugin*/
define( 'AWS_ACCESS_KEY_ID', getenv('AWS_ACCESS_KEY_ID') );
define( 'AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY') );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%D~; UfQjqEI-}7tW:(1hDZa<t(cQsa<RPH3rv<i&g.smRzlyuBom$iw]qG$Ylw]');
define('SECURE_AUTH_KEY',  'u(!o+-ul-H,0yI0pzXx|-A<2ZU!+ZhtxAd{+fmA|06sr@GVe5#<BlS;aE*1zz;p{');
define('LOGGED_IN_KEY',    'l3[G{_Sfbmxw/NiTb9k=5aE-NeE84gO>YkTm`GZ|$oJqw.hF5wRAF-o#~7d%;-o^');
define('NONCE_KEY',        '|~>eyXOPiJMw0<l /]1{;OR|oR07xZvemQHe,}-DZIj!q@m_|0FVx+&/rqOU)oI}');
define('AUTH_SALT',        '(]I1TyMp]6;pW8V*.yd_E<GMQi`}pAH}+^Oin%bl^=yjT}=(YRnn4)01&UIhvk&6');
define('SECURE_AUTH_SALT', 'fI{C+BP|p/9Ljx$&tY?Yu,(}IY1(,I,>6i><|)+Qc+&3dr^ip4e;{X|[h%?.[<b4');
define('LOGGED_IN_SALT',   'Qsg_A0_u|HHs;EY|dC+YIgcefjxMw-?s4ZH97q|jO>M-QEa>J/*3WQ9<`a{0/PG,');
define('NONCE_SALT',       '#&rYTfrglH5`F9EUL{+(weKbkXr<TUL>jmQX~1.gQK--b-}M_W|P]Vq~VhO>(l1@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
