<?php
get_header();

global $plandd_option;
global $post;
global $wp_query;

$obj = get_queried_object();

$layout = $plandd_option['temp-blog-list-layout']['topo'];

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

        <nav id="blog-list" class="small-12 large-8 columns">
            <header class="divide-30 left">
                <p class="no-margin">Você pesquisou por <strong><?php echo esc_html( get_search_query( false ) ); ?></strong>. Foram encontrado <?php echo $wp_query->found_posts; ?> resultados.</p>
            </header>

            <?php
                if (have_posts()) : while (have_posts()) : the_post();
                global $post;
                $comments_count = wp_count_comments();
            ?>
            <article class="post-item divide-30">
                <time class="small-12 left post-date text-center" pubdate>
                    <img src="<?php echo $date_icon; ?>" alt="">
                    <span><?php echo the_time('d \d\e F, Y'); ?></span>
                </time> 

                <h2 class="divide-20 text-center">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-title"><?php the_title(); ?></a>
                </h2>

                <nav class="share-footer show-for-large-up text-center">
                    <ul class="inline-list d-iblock no-margin">
                        <li><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink(); ?>"></div></li>
                        <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink();?>"></div></li>
                        <li><div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button"></div></li>
                    </ul>
                    <div class="divide-20"></div>
                </nav>

                <figure class="divide-20 post-th">
                    <?php
                        $thumb = getThumbUrl('large',$post->ID);
                        $video = get_field('post_video');
                        $link = get_permalink($post->ID);
                        if(!empty($thumb) || !empty($video)) {
                            if(!empty($video))
                                echo '<div class="flex-video no-margin">' . $video . '</div>';
                            else
                                echo "<a href=\"{$link}\"><img src=\"{$thumb}\" class=\"small-12 left\"></a>";
                        }
                    ?>
                </figure>

                <h5 class="divide-20 d-block post-author text-center text-up">Por: <?php echo the_author_meta( 'first_name' ); ?></h5>
                
                <?php
                    if(get_the_tags()):
                ?>
                <nav class="post-tags text-center">
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

                <p class="post-excerpt divide-30 text-center show-for-large-up"><?php the_excerpt(); ?></p>

                <p class="left no-margin">
                    <a href="<?php the_permalink(); ?>#disqus_thread" title="Comentários" class="post-comments text-up">
                        <?php
                            if(!empty($comments_icon))
                                echo '<img src="'. $comments_icon .'" alt="" style="margin-right:5px;">';
                        ?>
                        <span><?php comments_number( 'Sem comentários', '1 comentário', '% comentários' ); ?></span>
                    </a>
                </p>

                <p class="right no-margin">
                    <a href="<?php the_permalink(); ?>" title="Continuar lendo" class="post-read text-up">Continuar lendo <i class="icon-chevron-thin-right"></i></a>
                </p>
            </article>
            <?php endwhile; endif; ?>
            
        </nav>
        
        <?php
            /**
             * Sidebar
             */
            require get_template_directory()."/templates/blog_sidebar.php";
        ?>

        <footer id="nav-below" class="small-12 left text-center hide">
            <div class="divide-20"></div>
            <?php
              global $wp_query;

              $big = 999999999; // need an unlikely integer

              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'next_text'    => '&raquo;',
                'prev_text'    => '&laquo;',
                'type'         => 'list',
              ) );
            ?>
        </footer>
    </div>
    
</section>

<?php
/**
 * newsletter
 */
require get_template_directory()."/templates/newsletter.php";
//-----------------------------------------------------------

$layout = $plandd_option['temp-blog-list-layout']['rodape'];

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

