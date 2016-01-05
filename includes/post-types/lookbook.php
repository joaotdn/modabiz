<?php
/**
 * CPT para LookBook
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function lookbook_init() {
  $labels = array(
    'name'               => 'Lookbook',
    'singular_name'      => 'LookBook',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo LookBook',
    'edit_item'          => 'Editar LookBook',
    'new_item'           => 'Novo LookBook',
    'all_items'          => 'Todos os Lookbook',
    'view_item'          => 'Ver LookBook',
    'search_items'       => 'Buscar LookBook',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Lookbook'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'lookbook' ),
    //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 2,
    'supports'           => array( 'title','editor','thumbnail' )
  );

    register_post_type( 'lookbook', $args );

    register_taxonomy('colecao', 'lookbook', array(
        'hierarchical' => true,
        'labels' => array(
          'name' => _x( 'Coleção', '' ),
          'singular_name' => _x( 'Coleção', '' ),
          'search_items' =>  __( 'Buscar Coleção' ),
          'all_items' => __( 'Todas' ),
          'parent_item' => __( 'Coleçõess' ),
          'parent_item_colon' => __( 'Coleção:' ),
          'edit_item' => __( 'Editar Coleção' ),
          'update_item' => __( 'Atualizar Coleção' ),
          'add_new_item' => __( 'Adicionar nova Coleção' ),
          'new_item_name' => __( 'Nova' ),
          'menu_name' => __( 'Coleções' ),
        ),
        'rewrite' => array(
          'slug' => 'colecao',
          'with_front' => false,
          'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'lookbook_init' );
?>