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
        <div class="small-12 left d-table rel">
          <div class="d-table-cell small-12 text-center">
            <?php
              $title = get_field('reven_painel_titulo');
              $subtitle = get_field('reven_painel_subtitulo');
              $btn = get_field('reven_painel_btn');

              if($title && !empty($title))
                echo '<h2>'. $title .'</h2>';

              if($subtitle && !empty($subtitle))
                echo '<h3 class="divide-40">'. $subtitle .'</h3>';

              if($btn && !empty($btn))
                echo '<h4><a href="#" class="reven-btn-join button d-iblock text-up">'. $btn .'</a></h4>';
            ?>
          </div>
        </div>
      </div>
    </figure>
    
    <!-- vantagens -->
    <div id="reven-info" class="small-12 left section-block">
      <div class="row">

        <div class="small-12 medium-4 columns text-center">
          <?php
            $icon = get_field('reven_vant_icon_1');
            $title = get_field('reven_vant_titulo_1');
            $subtitle = get_field('reven_vant_desc_1');

            if($icon && !empty($icon))
              echo '<figure class="divide-30 text-center"><img src="'. $icon .'"></figure>';

            if($title && !empty($title))
              echo '<h2 class="reven-info-title">'. $title .'</h2>';

            if($subtitle && !empty($subtitle))
              echo '<p class="reven-info-desc no-margin">'. $subtitle .'</p>';
          ?>
        </div>

        <div class="small-12 medium-4 columns text-center">
          <?php
            $icon = get_field('reven_vant_icon_2');
            $title = get_field('reven_vant_titulo_2');
            $subtitle = get_field('reven_vant_desc_2');

            if($icon && !empty($icon))
              echo '<figure class="divide-30 text-center"><img src="'. $icon .'"></figure>';

            if($title && !empty($title))
              echo '<h2 class="reven-info-title">'. $title .'</h2>';

            if($subtitle && !empty($subtitle))
              echo '<p class="reven-info-desc no-margin">'. $subtitle .'</p>';
          ?>
        </div>

        <div class="small-12 medium-4 columns text-center">
          <?php
            $icon = get_field('reven_vant_icon_3');
            $title = get_field('reven_vant_titulo_3');
            $subtitle = get_field('reven_vant_desc_3');

            if($icon && !empty($icon))
              echo '<figure class="divide-30 text-center"><img src="'. $icon .'"></figure>';

            if($title && !empty($title))
              echo '<h2 class="reven-info-title">'. $title .'</h2>';

            if($subtitle && !empty($subtitle))
              echo '<p class="reven-info-desc no-margin">'. $subtitle .'</p>';
          ?>
        </div>

      </div>
    </div>

    <!-- formularios, informações -->
    <div id="reven-form" class="small-12 left section-block">
      
      <div class="row">
        
        <!-- formularios -->
        <div class="small-12 medium-6 columns forms-content">

          <header class="text-center divide-30">
            <h2 style="font-weight:800;"><strong>Cadastre-se</strong></h2>
          </header>
          
          <nav class="divide-30">
            <div class="small-6 left text-center">
              <h3><a href="#" class="text-up set-cpf active">Pessoa física</a></h3>
            </div>

            <div class="small-6 left text-center">
              <h3><a href="#" class="text-up set-cnpj">Pessoa jurídica</a></h3>
            </div>
          </nav>

          <form id="form-cpf" class="small-12 left active">
            
            <p class="small-12 columns">
              <input type="text" name="nome" placeholder="NOME COMPLETO *" class="small-12 left" title="Seu nome" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="nascimento" placeholder="DATA DE NASCIMENTO *" class="small-12 left aniversario" title="Seu nascimento" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="tel" name="telefone" placeholder="TELEFONE *" class="small-12 left telefone" title="Seu telefone" required>
            </p>

            <p class="small-12 columns">
              <input type="email" name="email" placeholder="E-MAIL *" class="small-12 left" title="Seu email" required>
            </p>

            <p class="small-12 columns">
              <input type="text" name="endereco" maxlength="200" placeholder="ENDEREÇO *" class="small-12 left" title="Seu endereço" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="bairro" maxlength="200" placeholder="BAIRRO *" class="small-12 left" title="Seu bairro" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="complemento" maxlength="200" placeholder="COMPLEMENTO *" class="small-12 left" title="Seu complemento" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="cidade" maxlength="200" placeholder="CIDADE *" class="small-12 left" title="Sua cidade" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="estado" maxlength="200" placeholder="ESTADO *" class="small-12 left" title="Seu estado" required>
            </p>

            <p class="small-12 columns">
              <a href="#" class="button reven-form-btn text-up left send-comp">Comp. de residência</a>
              <span class="right get-filename">nenhum arquivo escolhido</span>
              <input type="file" name="comprovante" class="small-12 left" title="Anexe seu comprovante de residência" required>
            </p>

            <p class="small-12 columns check">
              <input type="checkbox" name="newsletter" id="input-newsletter"><label for="input-newsletter">Permitir o envio de e-mails com promoções e novidades</label>
            </p>

            <p class="small-12 columns check">
              <input type="checkbox" name="sms" id="input-sms"><label for="input-sms">Permitir o envio de mensagens via whatsapp ou SMS</label>
            </p>

            <p class="small-12 columns">
              <span class="divide-20"></span>
              <button type="submit" class="button reven-form-btn text-up small-12 left">Enviar e dar o primeiro passo!</button>
            </p>

          </form>
          
          <form id="form-cnpj" class="small-12 left">
            
            <p class="small-12 columns">
              <input type="text" name="empresa" placeholder="NOME DA EMPRESA *" class="small-12 left" title="Nome da sua empresa" required>
            </p>

            <p class="small-12 columns">
              <input type="text" name="nome" placeholder="NOME DO RESPONSÁVEL *" class="small-12 left" title="Seu nome" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="cnpj" placeholder="CNPJ *" class="small-12 left cnpj" title="Seu cnpj" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="tel" name="telefone" placeholder="TELEFONE *" class="small-12 left telefone" title="Seu telefone" required>
            </p>

            <p class="small-12 columns">
              <input type="email" name="email" placeholder="E-MAIL *" class="small-12 left" title="Seu email" required>
            </p>

            <p class="small-12 columns">
              <input type="text" name="endereco" maxlength="200" placeholder="ENDEREÇO *" class="small-12 left" title="Seu endereço" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="bairro" maxlength="200" placeholder="BAIRRO *" class="small-12 left" title="Seu bairro" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="complemento" maxlength="200" placeholder="COMPLEMENTO *" class="small-12 left" title="Seu complemento" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="cidade" maxlength="200" placeholder="CIDADE *" class="small-12 left" title="Sua cidade" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="estado" maxlength="200" placeholder="ESTADO *" class="small-12 left" title="Seu estado" required>
            </p>

            <p class="small-12 columns check">
              <input type="checkbox" name="newsletter" id="input-newsletter-cnpj"><label for="input-newsletter-cnpj">Permitir o envio de e-mails com promoções e novidades</label>
            </p>

            <p class="small-12 columns check">
              <input type="checkbox" name="sms" id="input-sms-cnpj"><label for="input-sms-cnpj">Permitir o envio de mensagens via whatsapp ou SMS</label>
            </p>

            <p class="small-12 columns">
              <span class="divide-20"></span>
              <button type="submit" class="button reven-form-btn text-up small-12 left">Enviar e dar o primeiro passo!</button>
            </p>

          </form>

        </div>

        <!-- informações -->
        <div class="small-12 medium-6 columns reven-info">
          
          <div class="divide-40">
            <header class="divide-20">
              <h2>Você só precisa de</h2>
            </header>

            <ul class="no-bullet">
              <li>
                <i class="icon-check-circle"></i> <span>Comprovar residência com documento recente</span>
              </li>
              <li>
                <i class="icon-check-circle"></i> <span>Comprovar residência com documento recente</span>
              </li>
              <li>
                <i class="icon-check-circle"></i> <span>Comprovar residência com documento recente</span>
              </li>
              <li>
                <i class="icon-check-circle"></i> <span>Comprovar residência com documento recente</span>
              </li>
              <li>
                <i class="icon-check-circle"></i> <span>Comprovar residência com documento recente</span>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </div>
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