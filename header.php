<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB664XOo1V2z76RD87sMi4b4nAM1JzKthg&sensor=false'></script>
    
    <?php
      global $plandd_option;
      $icon = $plandd_option['app-favicon'];
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
  <body>

  <nav id="main-menu" class="small-12 left">
    <div class="row d-table">
      <div class="small-12 d-table-cell">
        <?php
          //Marca
          $marca = $plandd_option['comp-topo-marca']['url'];
          $height = $plandd_option['comp-topo-altura']['height'];

          if($marca && !empty($marca))
            echo '<figure class="d-iblock"><a href="'. home_url() .'" title="Página principal" class="d-block logo"><img src="'. $marca .'" alt="'. get_bloginfo( 'name' ) .'" style="height:'. $height .';"></a></figure>';

          //Abrir o menu
          $menu_icon = $plandd_option['comp-topo-menuicon']['url'];
          $menu_icon_hover = $plandd_option['comp-topo-menuicon-hover']['url'];

          if($menu_icon && !empty($menu_icon))
            echo '<figure class="d-table open-menu right"><a href="#" title="Abrir o menu" class="d-table-cell" data-hover="'. $menu_icon_hover .'"><img src="'. $menu_icon .'" alt="Menu"></figure>';
        ?>
      </div>
    </div>
  </nav>
