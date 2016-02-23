<?php
  global $plandd_option;
  $gmap_api = $plandd_option['comp-geo-api'];
  $icon = $plandd_option['app-favicon']['url'];
  $page_resposta = get_page_by_title( 'Resposta' );
?>
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
