<?php
  /**
   * Template Name: Lojas e revendas
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */

  //Header
  get_header();

  global $plandd_option;

  $layout = $plandd_option['temp-revendas-blocks-template']['topo'];

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

          case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

      }
  }
   
  endif;

  $lat = $plandd_option['comp-geo-lat'];
  $lng = $plandd_option['comp-geo-lng'];
  $icon_header = $plandd_option['comp-geo-icon']['url'];
  $icon = $plandd_option['comp-geo-icon-normal']['url'];
  $icon_hover = $plandd_option['comp-geo-icon-hover']['url'];
  $icon_user = $plandd_option['comp-geo-icon-user']['url'];
  $header = $plandd_option['comp-geo-header'];
?>
<section id="inner-revendedor" class="small-12 left section-block no-pb rel">
<div id="comp-geo">
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
</div>
</section>
<?php
  
  //Componente Gmap
  require get_template_directory()."/includes/componentes/geolocalizacao.php";

  //footer

  $layout = $plandd_option['temp-revendas-blocks-template']['rodape'];

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

          case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

      }
  }
   
  endif;
  
  get_footer();
?>