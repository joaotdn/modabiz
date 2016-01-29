<?php
/**
 * CPT para Currículos
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function curriculos_init() {
  $labels = array(
    'name'               => 'Currículos',
    'singular_name'      => 'Currículo',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo currículo',
    'edit_item'          => 'Editar currículo',
    'new_item'           => 'Novo currículo',
    'all_items'          => 'Todos os curriculos',
    'view_item'          => 'Ver currículos',
    'search_items'       => 'Buscar currículo',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Currículos'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'curriculos' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'curriculos', $args );
}
add_action( 'init', 'curriculos_init' );
?>