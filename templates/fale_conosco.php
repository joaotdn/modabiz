<?php
  /**
   * Template Name: Fale conosco
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */

  modabiz_module_contatos();
  
  //Header
  get_header();

  global $plandd_option;
  global $post;
  $th = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

  $layout = $plandd_option['temp-contato-blocks-layout']['topo'];

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

  $descricao = get_field('contato_desc');
  $assuntos = get_field('contato_assuntos');
  $telefones = get_field('contato_telefones');
  $whatsapps = get_field('contato_whatsapps');
  $local = get_field('contato_local');
  $horarios = get_field('contato_horarios');
  $mapa = get_field('contato_mapa');
?>

<section id="inner-contato" class="small-12 left section-block">

    <div class="row">
        <div class="small-12 columns">
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
            
            <?php
              if($descricao)
                echo '<p class="page-description content-info">'. $descricao .'</p>';
            ?>
            
        </div>
    </div>

    <!-- formularios, informações -->
    <div id="contact-form" class="small-12 left section-block">
      
      <div class="row">
        
        <!-- formularios -->
        <div class="small-12 medium-6 columns">

          <form action="<?php the_permalink(); ?>" class="small-12 left active" method="post">
            
            <p class="small-12 left">
              <input type="text" name="nome" placeholder="NOME COMPLETO *" class="small-12 left" title="Seu nome" required>
            </p>

            <p class="small-12 left">
              <input type="email" name="email" placeholder="E-MAIL *" class="small-12 left" title="Seu email" required>
            </p>

            <p class="small-12 left">
              <input type="tel" name="telefone" placeholder="TELEFONE" class="small-12 left telefone" title="Seu telefone" required>
            </p>

            <p class="small-12 left">
              <input type="text" name="cidade" placeholder="CIDADE/ESTADO *" class="small-12 left" title="Sua cidade" required>
            </p>
            
            <?php
              if($assuntos):
            ?>
            <p>
              <select name="assunto" id="" class="small-12 left">
                <option selected>Assunto</option>
                <?php
                  foreach ($assuntos as $assunto) {
                    echo '<option value="'. strtolower($assunto['contato_assunto']) .'">'. $assunto['contato_assunto'] .'</option>';
                  }
                ?>
              </select>
            </p>
            <?php endif; ?>

            <p>
              <textarea name="mensagem" id="" cols="30" rows="10" placeholder="MENSAGEM *" title="Sua mensagem" required></textarea>
            </p>

            <p class="small-12 left">
              <span class="divide-20"></span>
              <button type="submit" class="button contato-form-btn text-up right" name="submited">Enviar</button>
            </p>

          </form>

        </div>
        
        <!-- informações -->
        <div class="small-12 medium-6 columns contato-info">

            <?php
              if($telefones):
            ?>
            <p class="small-12 columns">
              <span class="title-info small-12 left">Telefone</span>
              <span class="content-info divide-30">
                <?php
                  foreach ($telefones as $tel) {
                    echo '<span>'. $tel['contato_telefone'] .'</span>';
                  }
                ?>
              </span>
            </p>
            <?php
              endif;
            ?>

            <?php
              if($whatsapps):
            ?>
            <p class="small-12 columns">
              <span class="title-info small-12 left">Whatsapp</span>
              <span class="content-info divide-30">
                <?php
                  foreach ($whatsapps as $tel) {
                    echo '<span>'. $tel['contato_telefone'] .'</span>';
                  }
                ?>
              </span>
            </p>
            <?php
              endif;
            ?>
            

            <?php
              if($local):
            ?>
            <p class="small-12 columns">
              <span class="title-info small-12 left">Endereço:</span>
              <span class="content-info divide-30"><?php echo $local; ?></span>
            </p>
            <?php
              endif;
            ?>

            <?php
              if($horarios):
            ?>
            <p class="small-12 columns">
              <span class="title-info small-12 left">Horário de funcionamento:</span>
              <span class="content-info divide-30"><?php echo $horarios; ?></span>
            </p>
            <?php
              endif;
            ?>
            
            <?php
              if($mapa):
            ?>
            <figure class="small-12 columns">
              <?php echo $mapa; ?>
            </figure>
            <?php
              endif;
            ?>
        </div>

      </div><!-- // row -->

    </div>

</section>

<?php
  //footer

  $layout = $plandd_option['temp-contato-blocks-layout']['rodape'];

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