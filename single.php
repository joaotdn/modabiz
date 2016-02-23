<?php
get_header();

global $plandd_option;
global $post;
$obj = get_queried_object();

$layout = $plandd_option['temp-blog-inner-layout']['topo'];

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

        case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

    }
}
 
endif;
?>

<?php
    /**
     * Cabeçalho
     */
    $bg_header = $plandd_option['temp-blog-ele-header']['url'];
    $desc = $plandd_option['temp-blog-ele-header-txt'];
?>

<header id="blog-header" class="small-12 left rel" data-thumb="<?php echo $bg_header; ?>">
    <div class="blog-header-mask small-12 full-height abs left-axy"></div>
    <div class="row">
        <div class="small-12 columns d-table rel">
            <div class="small-12 d-table-cell text-center">
                <h1 class="blog-font">BLOG</h1>
                <?php
                    if(!empty($desc))
                        echo '<h5 class="blog-font">'. $desc .'</h5>';
                ?>
            </div>
        </div>
    </div>
</header>

<?php
    $date_icon = $plandd_option['temp-bloglist-date-icon']['url'];
    $comments_icon = $plandd_option['temp-bloglist-comments-icon']['url'];
?>
<section id="blog-section" class="small-12 left section-block">
    <div class="row">

        <article id="single-post" class="small-12 large-8 columns">
            <time class="divide-20 post-date" pubdate>
                <img src="<?php echo $date_icon; ?>" alt="">
                <span><?php echo the_time('d \d\e F, Y'); ?></span>
            </time> 

            <h2 class="divide-20 blog-title"><?php the_title(); ?></h2>

            <h5 class="divide-20 d-block post-author text-up">
                <span class="left">Por: <?php echo the_author_meta( 'first_name' ); ?></span>
                <span class="right">
                    <a href="#disqus_thread" title="Comentários" class="post-comments">
                        <?php
                            if(!empty($comments_icon))
                                echo '<img src="'. $comments_icon .'" alt="" style="margin-right:5px;">';
                        ?>
                        <span><?php comments_number( 'Sem comentários', '1 comentário', '% comentários' ); ?></span>
                    </a>
                </span>
            </h5>
            
            <?php
                if(get_the_tags()):
            ?>
            <nav class="post-tags">
                <ul class="inline-list d-iblock">
                <?php
                    $posttags = get_the_tags();
                    foreach ($posttags as $tag) {
                      $tag_link = get_tag_link($tag->term_id);
                      echo '<li><a href="'. $tag_link .'">'. $tag->name .'</a></li>';
                    }
                ?>
                </ul>
            </nav>
            <?php
                endif;
            ?>
            
            <nav class="share-footer show-for-large-up">
                <ul class="inline-list d-iblock no-margin">
                    <li class="no-margin"><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink(); ?>"></div></li>
                    <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Tweet</a></li>
                    <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink();?>"></div></li>
                    <li><div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button"></div></li>
                </ul>
                <div class="divide-20"></div>
            </nav>
            
            <div class="post-content divide-20">
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $video = get_field('post_video');
                    if(!empty($video)) {
                        echo "<figure class=\"divide-30\">";
                        echo '<div class="flex-video no-margin">' . $video . '</div>';
                        echo "</figure>";
                    }
                    the_content();
                endwhile; endif;
            ?>
            </div>
            
            <?php
                $disqus = $plandd_option['corp-disqs'];
                if(!empty($disqus)):
            ?>
            <nav id="comments" class="divide-30">
                <div id="disqus_thread"></div>
                  <script type="text/javascript">
                      /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                      var disqus_shortname = 'modabiz'; // required: replace example with your forum shortname

                      /* * * DON'T EDIT BELOW THIS LINE * * */
                      (function() {
                          var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                          dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                      })();
                  </script>
                  <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </nav>
            <?php
                endif;
            ?>

        </article>
        
        <?php
            /**
             * Sidebar
             */
            require get_template_directory()."/templates/blog_sidebar.php";
        ?>

    </div>
    
</section>

<?php
/**
 * newsletter
 */
require get_template_directory()."/templates/newsletter.php";
//-----------------------------------------------------------

$layout = $plandd_option['temp-blog-inner-layout']['rodape'];

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

        case 'cabecalho': require get_template_directory()."/includes/componentes/cabecalho.php";    
          break;

          case 'rodape': require get_template_directory()."/includes/componentes/rodape.php";    
          break;

    }
}
 
endif;

get_footer();
?>

