<?php
/**
 * CPT para Contatos
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function contatos_init() {
  $labels = array(
    'name'               => 'Contatos',
    'singular_name'      => 'Contato',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo contato',
    'edit_item'          => 'Editar contato',
    'new_item'           => 'Novo contato',
    'all_items'          => 'Todos os contatos',
    'view_item'          => 'Ver contato',
    'search_items'       => 'Buscar contato',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Contatos'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        //'rewrite'            => array( 'slug' => 'contatos' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'contatos', $args );
}
add_action( 'init', 'contatos_init' );
?>