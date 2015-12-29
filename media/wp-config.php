<?php
/** Enable W3 Total Cache Edge Mode */
//define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache


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
define('DB_NAME', 'foccuscc_modabiz');

/** MySQL database username */
define('DB_USER', 'foccuscc_moda');

/** MySQL database password */
define('DB_PASSWORD', '#@moda@#');

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
define('AUTH_KEY',         '4MfeyYLqK6UUl6PrdWgDdtA06zLxPD4Y3r5rXXA4zJI6KLVYo503ZGZkRGUmomIG');
define('SECURE_AUTH_KEY',  '9BE9mJW6u3bENcACVfA1cyq72YGzICWcy16VYwXSn49RkwWloFg46SWwxq9mOljQ');
define('LOGGED_IN_KEY',    'asHQvu1OExTpCGiD8rdY17HroMCIQj3SkcgJn8gRhzXRKHL2yqpn66IvVkKbrfx3');
define('NONCE_KEY',        'V9sshaJJtd5sufYPG4blCWpLCMc92iFM5Xh3C51SMMIvPctzgPamtjQnRCpUTKD7');
define('AUTH_SALT',        'CPd5QLoBPfstHmsaleHJqTgu6Zh9F6rP7y6sg7OpLad4KZd52Kxllrb9R8ViJZRl');
define('SECURE_AUTH_SALT', '2qupwlVCJG7J4giNMg8iHjAd7yDFAA7t0WdlbOHPx7fTszXrZAbsdrytjseHmeoK');
define('LOGGED_IN_SALT',   '1GrGzzee8qwD1RHAz624yV3oFGFlnqWkpbaXFbv3IC08xHrUQ00aizZqHLTFNz3i');
define('NONCE_SALT',       'htTe9APEMVmdsj1oCNZrrMKG97ITgAJTQ1s32gQbUmVobwhwlKIBCP1DFXtf9mdN');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
//define('AUTOMATIC_UPDATER_DISABLED', true);


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */
//define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
//define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
