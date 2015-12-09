<?php
define('THEME_VERSION', '1.0.0');
define('THEME_ICON', get_stylesheet_directory_uri() . '/images/icon.png');
error_reporting(E_ERROR | E_PARSE);

/**
* Configure funções para campos personalizados da aplicação
*/
define( 'USE_LOCAL_ACF_CONFIGURATION', true ); // apenas conf. local

add_filter('acf/settings/path', 'plandd_acf_path');
function plandd_acf_path( $path ) {
     // update path
     $path = get_stylesheet_directory() . '/includes/acf-pro/';
     // return
     return $path;
}

add_filter('acf/settings/dir', 'plandd_acf_dir');
function plandd_acf_dir( $dir ) {
     // update path
     $dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';
     // return
     return $dir;
}
/**
 * Framework para personalização de campos
 * (custom meta post)
 */
include_once( get_stylesheet_directory() . '/includes/acf-pro/acf.php' );
define( 'ACF_LITE' , true );
//include_once( get_stylesheet_directory() . '/includes/acf/preconfig.php' );

/**
 * Menus
 */
register_nav_menus( array(
    'primary' => __( 'Menu principal',   'plandd' ),
    'footer' => __( 'Menu Rodape',   'plandd' ),
) );

/**
 * Posts
 */
//Thumbnails
add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
    add_image_size('blog-component', 303, 415, true);
}
remove_filter('the_excerpt', 'wpautop'); // sem paragrafo no resumo
//Nome da 1a categoria de uma postagem em um loop
function get_first_category_name($post_id) {
    $category = get_the_category($post_id);
    if ($category[0]) {
        return $category[0]->cat_name;
    }
}
//Link da 1a categoria de uma postagem em um loop
function get_first_category_link($post_id) {
    $category = get_the_category($post_id);
    if ($category[0]) {
        return get_category_link($category[0]->term_id);
    }
}

/**
 * Custom Post Types
 */

//PAINEL
include_once( get_stylesheet_directory() . '/includes/post-types/painel.php' );

//GALERIA
include_once( get_stylesheet_directory() . '/includes/post-types/galeria.php' );

/**
 * Opções gerais para a aplicação e seus
 * componentes
 */
require_once (dirname(__FILE__) . '/includes/options/redux-framework.php');
require_once (dirname(__FILE__) . '/includes/options/sample/barebones-config.php');

//Admin instagram
require_once (dirname(__FILE__) . '/includes/functions/componentes.instagram.hash.php');
require_once (dirname(__FILE__) . '/includes/functions/componentes.instagram.perfil.php');

/**
 * Incorpore scripts essenciais para toda a
 * aplicação
 */
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

  /*
    Scripts essenciais minificados em
    um arquivo unico e essenciais para
    o funcionamento do lado cliente
  */
  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/scripts.js', array(), THEME_VERSION, true);
}
add_action( 'wp_enqueue_scripts', 'plandd_scripts' );

/**
 * Incorpore scripts essenciais
 * apenas para o admin
 *
 * @since ModaBiz 1.0
 */
function add_menu_icons_styles() {
  ?>
    <style>
    #menu-posts-painel div.wp-menu-image:before {
      content: "\f233";
    }
    #menu-posts-galeria div.wp-menu-image:before {
      content: "\f180";
    }
    </style>

    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>',
      }
      //]]>
    </script>
  <?php
  wp_enqueue_script('admin-jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), THEME_VERSION, true);
  wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri() . '/admin_scripts.js', array(), THEME_VERSION, true);
}
add_action('admin_head', 'add_menu_icons_styles');
?>