<?php
//Versão do tema (RELEASES)
define('THEME_VERSION', '1.0.1');
//Icone do tema
define('THEME_ICON', get_stylesheet_directory_uri() . '/images/icon.png');

/**
* Configure funções para campos personalizados da aplicação
*/
define( 'USE_LOCAL_ACF_CONFIGURATION', true ); // apenas conf. local
add_filter('acf/settings/path', 'plandd_acf_path');
function plandd_acf_path( $path ) {
	   // update path
	   $path = get_stylesheet_directory() . '/inc/acf/';
	   // return
	   return $path;
}
add_filter('acf/settings/dir', 'plandd_acf_dir');
function plandd_acf_dir( $dir ) {
	   // update path
	   $dir = get_stylesheet_directory_uri() . '/inc/acf/';
	   // return
	   return $dir;
}
/**
 * Framework para personalização de campos
 * (custom meta post)
 */
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
include_once( get_stylesheet_directory() . '/inc/acf-repeater/acf-repeater.php' );
//define( 'ACF_LITE' , true );
//include_once( get_stylesheet_directory() . '/inc/acf/preconfig.php' );

/**
 * Esta função será chamada logo após a inicialização da aplicação
 *
 * @since ModaBiz 1.0
 */
function plandd_setup() {
	/**
	 * Registrar formatos de miniaturas
	 */
	add_theme_support('post-thumbnails');
    
    set_post_thumbnail_size( 242, 220, true );
    if (function_exists('add_image_size')) {
        add_image_size('estrutura', 242, 220, true);
    }

	/*
		Remova widgets padrões do wordpress
	 */
	function remove_dashboard_widgets() {
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
		remove_meta_box('dashboard_primary', 'dashboard', 'side');
		remove_meta_box('dashboard_secondary', 'dashboard', 'side');
		remove_meta_box('dashboard_activity', 'dashboard', 'normal');
		remove_meta_box('dashboard_welcome', 'dashboard', 'normal');
	}
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
}
add_action('init','plandd_setup');


/**
 * Renomeia rótulos do post default para 
 * Vídeos
 */
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Vídeos';
    $submenu['edit.php'][5][0] = 'Vídeos';
    $submenu['edit.php'][10][0] = 'Novo Video';
    echo '';
}
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Vídeos';
    $labels->singular_name = 'Video';
    $labels->add_new = 'Adicionar Video';
    $labels->add_new_item = 'Novo Video';
    $labels->edit_item = 'Editar Vídeos';
    $labels->new_item = 'Video';
    $labels->view_item = 'Ver Video';
    $labels->search_items = 'Buscar Vídeos';
    $labels->not_found = 'Video não encontrado';
    $labels->not_found_in_trash = 'Não encontrado';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

function plandd_scripts() {
	/*
		Folha de estilo base para a aplicação
	 */
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), THEME_VERSION, "screen");
    /*
    	modernizr
    */
    wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), THEME_VERSION);
    /*
    	Jquery
     */
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, THEME_VERSION);
    wp_enqueue_script('jquery');
    /**
     * AangularJS
     */
    //wp_enqueue_script('angularjs', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js', array(), THEME_VERSION, true);
    /*
	    Scripts essenciais minificados em
	    um arquivo unico e essenciais para
	    o funcionamento do lado cliente
    */
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/scripts.js', array(), THEME_VERSION, true);
}
add_action( 'wp_enqueue_scripts', 'plandd_scripts' );

// Opções do tema
// ------------------------------------------------------------------------------------
/**
 * Opções gerais para a aplicação e seus
 * componentes
 * @link https://github.com/reduxframework/redux-framework
 *
 * @since Anafisio 1.0
 */
require_once (dirname(__FILE__) . '/inc/redux/redux-framework.php');
require_once (dirname(__FILE__) . '/inc/redux/sample/barebones-config.php');

?>