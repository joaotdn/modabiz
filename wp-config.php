<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'irstudio_wp979');

/** MySQL database username */
define('DB_USER', 'irstudio_wp979');

/** MySQL database password */
define('DB_PASSWORD', 'irs20727irsv61a');

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
define('AUTH_KEY',         'amqr6ihnuwwl1isoeqwwpcbx5fkixicuq0rhduqqyzx3cwbhymetunw1j9hzp6fe');
define('SECURE_AUTH_KEY',  'mhzuyxieaqrwknisapm216j62gr4gewsnplwyfaicfhw1pgutjhqtxvzrgjll4lf');
define('LOGGED_IN_KEY',    '7tfip6nyoqczhfkscdbylwonrvqqnpr3hbh9eehec1chm3npfkcbmdfx4m0tq5iv');
define('NONCE_KEY',        'e0vglvnhmrd0h7ohkyr4ti7z8fodq9udkgmzupw5wawu6den3bf0jnrk5xkpssmr');
define('AUTH_SALT',        '1t2zy30c5cnpzcqaprgrlorlnzs4rx3l5hpdvmgftcjoqyuwomcyhm5x7y2jdrhb');
define('SECURE_AUTH_SALT', '8pdsmsggd7syuvfz4atbmokr5gdpxoan4teggqqgcme2gbeanzr5vslfocxn8pdz');
define('LOGGED_IN_SALT',   'a3wxgtgrxpe6isq06tzp3vnxlropyey3qrwkreqevuwln7tzjpx1kzyjnzcrrvgw');
define('NONCE_SALT',       'azizyh7ap6axrctfoq45xjrs15bja6uxm8v9qmcaow1pmjtuwnu2uodfyqmldtln');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */
define('MULTISITE', true);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
