<?php
get_header();

global $plandd_option;
$obj = get_queried_object();

$link_tax = get_term_link( $obj, 'colecao-camapanha' );

$layout = $plandd_option['temp-camp-blocks-layout']['topo'];

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

$bg_img = get_field('campanha_topo',$obj);
$video_mp4 = get_field('campanha_topo_videomp4',$obj);
$video_ogv = get_field('campanha_topo_video_ogv',$obj);
$video_3gp = get_field('campanha_topo_video_3gp',$obj);
?>
<section id="temp-camp" class="small-12 left">

    <header id="camp-header" class="small-12 left d-table rel" <?php if($bg_img && !empty($bg_img)) echo 'data-thumb="'. $bg_img .'"'; ?>>
        <?php
          if($video_mp4 || $video_ogv || $video_3gp):
        ?>
        <figure class="small-12 left abs left-axy">
            <video class="abs small-12 left-axy" muted autoplay loop>
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
          </figure>
          <?php
            endif;
          ?>
        <div class="mask"></div>
        <div class="d-table-cell small-12 text-center rel">
            <h1><?php echo single_cat_title(); ?></h1>
        </div>
    </header>

    <div class="row section-block">
        <nav id="camp-list" class="small-12 left grid show-onload">
<?php
  if (have_posts()) : while (have_posts()) : the_post();
  global $post;
  $th = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
  $banner_icon = get_field('camp_icon',$post->ID);
  $banner_subtitle = get_field('camp_subtitulo',$post->ID);
  $id_modal = 'item-' . uniqid();

  //conteudo com texto
  $camp_txt = get_field('camp_texto',$post->ID);
  $camp_cor = get_field('camp_cor',$post->ID);
  $camp_bg = get_field('camp_bg',$post->ID);
?>
    <figure class="small-12 medium-6 columns grid-item">
            <?php
              if(!$camp_txt):
            ?>

            <div class="share-item abs d-table colecion-share">
                
                <div class="d-table-cell small-12 text-center icon-share-div">
                    <span class="icon-share2"></span>
                </div>

                <nav class="abs share-icons share-colection">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link_tax; ?>" class="icon-facebook" target="_blank"></a>
                    <a href="https://twitter.com/home?status=<?php echo $link_tax; ?>" class="icon-twitter" target="_blank"></a>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php echo $link_tax; ?>&media=<?php echo $th[0]; ?>&description=<?php the_title(); ?>" class="icon-pinterest2" target="_blank"></a>
                </nav>

            </div>
            
            <?php
              endif;
              if(!$camp_txt):
            ?>
            <a href="#" data-reveal-id="<?php echo $id_modal; ?>" title="<?php the_title(); ?>" class="d-block small-12 left rel">
                <img src="<?php echo $th[0]; ?>" alt="" class="small-12 left">
                <figcaption class="small-12 abs full-height left-axy show-for-large-up">
                    <div class="d-table full-height small-12 text-center">
                        <div class="d-table-cell small-12">
                            <?php
                                if($banner_icon && !empty($banner_icon)):
                            ?>
                            <span class="d-iblock divide-10">
                                <img src="<?php echo $banner_icon ?>" alt="">
                            </span>
                            <?php
                                endif;
                            ?>
                            <hgroup class="small-12 left">
                                <h2 class="divide-10"><?php the_title(); ?></h2>
                                <?php
                                    if($banner_subtitle && !empty($banner_subtitle))
                                        echo '<h4>'. $banner_subtitle .'</h4>';
                                ?>
                            </hgroup>
                        </div>
                    </div>
                </figcaption>
            </a>

            <div id="<?php echo $id_modal; ?>" class="reveal-modal text-center" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
              <img src="<?php echo $th[0]; ?>" alt="">
              <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
            <?php
              else:
            ?>
            <a href="#" class="small-12 columns" style="background-color:<?php echo $camp_bg; ?>;">
              <header class="divide-30 text-center">
                <div class="divide-20"></div>
                <img src="<?php echo $banner_icon ?>" alt="">
                <div class="divide-20"></div>
                <h3 class="camp-text-title" style="color:<?php echo $camp_cor; ?>"><?php the_title(); ?></h3>
              </header>

              <p class="text-center camp-text-p" style="color:<?php echo $camp_cor; ?>"><?php echo $camp_txt ?></p>
            </a>
            <?php
              endif;
            ?>
        </figure>
<?php endwhile; endif; ?>
        </nav>
    </div>
</section>

<?php
$layout = $plandd_option['temp-camp-blocks-layout']['rodape'];

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

