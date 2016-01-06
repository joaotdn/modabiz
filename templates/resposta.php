<?php
  /**
   * Template Name: Resposta
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */

  //Header
  get_header();

  global $plandd_option;

  $layout = $plandd_option['temp-resposta-blocks-layout']['topo'];

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
<section id="resposta" class="small-12 left">

  <div class="row">
    
    <div class="small-12 left d-table">

      <div class="d-table-cell small-12 text-center">
        <h1 class="text-up text-center">Enviado com sucesso</h1>
        <div class="divide-40"></div>
        <p class="small-12 left text-center">
          <a href="<?php home_url(); ?>" class="button button-back text-up">Voltar</a>
        </p>
      </div>
    
    </div>

  </div>

</section>
<?php
  //footer

  $layout = $plandd_option['temp-resposta-blocks-layout']['rodape'];

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