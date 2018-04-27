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
define( 'DB_NAME', 'kodak_site' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define('AUTH_KEY',         '.f$l|@$YR>Sb<,6{v56Did6CS%LZ<!Sh-`,EJo@,Yvgl&O_1CK kh~8[(+/I,T=P');
define('SECURE_AUTH_KEY',  'LuBx4VOKGu:NdA8g*fRQP}?/-$#DEVTA3|)EJGte)!c:4YcZEg$HiZP3f:q=4{&u');
define('LOGGED_IN_KEY',    'ac&AIBa7ELiO:C5o&Ya`[AKt[WA1ftV<tA:/f?Y_M#$:psL/T!f**e X(e[Mjvrh');
define('NONCE_KEY',        'ik3Ov&?oV+,%`Nq3pqUx7}X?=KI_k2Yrif)SMa?3,cJz-xK9n6>7#g#OSc}|*5Bu');
define('AUTH_SALT',        '+K^`1!dlzVqZ(Z#y[N%^J<GZ:m_1(dLn+m1%X{2+cD`h&pOsnZM?2~NBvEfz5#I3');
define('SECURE_AUTH_SALT', 'aA:)FQD[keA:k*}nJ$oRAO_co[1b?fP6d;%-lJ%=2-bNnIoqsuf|Vekc.3fW&:GJ');
define('LOGGED_IN_SALT',   '6/qK8d }wPfo~4u=!2`Q;V^?u6F@N-. J~4F/ aKi8l;$(]p0SywJwBIxOGb2=v`');
define('NONCE_SALT',       'x<y3jM%u8gUa#[c;sQ|DI)KsyJ4}}sIVbJYHXy7<:N:3rc}|/~OR&}/ZDA&Uz$>#');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define( 'BACKUPBUDDY_API_ENABLE', true ); // Enable BackupBuddy Deployment access.
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
