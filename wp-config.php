<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'scavencl_db');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'scavencl_user');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '#Foccus11.sc');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>>ZDytW;FAlM^|l.[QifMm=IxR2H%)( cuh@ C!L#A~u|sL-2u4@HYbodK`j:ND6');
define('SECURE_AUTH_KEY',  'Uu3d_UWus_|2OAcjYIGxlu#{}2T{iKBdK3jvw:%sW-wpt_$. @3^vRs:+kH0wvqi');
define('LOGGED_IN_KEY',    'P^6N9mZ|XV$P_8C!F|9OD>$IB5M!`{$!lhth&LnqX!J> |_fte>BQhBzeS(5c_0l');
define('NONCE_KEY',        '-0W^5r)L|{`G9T*ykUD8f:jc8!Z;$*$cS+B}1z@-- ~P5K#@L=IoaN+w7) C+eKr');
define('AUTH_SALT',        'aqF((HVvgQc-9n&hDd)tzSkC%Qnq1:zfj?ztO3dUL|s_E0k/@+|Vmagy]=]U|VB4');
define('SECURE_AUTH_SALT', '[t).&-)A}Pjl$[d@izDHS|=K|[&@brt|Ro-zPj-@Ml&%Ql!V@wUl}VWiv@rAo*sl');
define('LOGGED_IN_SALT',   'C%-m_X+:3n(0YfCO[kYo!@ tcC %~Vaf~]7WeSS7S-E8pH-+EGf9xhELTg:Qi{-!');
define('NONCE_SALT',       'MX^FV4~c-*Gsby!0+mw_-ZCx|h~9cd(EbD]bsHS[+Q@Y6c$J|^A9ma#A=GsDJEQf');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '256M');

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
