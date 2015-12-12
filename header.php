<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB664XOo1V2z76RD87sMi4b4nAM1JzKthg'></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
   
    <?php
      global $plandd_option;
      $icon = $plandd_option['app-favicon']['url'];
      if($icon && !empty($icon)):
        ?>
        <link rel="shortcut icon" href="<?php echo $icon; ?>" type="image/vnd.microsoft.icon"/>
        <link rel="icon" href="<?php echo $icon; ?>" type="image/x-ico"/>
        <?php
      endif;
    ?>
    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>'
      }
      //]]>
    </script>
    
    <?php
    	wp_head();
    ?>
  </head>
  <body style="height:1000px;">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=311641142285753";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'pt-BR'}
  </script>
  
  <!-- menu scroll -->
  <nav id="main-menu-mo" class="small-12 left">
    <div class="row d-table"></div>
  </nav>
  
  <!-- menu principal -->
  <nav id="main-menu" class="small-12 left">
    <div class="row d-table">
      <div class="small-12 d-table-cell">
        <div class="small-12 columns">
        <?php
          //Marca
          $marca = $plandd_option['comp-topo-marca']['url'];
          $height = $plandd_option['comp-topo-altura']['height'];

          if($marca && !empty($marca))
            echo '<figure class="d-iblock"><a href="'. home_url() .'" title="Página principal" class="d-block logo"><img src="'. $marca .'" alt="'. get_bloginfo( 'name' ) .'" style="height:'. $height .';width:auto;"></a></figure>';

          //Abrir o menu
          $menu_icon = $plandd_option['comp-topo-menuicon']['url'];
          $menu_icon_hover = $plandd_option['comp-topo-menuicon-hover']['url'];

          if($menu_icon && !empty($menu_icon))
            echo '<figure class="d-table open-menu right"><a href="#" title="Abrir o menu" class="d-table-cell" data-hover="'. $menu_icon_hover .'"><img src="'. $menu_icon .'" alt="Menu"></a></figure>';
        ?>
        </div>
      </div>
    </div>
  </nav>

  <nav id="list-menu">
    <header class="divide-20">
      <?php
        $fechar = $plandd_option['comp-topo-menuicon-close']['url'];
        if($fechar && !empty($fechar))
          echo '<figure class="right"><a href="#" title="Fechar menu" class="d-iblock close-menu"><img src="'. $fechar .'" alt=""></a></figure>';
      ?>
    </header>

    <ul class="no-bullet no-margin">
      <?php
        $defaults = array(
          'theme_location'  => 'primary',
          'menu'            => 'Menu principal',
          'container'       => '',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'primary',
          'before'          => '<h3>',
          'after'           => '</h3>',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '%3$s',
          'depth'           => 0,
          'walker'          => '',
        );
        wp_nav_menu($defaults);
      ?>
    </ul>

    <ul class="inline-list social-menu">
      <?php
        $facebook = $plandd_option['corp-facebook'];
        $twitter = $plandd_option['corp-twitter'];
        $instagram = $plandd_option['corp-instagram'];

        if($facebook && !empty($facebook))
          printf('<li><h3><a href="%s" class="icon-facebook-with-circle" target="_blank"></a></h3></li>',$facebook);

        if($twitter && !empty($twitter))
          printf('<li><h3><a href="%s" class="icon-twitter3" target="_blank"></a></h3></li>',$twitter);

        if($instagram && !empty($instagram))
          printf('<li><h3><a href="%s" class="icon-instagram-with-circle" target="_blank"></a></h3></li>',$instagram);
      ?>
    </ul>
  </nav>
