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

          case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

      }
  }
   
  endif;
?>
<section id="resposta" class="small-12 left section-block rel">
  <div class="row d-table">
    <div class="d-table-cell text-center">
      <h1 class="text-up divide-30">Enviado com sucesso!</h1>
      <a href="<?php echo home_url(); ?>" class="button button-back text-up">Voltar</a>
    </div>
  </div>
</section>
<?php  
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

          case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

      }
  }
   
  endif;

  get_footer();
?>