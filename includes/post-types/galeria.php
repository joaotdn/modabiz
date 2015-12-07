<?php
/**
 * CPT para Galeria
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function galeria_init() {
  $labels = array(
    'name'               => 'Galeria',
    'singular_name'      => 'Galeria',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo item',
    'edit_item'          => 'Editar item',
    'new_item'           => 'Novo item',
    'all_items'          => 'Todos os item',
    'view_item'          => 'Ver item',
    'search_items'       => 'Buscar item',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Galeria'
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
        'supports'           => array( 'title', 'thumbnail' )
      );

    register_post_type( 'galeria', $args );
}
add_action( 'init', 'galeria_init' );
?>