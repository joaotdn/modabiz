<?php 
/**
 * Busca de revendedores
 */
add_action('wp_ajax_nopriv_pba_search_form', 'pba_search_form');
add_action('wp_ajax_pba_search_form', 'pba_search_form');

function pba_search_form() {
  $query = $_GET['keyword'];
  //$term = $query['term'];
  $the_query = new WP_Query( array( 's' => $query, 'post_type' => 'localizacao', 'posts_per_page' => -1, 'orderby' => 'date' ) );
  if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $gmap = get_field('gmap_latlng',$post->ID);
  ?>
  <h5 data-lat="<?php echo $gmap['lat']; ?>" data-lng="<?php echo $gmap['lng']; ?>"><?php the_title(); ?></h5>
  <?php

  endwhile; wp_reset_postdata(); endif;
  
  exit();
}

?>