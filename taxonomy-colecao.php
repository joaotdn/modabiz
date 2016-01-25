<?php
get_header();

global $plandd_option;
$obj = get_queried_object();

$layout = $plandd_option['temp-look-blocks-layout']['topo'];

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

$bg_img = get_field('lookbook_topo',$obj);
$video_mp4 = get_field('lookbook_topo_videomp4',$obj);
$video_ogv = get_field('lookbook_topo_video_ogv',$obj);
$video_3gp = get_field('lookbook_topo_video_3gp',$obj);
?>
<section id="temp-look" class="small-12 left">

    <header id="look-header" class="small-12 left d-table rel" <?php if($bg_img && !empty($bg_img)) echo 'data-thumb="'. $bg_img .'"'; ?>>
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
        <nav id="look-list" class="small-12 left grid show-onload">
<?php
  if (have_posts()) : while (have_posts()) : the_post();
  global $post;
  $th = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
  $banner_icon = get_field('look_icon',$post->ID);
  $banner_subtitle = get_field('look_subtitulo',$post->ID);
?>
    <figure class="small-12 medium-6 columns grid-item">

            <div class="share-item abs d-table colecion-share">
                <div class="d-table-cell small-12 text-center colecion-share icon-share-div">
                    <span class="icon-share2"></span>
                </div>
                <nav class="abs share-icons share-colection">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon-facebook" target="_blank"></a>
                    <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" class="icon-twitter" target="_blank"></a>
                    <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $th[0]; ?>&description=<?php the_title(); ?>" class="icon-pinterest2" target="_blank"></a>
                </nav>
            </div>

            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block small-12 left rel">
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
        </figure>
<?php endwhile; endif; ?>
        </nav>
    </div>
</section>

<?php
$layout = $plandd_option['temp-look-blocks-layout']['rodape'];

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

