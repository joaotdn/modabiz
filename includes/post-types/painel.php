<?php
/**
 * CPT para Painel
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function painel_init() {
  $labels = array(
    'name'               => 'Painel',
    'singular_name'      => 'Painel',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo slider',
    'edit_item'          => 'Editar slider',
    'new_item'           => 'Novo slider',
    'all_items'          => 'Todos os slider',
    'view_item'          => 'Ver slider',
    'search_items'       => 'Buscar slider',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Sliders'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'painel' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'painel', $args );
}
add_action( 'init', 'painel_init' );
?>