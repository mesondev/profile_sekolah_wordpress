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
define( 'DB_NAME', 'websiteku_db' );

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
define( 'AUTH_KEY', 'xAVlUkVzvyIt1a242/0kIQDlxsdLpQsSkX2C+3xUebUtsbDRlOkYfWOPjYkhulPj' );
define( 'SECURE_AUTH_KEY', 'zWFNFyO4bOzFX3pbC+ik3zZC+WtNQEnoAwRjM4+6Rwy+MkZK/aSvmbKxB7OypYIC' );
define( 'LOGGED_IN_KEY', 'cGjMCBAg7cz7oXe+lL4NpsM1302RxydSBWVbOD3+AeHvdFFwdkTA1AIvu2kLFRZM' );
define( 'NONCE_KEY', 'w8mXI7PUknzP3tcKVHJG/VJ6/9lL52Ht4jYMJkyNnS8/H3pfVO9NIBTfWXa5ZXNt' );
define( 'AUTH_SALT', '6M2CYYCQZqz53uubwuRS0rch0S7UcmWdC9YacvrrLD97eG3i4AJacQ/lUaA5nevj' );
define( 'SECURE_AUTH_SALT', 'ro4tajPkvmp4ja2b70d6fpTGkDmxVGy8oGLFayeqmwmZtXUBusArO2c+qSq99Ppc' );
define( 'LOGGED_IN_SALT', '3LiInhH/m/SfZ8JzUkaRbwNuH3zYNPwy+kVli4wuQHXoMsuTpnw0/O0xekx0ktvi' );
define( 'NONCE_SALT', 'CsK5GuEaw6AJzjq0QXs7SPmJRZHqQTG6YcdKpsEAwzD87PpDw5fLkWjhHEjVfQnG' );

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
