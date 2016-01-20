<?php get_header(); ?>

    <header id="header" class="small-12 left show-for-small-only text-center">
      <h1><a href="<?php echo home_url(); ?>" title="Home"><img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt=""></a></h1>
      <p class="no-margin" style="padding-top:20px;font-size:14px;">
        <?php
          $page = (get_page_by_title('About Us')) ? get_page_by_title('About Us') : get_page_by_title('Sobre nós');
        ?>
        <a href="<?php echo get_page_link($page->ID); ?>">
          <?php echo $plandd_option['btn-about']; ?>
        </a>
      </p>
    </header>

    <section id="wrapper" class="small-12 left text-center">

      <div class="video-content show-onload">
        <div class="video">

          <?php
            $args = array( 'posts_per_page' => 1, 'taxonomy' => 'category' );
            $_posts = get_posts( $args );
            foreach ($_posts as $post): setup_postdata( $post ); global $post;
          ?>
          <img src="<?php echo get_field('video_img',$post->ID); ?>" alt="">
          <?php endforeach; ?>
          
          <?php
            require get_template_directory()."/inc/menu.php";
          ?>

          <!-- botão play -->
          <?php
            $args = array( 'posts_per_page' => 1, 'taxonomy' => 'category' );
            $_posts = get_posts( $args );
            foreach ($_posts as $post): setup_postdata( $post ); global $post;
          ?>
          <div class="play-button small-12">
            <div class="d-table small-12 full-height text-center">
              <div class="d-table-cell small-12">
                <a href="#" class="text-center" title="<?php the_title(); ?>" class="">
                  <img src="<?php echo get_template_directory_uri();?>/images/play_icon.png" alt="" class="icon">
                </a>
              </div>
            </div>
          </div>

          <div class="video-embed" data-embed='<?php echo get_field('video_emb'); ?>'>
            
          </div>
          <?php endforeach; ?>

          <div class="small-12 left info-contact">
            <p class="small-12 left no-margin">
              <strong class="left">Aracaju, Brazil</strong>
              <strong><a href="<?php echo network_home_url(); ?>" title="Versão em português">pt</a> / <a href="<?php echo network_home_url(); ?>" title="English version">en</a></strong>
              <strong class="right"><a href="mailto:<?php echo $plandd_option['inst-email']; ?>"><?php echo $plandd_option['inst-email']; ?></a></strong>
            </p>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
