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
define('DB_NAME', 'irstudio_wp979');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'irstudio_wp979');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'irs20727irsv61a');

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
define('AUTH_KEY',         '@+3d.)Xz%?%j70xb2X<x9Mm^61:)(2>>)q}3m|OmvVe#AXD]#*qPHEEilkEOrEpE');
define('SECURE_AUTH_KEY',  '}-]fr1l6*Nwsx}PVG^-:x*weoF*S_TkqD8hdx=L#c>{y,j)}en%e]-b~=!05.p0(');
define('LOGGED_IN_KEY',    'GY| [yO_p<vP/g[#:i]c(N_irHN>8mPTds|AjjSv}Q#+ARys/@?m>k:=ZX=;8kV ');
define('NONCE_KEY',        ')32e$a@deH$S._=a|/UvtH@X.E+8><h_hv9mUEyrvwp|4,}&-S@UNtWugp%N8kU|');
define('AUTH_SALT',        'g{FD1FNK9XYojI]B-K36-PVS<(D?g{:/4y!W<!FJs$<}{D.4bWem|6/(^%|)L@c9');
define('SECURE_AUTH_SALT', '?3x!iqM%|J$~4TdA>s4:4f5!O+okt*DE`DbYeRz3)PJ67i%kd)og_c[m0GHZgn3}');
define('LOGGED_IN_SALT',   'zs/neR9&+rx^`V1}Rz tP41|QMMr )X~-KF`kogUSCV~UHrk]BRVM9Wf)OBdX[La');
define('NONCE_SALT',       '&Iu78lb>jvh<bJKrcFAeNB%Q;[[l6}64mS^tr|Zd>h+q-sqQaArU =!Za#xm u8/');

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

/* Isto é tudo, pode parar de editar! :) */
//define('MULTISITE', true);

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');