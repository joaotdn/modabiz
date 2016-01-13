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
define('DB_NAME', 'plandc6');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'plandc6');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'mb20727mb');

/** nome do host do MySQL */
define('DB_HOST', 'mysql06.plandc.hospedagemdesites.ws');

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
define('AUTH_KEY',         '?MfCL~%RmZ!8>i..;jB7,LvcAE8ucv;+ytXKL/Ac*+Qm!O1k XWO8)J}vd$/bA-y');
define('SECURE_AUTH_KEY',  '%/!/B1/}5t|` s l4JN-Aio+S:xOS+;Ff (mLL>zn]A$`:VrS9c`}+=(,Y5>s]:F');
define('LOGGED_IN_KEY',    '9[x{-y]KqFH:#y<:j#Cyy@~S*8O?=b}OWx68D+DnE@(B~(&VR%SzmZ`wn9c|vZnl');
define('NONCE_KEY',        'L-1T, j-;1lIt_VW3;]f`Vc)Gzy+(O}3BuTx9k3/2vIzQWip7<yM$paITLnuAFg;');
define('AUTH_SALT',        '/,>z(ky+,Q4*DKbS~MAip${-FSJwn%R&ZK uWr$)X+jJF-.;m_zQP4~KeMP+8?@>');
define('SECURE_AUTH_SALT', 'P#da++]-#-q>UjUyA/e&:v}lwg4|0{w]JhGl(P%4eR3;VaefO`z+p1Ead*,k`j|u');
define('LOGGED_IN_SALT',   '+9Hj|Tdi+U=94@|m%jf8)F7O!P?onq<!$ogus]=c;2U782kl0*IGll?+4f(4|SRx');
define('NONCE_SALT',       'VCO,%]T*uWF{prGZ/hmAf2o&/%jy<8+B5:{WY`7_hw @K@Nt2gsGI?.5hE8d;V:x');

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
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */
define('WP_MEMORY_LIMIT', '128M');

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
