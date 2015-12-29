<?php
  /**
   * Template Name: Quem somos
   *
   * @package WordPress
   * @subpackage modabiz
   * @since ModaBiz Creator 1.0
  */

  //Header
  get_header();

  global $plandd_option;

  $layout = $plandd_option['temp-marca-blocks-layout']['topo'];

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

  $galeria = get_field('marca_galeria');
  $info = get_field('marca_info');

  $info_video = get_field('marca_video_info');
  $video = get_field('marca_video');

  $video_mp4 = get_field('marca_video_mp4');
  $video_ogv = get_field('marca_video_ogv');
  $video_3gp = get_field('marca_video_3gp');

  if(isset($galeria)):
?>
<nav class="slideshow small-12 left show-onload" data-cycle-fx="carousel" data-cycle-speed="8000" data-cycle-timeout="1" data-cycle-easing="linear"
>
  <?php
    foreach ($galeria as $img):
  ?>
    <img src="<?php echo $img['url']; ?>" alt="">
  <?php
    endforeach;
  ?>
</nav>
<?php
  endif;
?>

<section id="marca-info" class="small-12 left section-block">
  <div class="row">
    <div class="small-12 columns">
    <?php
      echo $info;
    ?>
    </div>
  </div>
</section>

<?php
  if($video || $video_mp4 || $video_ogv || $video_3gp):
?>
<section id="marca-video" class="small-12 left section-block">
  <div class="row">
    <div class="small-12 columns">
      
      
      <?php if($info_video): ?>
      <article class="divide-30">
        <?php
          echo $info_video
        ?>
      </article>
      <?php endif; ?>

      <figure class="small-12 left flex-video">
      <?php
        if($video_mp4):
      ?>
        <video class="abs small-12 left-axy" controls>
          <source id="mp4_src"
                  src="<?php echo $video_mp4; ?>"
                  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
          </source>
          <?php
            if($video_3gp):
          ?>
          <source id="3gp_src"
                  src="<?php echo $video_3gp; ?>"
                  type='video/3gpp; codecs="mp4v.20.8, samr"'>
          </source>
          <?php
            endif;
            if($video_ogv):
          ?>
          <source id="ogg_src"
                  src="<?php echo $video_ogv; ?>"
                  type='video/ogg; codecs="theora, vorbis"'>
          </source>
          <?php
            endif;
          ?>
        </video>
      <?php
        else:
          echo $video;
        endif;
      ?>
      </figure>
    </div>
  </div>
</section>
<?php 
endif;

$reven_info = get_field('marca_reven_info');
$reven_btn = get_field('marca_reven_btn');
$reven_url = get_field('marca_reven_btn_url');

if($reven_info):
?>

<section id="marca-reven" class="small-12 left section-block">
  <div class="row">
    <div class="small-12 columns">
      <?php
        echo $reven_info;
      ?>
      <div class="divide-30"></div>
      <?php
        if($reven_btn && $reven_url)
          echo '<a href="'. $reven_url .'" class="reven-btn left d-block">'. $reven_btn .'</a>';
      ?>
    </div>
  </div>
</section>

<?php
endif;


  //footer

  $layout = $plandd_option['temp-marca-blocks-layout']['rodape'];

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