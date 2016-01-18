<?php
/**
 * CPT para Revendedores
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function revendedores_init() {
  $labels = array(
    'name'               => 'Revendedores',
    'singular_name'      => 'Revendedor',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo revendedor',
    'edit_item'          => 'Editar revendedor',
    'new_item'           => 'Novo revendedor',
    'all_items'          => 'Todos os revendedores',
    'view_item'          => 'Ver revendedor',
    'search_items'       => 'Buscar revendedor',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Revendedores'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'Revendedores' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'revendedores', $args );
}
add_action( 'init', 'revendedores_init' );
?>