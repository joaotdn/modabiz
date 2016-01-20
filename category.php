<?php
get_header();

global $plandd_option;
global $post;
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

<header id="blog-header" class="divide-10 rel" data-thumb="<?php echo $bg_header; ?>">
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
?>
<section class="small-12 left section-block">
    <div class="row">
        <nav id="blog-list" class="small-12 large-8 columns">
            
            <article class="post-item divide-30">
                <time class="small-12 left post-date text-center" pubdate>
                    <img src="<?php echo $date_icon; ?>" alt="">
                    <span>12 de janeiro, 2015</span>
                </time> 

                <h2 class="divide-20 text-center">
                    <a href="#" title="" class="blog-title">Lorem ipsum dolor sit amet</a>
                </h2>

                <figure class="divide-20 post-th">
                    <a href="#" class="d-block">
                        <img src="http://sessaolegal.com.br/wp-content/uploads/2012/03/jeans-da-moda-2012-osborne-marca-de-sucesso.jpg" alt="" class="small-12 left">
                    </a>
                </figure>

                <h5 class="divide-20 d-block post-author text-center text-up">Por: João Teodoro</h5>

                <nav class="post-tags">
                    
                </nav>
            </article>

        </nav>
        
        <!-- sidebar -->
        <aside id="sidebar" class="small-12 large-4 columns">
            
        </aside>
    </div>
    
</section>

<?php
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

