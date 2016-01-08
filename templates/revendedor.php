<?php
  /**
   * Template Name: Seja revendedor
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */

  //Header
  get_header();

  global $plandd_option;
  global $post;
  $th = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

  $layout = $plandd_option['temp-revendedor-blocks-layout']['topo'];

  if ($layout): foreach ($layout as $key=>$value) {
   
      switch($key) {
   
          case 'painel': require get_template_directory()."/includes/componentes/painel.php";
          break;
   
          case 'cadastro': require get_template_directory()."/includes/componentes/cadastro.php";
          break;
   
          case 'blog': require get_template_directory()."/includes/componentes/blog.php";
          break;
   
          case 'galeria': require get_template_directory()."/includes/componentes/galeria.php";    
          break;

          case 'instagram-hash': require get_template_directory()."/includes/componentes/instagram.hashtag.php";    
          break;

          case 'instagram-perfil': require get_template_directory()."/includes/componentes/instagram.perfil.php";    
          break;

          case 'geolocalizacao': require get_template_directory()."/includes/componentes/geolocalizacao.php";    
          break;

      }
  }
   
  endif;
?>

<section id="inner-revendedor" class="small-12 left section-block">
    <div class="row">
        <div class="small-12 columnns">
            <nav id="breadcrumb" class="small-12 left">
                <?php the_breadcrumb(); ?>
                <div class="divide-30"></div>
            </nav>

            <header class="divide-40">
                <h1 class="left"><?php the_title(); ?></h1>

                <nav class="share-footer show-for-large-up right">
                    <ul class="inline-list d-iblock no-margin">
                        <li><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink();;?>"></div></li>
                        <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink();;?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink();;?>"></div></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>

    <figure id="panel-revendedor" class="small-12 left rel" data-thumb="<?php echo $th[0]; ?>">
      <div class="mask small-12 abs left-axy"></div>
      <div class="row">
        <div class="small-12 left d-table">
          
        </div>
      </div>
    </figure>
</section>

<?php
  //footer

  $layout = $plandd_option['temp-revendedor-blocks-layout']['rodape'];

  if ($layout): foreach ($layout as $key=>$value) {
   
      switch($key) {
   
          case 'painel': require get_template_directory()."/includes/componentes/painel.php";
          break;
   
          case 'cadastro': require get_template_directory()."/includes/componentes/cadastro.php";
          break;
   
          case 'blog': require get_template_directory()."/includes/componentes/blog.php";
          break;
   
          case 'galeria': require get_template_directory()."/includes/componentes/galeria.php";    
          break;

          case 'instagram-hash': require get_template_directory()."/includes/componentes/instagram.hashtag.php";    
          break;

          case 'instagram-perfil': require get_template_directory()."/includes/componentes/instagram.perfil.php";    
          break;

          case 'geolocalizacao': require get_template_directory()."/includes/componentes/geolocalizacao.php";    
          break;

      }
  }
   
  endif;
  
  get_footer();
?>