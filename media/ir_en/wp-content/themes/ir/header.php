<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>

    <?php echo $plandd_option['inst-analytics']; wp_head(); ?>
  </head>
  <?php
    $page = (get_page_by_title('About Us')) ? get_page_by_title('About Us') : get_page_by_title('Sobre nós');
  ?>
  <body <?php if(is_page($page->ID)) echo "class=\"about-page\""; ?>>

    <div class="small-12 abs loader-container">
      <div class="small-12 d-table">
        <div class="small-12 text-center d-table-cell">
          <img src="<?php echo get_template_directory_uri();?>/images/loader.gif" alt="" class="d-iblock">
        </div>
      </div>
    </div>