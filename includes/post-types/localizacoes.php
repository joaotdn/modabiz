<?php
/**
 * CPT para Localizações
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function localizacao_init() {
  $labels = array(
    'name'               => 'Localizações',
    'singular_name'      => 'Localização',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo local',
    'edit_item'          => 'Editar local',
    'new_item'           => 'Novo local',
    'all_items'          => 'Todos os locais',
    'view_item'          => 'Ver local',
    'search_items'       => 'Buscar locais',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Localizações'
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

    register_post_type( 'localizacao', $args );
}
add_action( 'init', 'localizacao_init' );
?>