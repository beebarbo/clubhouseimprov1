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
define('DB_NAME', 'clubhov2_wo2336');

/** MySQL database username */
define('DB_USER', 'clubhov2_wo2336');

/** MySQL database password */
define('DB_PASSWORD', 'sL6owxDqXjSe');

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
define('AUTH_KEY', 'R;B%XmAYn{MoDGk!(y!IneI%wTl+nUm$+iLA)s|TvHoqaPOu$^/[v%pFDW)(O-T$TViT}^K@NWdZ><c_cDOmp^->f|jRKqqASIEui/&QvkFN;(Eh*x;tgGxq-n(cg$Ro');
define('SECURE_AUTH_KEY', 'drUTtarVXhc[?wq|z}MFrBv-$Z]s@!JyoE=zEL]jMtZkBV&ezLel_syo_sndi<n*}xkNva$BHn)|NE{@uFrFNv{Vr(Yb/;)K%MAC?-rl!<@y%rLl@e_W(+%bLMNCZ^ZN');
define('LOGGED_IN_KEY', 'ltMUMdAZlffyAPAX*Vqm&hYljdxXNvJ^qPZ[ozq[aTwrRT)$%({]R-gVOvR%}Xmj-HF^]Pj&GX=WK|pKNH!u!UOe_u|)FbXNE{]gez}n($ec%ySiBL<D*tfIjFcveqcq');
define('NONCE_KEY', 'e[s<xei-;-(HU!M-EDgVgrnKw/fuuUg^FqGAf/RWaW]BfRtelB>ZdGxO=Pju$WZw>JxWN>uUwDp^vakPX(H/Xb=hNUwI(nbqnSZJ(R{mys;@HIG{HuTwHco(mQkZqh_x');
define('AUTH_SALT', 'I|aW&uq=$w^}GKu{+yasCyZhz]/P<jy*l%cLSM+p(pIyrR=Qf]jcf=ma;zQYi_Ze|R}nwZW?ojdTr-fDlE+NqtXqjHqphx!xMGhWRTvid|=K)Uqu^s})U|kmHYp]+(Hy');
define('SECURE_AUTH_SALT', '-<;vk<Aw!F^]*E|H*o*p/Z|UJ<ingxZ+QBnhH(_fcH!dBqGV;q})+k)%duR%G/XBf<P^B{!]Q+wLDLXn/VVKyX^ZIEiyKZnfeOCu|V+^=/p;LE@PphcP&<jCJQ_;-g+]');
define('LOGGED_IN_SALT', 'U}%LglcZ>cpG=nF@^&Wm+rlHy;cB>Dhhu@wq{!x(iLtxAF&eV<a]P*jn|Z}O]<?gj$!__mXP?LzgSu?);?zHx-BQfa$uBFuAc-V}]{rtDk}jM%RuV*AHJVZm)<!;uZSJ');
define('NONCE_SALT', 'EZWn/=hHyPwD=XZC(E]a*m>==jkJS{?>]^ELR<Y/XZiY+aTU!Psm|(;G;q^zX@A&K&^R*dlWjdVY=sJhp|[CG@]zkx{n/onGup%wjt/U@;szghEMeu[=UY$M?)L-L[bO');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_lbpd_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
