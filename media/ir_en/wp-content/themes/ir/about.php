<?php 
  /**
  * Template Name: About Us
  *
  * @package WordPress
  */

get_header(); 

?>
    <header id="header" class="small-12 left show-for-small-only text-center">
      <h1><a href="<?php echo home_url(); ?>" title="Home"><img src="<?php echo get_template_directory_uri();?>/images/logo-white.png" alt=""></a></h1>
      <p class="no-margin" style="padding-top:20px;font-size:14px;">
        <a href="<?php echo home_url(); ?>" class="white">
          Home
        </a>
      </p>
    </header>
    
    <section id="wrapper" class="small-12 left text-center about">

      <div class="video-content show-onload">

        <div class="video">
          <img src="<?php echo get_template_directory_uri();?>/images/blank.jpg" alt="" class="blank-img">
          <article>
            <div class="d-table small-12 text-center">
              <hgroup class="d-table-cell">
                <div class="d-iblock">
                  <h3><?php echo $plandd_option['txt-about-one']; ?></h3>
                  <h3><?php echo $plandd_option['txt-about-two']; ?></h3>
                </div>
              </hgroup>
            </div>
          </article>

          <?php
            require get_template_directory()."/inc/social.php";

            require get_template_directory()."/inc/menu.php";
          ?>

          <div class="small-12 left info-contact">
            <p class="small-12 left no-margin">
              <strong class="left">Aracaju, Brazil</strong>
              <strong><a href="<?php echo network_home_url(); ?>" title="Versão em português">pt</a> / <a href="<?php echo network_home_url(); ?>en" title="English version">en</a></strong>
              <strong class="right"><a href="mailto:<?php echo $plandd_option['inst-email']; ?>"><?php echo $plandd_option['inst-email']; ?></a></strong>
            </p>
          </div>

        </div>
      </div>
    </section>

<?php get_footer(); ?>
