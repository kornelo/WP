<?php
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy i ABSPATH. Więcej informacji
 * znajduje się na stronie
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'mettet');

/** Nazwa użytkownika bazy danych MySQL */
//define('DB_USER', 'mettet');
define('DB_USER', 'root');

/** Hasło użytkownika bazy danych MySQL */
//define('DB_PASSWORD', 'HNUjp95a');
define('DB_PASSWORD', '');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'localhost');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?2+**|#g_r0!FM|- `SO)WttR>ujJ!F_x(q,,/wN!/{(}V/P@Ot1uF]6B6QT!Hf@');
define('SECURE_AUTH_KEY',  'db7T@])PmF h:(B1FgwKG]{1~+_5#`c~*U,n9.cw200L$@POU(,~IO(Sxi|]ulvT');
define('LOGGED_IN_KEY',    'ZTb({zk|:4<^|o-cpe]V*+xbWewM~K+Xd,/wC05jRsZQ+i*_wS+z&^K+v~!Ae*,R');
define('NONCE_KEY',        '|9|{N|rkm$0p(yLy9/A[cEWf %9Ci@m<vt93#Gj-L(MBjIOToyGY3VlKjp(-HJV ');
define('AUTH_SALT',        '#j}5rP!OUZ50r@VKwt^-:i$t+1 wad]3-c7nTfGhZ--xTvf]x|n=nigrAIUTc+wk');
define('SECURE_AUTH_SALT', '|(2-0-.s|-(6;uUpI)T:ut4_j7E?@lX9X18[x&ykPK~}(k2%iq:S=BiT@( 9VNEJ');
define('LOGGED_IN_SALT',   'ow|</$-(xd4e70Y_R&X7*Vw7q8WW@x.DJGLy>!$fha+.HDkGE=L{>~T!?1I}zoha');
define('NONCE_SALT',       'tZH1p`{YoYD;8MX`>~)%_+W^^B77S]h^|ZG.Z+ax=C_m|g.pF>Fl:7}8P|%-`E~ ');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'mt_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define('WP_DEBUG', true);

define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
