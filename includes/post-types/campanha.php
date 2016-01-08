<?php
/**
 * CPT para Campanha
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function campanha_init() {
  $labels = array(
    'name'               => 'Campanhas',
    'singular_name'      => 'Campanha',
    'add_new'            => 'Adicionar Nova',
    'add_new_item'       => 'Adicionar nova campanha',
    'edit_item'          => 'Editar campanha',
    'new_item'           => 'Nova campanha',
    'all_items'          => 'Todas as Campanhas',
    'view_item'          => 'Ver campanha',
    'search_items'       => 'Buscar Campanhas',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Campanhas'
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
        'supports'           => array( 'title' , 'thumbnail' )
      );

    register_post_type( 'campanha', $args );

    register_taxonomy('colecao-camapanha', 'campanha', array(
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
          'slug' => 'colecao-camapanha',
          'with_front' => false,
          'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'campanha_init' );
?>