<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'db_test');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'j$aKTn3-< ffm]Nh6*E@r(SewJ(aM6bX+(y^F!0w)EI,hGE%gy$a;Wn~/-CoI+;A');
define('SECURE_AUTH_KEY',  'yy>w)wx%PYW<)3a-3q19|V,]9vmUyH$?aGtVnE-[E)9+B^fF+{g8MF++LBjFk|](');
define('LOGGED_IN_KEY',    'v-fHIFd(BSpDnm+8+<<nvf~Afsg+3y9|9oz|y5Q[&}UF`|,C(U#I)89M=33LFKMK');
define('NONCE_KEY',        'zG&S/on)gWe8GGxS|nn{Y#m7vS)Ta6#0k4=OCBM[|2Mn->[-*B}W{IB.|T>cP}f6');
define('AUTH_SALT',        ')uR7D`/,$U^X78rcP,7REl>`gnh3mG|x2w:wu&/8p4d&xO={L+_<azE|0`h{o5,I');
define('SECURE_AUTH_SALT', ' yZnkr7tAL,g.ELu/o-IQI[:3X8SkS0U~:90P>&Ag}mm=~(xmjpcGT`K}Y~|[c)g');
define('LOGGED_IN_SALT',   'pAXN#d+&@sMp]sD?Haom[2<`ar$PL 5mU&+hbeR<|S?erZ1F%r>MBBjr+!=`-9IF');
define('NONCE_SALT',       ']Dm09$J7!m$MgI.vctm;`r|ea<aScq-skwQvtK*Sl5STnVTcrB6_otG@v/#}>^On');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
