<?php
  /**
   * Template Name: Seja revendedor
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */
  modabiz_module_revendedores();
    
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
<section id="inner-revendedor" class="small-12 left section-block no-pb">
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
                        <li><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink(); ?>"></div></li>
                        <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink(); ?>"></div></li>
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
          
          <!--
            FORM PESSOA FISICA
          -->
          <form action="<?php the_permalink(); ?>" id="form-cpf" class="small-12 left active" method="post" enctype="multipart/form-data">
            
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
              <input type="text" name="estado" maxlength="200" placeholder="ESTADO *" class="small-12 left" title="Seu estado" required>
            </p>

            <p class="small-12 columns medium-6">
              <input type="text" name="cidade" maxlength="200" placeholder="CIDADE *" class="small-12 left" title="Sua cidade" required>
            </p>

            <p class="small-12 columns">
              <a href="#" class="button reven-form-btn text-up left send-comp">Comp. de residência</a>
              <span class="right get-filename">nenhum arquivo escolhido</span>
              <input type="file" name="comprovante" class="small-12 left hide" title="Anexe seu comprovante de residência">
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
            
            <input type="hidden" name="form_type" value="Pessoa física">
            <input type="hidden" name="submited_cpf" value="submit_cpf">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
          </form>
          
          <!--
            FORM PESSOA JURIDICA
          -->
          <form action="<?php the_permalink(); ?>" id="form-cnpj" class="small-12 left" method="post">
            
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
            
            
            <input type="hidden" name="form_type" value="Pessoa jurídica">
            <input type="hidden" name="submited_cnpj" value="submit_cnpj">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
          </form>

        </div>

        <!-- informações -->
        <div class="small-12 medium-6 columns reven-info">
          
          <?php
            //Requerimentos
            $title_req = get_field('reven_lista_req_titulo');
            $list_req = get_field('reven_lista_req');

            //Pagamento
            $title_pag = get_field('reven_pag_titulo');
            $text_pag = get_field('reven_pag_texto');

            //Dúvidas
            $title_duv = get_field('reven_duv_titulo');
            $telefones = get_field('reven_duv_telefones');
            $whatsapps = get_field('reven_duv_whatapps');
          ?>


          <?php
            //Requerimentos
            if($list_req):
          ?>
          <div class="divide-40">
            <header class="divide-20">
              <h2 class="infoblock-title"><?php echo $title_req; ?></h2>
            </header>

            <ul class="no-bullet no-margin small-12 left">
              <?php
                foreach ($list_req as $req) {
                  echo '<li><i class="icon-check-circle"></i> <span>'. $req['reven_item_req'] .'</span></li>';
                }
              ?>
            </ul>
          </div>
          <?php
            endif;
          ?>
          
          <?php
            //Forma de pagamento
            if($text_pag):
          ?>
          <div class="divide-40">
            <header class="divide-20">
              <h2 class="infoblock-title"><?php echo $title_pag; ?></h2>
            </header>
            
            <span>
              <?php echo $text_pag; ?>
            </span>
          </div>
          <?php
            endif;
          ?>

          <?php
            //Dúvidas
            if(isset($telefones) || isset($whatsapps)):
          ?>
          <div class="small-12 left">
            <header class="divide-20">
              <h2 class="infoblock-title"><?php echo $title_duv; ?></h2>
            </header>
            
            <?php
              if($telefones):
            ?>
            <p class="contact-title divide-10"><i class="icon-phone"></i> Telefone</p>
            <nav class="contact-list divide-20">
              <?php
                foreach ($telefones as $tel) {
                  echo '<span>'. $tel['reven_duv_telefone'] .'</span>';
                }
              ?>
            </nav>
            <?php
              endif;
              if($whatsapps):
            ?>
            <p class="contact-title divide-10"><i class="icon-whatsapp"></i> Whatsapp</p>
            <nav class="contact-list divide-30">
              <?php
                foreach ($whatsapps as $whats) {
                  echo '<span>'. $whats['reven_duv_whatapp'] .'</span>';
                }
              ?>
            </nav>
            <?php
              endif;
              if(get_field('reven_faq')):
            ?>
            <p class="no-margin"><a href="#" class="text-up go-faq-section">Veja as perguntas frequentes <i class="icon-chevron-small-down"></i></a></p>
            <p>Talvez sua dúvida já tenha sido respondida lá</p>
            <?php endif; ?>

          </div>
          <?php
            endif;
          ?>

        </div>

      </div>

    </div>

    <!-- depoimentos -->
    <?php
      $depoimentos = get_field('reve_depoimentos');
      if($depoimentos):
    ?>
    <div id="testimonials" class="small-12 left section-block">
      <div class="row">
        <div class="small-12 columns">
          <header class="divide-30 text-center">
            <h2><i class="icon-quotes-left"></i></h2>
          </header>

          <nav id="list-testimonials" class="small-12 left">
            <?php
              foreach ($depoimentos as $depo):
            ?>
            <figure class="small-12 left text-center item">
              <p><?php echo $depo['reve_depoimento_txt']; ?></p>

              <div class="small-12 large-8 large-offset-4 left">
                <?php
                  if(!empty($depo['reve_depoimentos_img']))
                    echo '<img src="'. $depo['reve_depoimentos_img'] .'" alt="" class="left">';

                  if(!empty($depo['reve_depoimentos_autor']))
                    echo '<p class="author-name left">'. $depo['reve_depoimentos_autor'] .'</p>';
                ?>
              </div>
            </figure>
            <?php
              endforeach;
            ?>
          </nav>
        </div>
      </div>
    </div>
    <?php
      endif;
    ?>

    <!-- perguntas frequentes -->
    <?php
      $faqs = get_field('reven_faq');
      if($faqs):
    ?>
    <div id="faq-section" class="small-12 left section-block">
      <div class="row">
        <div class="small-12 columns">
          <header class="divide-30 text-center">
            <h2 class="faq-header">Perguntas frequentes</h2>
          </header>

          <nav class="small-12 left">
            <ul class="no-bullet no-margin">
              <?php
                foreach ($faqs as $faq) {
                  echo '<li> <span class="faq-answer">'. $faq['reven_pergunta'] .' <i class="right icon-chevron-small-down"></i></span><span class="faq-reply">'. $faq['reven_resposta'] .'</span></li>';
                }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <?php
      endif;
    ?>
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