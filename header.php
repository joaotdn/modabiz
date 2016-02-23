<?php
  global $plandd_option;
  $gmap_api = $plandd_option['comp-geo-api'];
  $icon = $plandd_option['app-favicon']['url'];
  $page_resposta = get_page_by_title( 'Resposta' );
?>
<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>
    <?php
      if($gmap_api && !empty($gmap_api))
        echo '<script src="https://maps.googleapis.com/maps/api/js?key='. $gmap_api .'"></script>';
      
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
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>',
        'resposta': '<?php echo get_page_link( $page_resposta->ID ); ?>'
      }
      //]]>
    </script>
    
    <?php
    	wp_head();

      $analytics = $plandd_option['modabiz-analytics'];
      if(!empty($analytics))
        echo $analytics;
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
