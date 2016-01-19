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
    $bg_header = $plandd_option['temp-blog-ele-header']['url'];
?>
<header id="blog-header" class="small-12 left rel" data-thumb="<?php echo $bg_header; ?>">
    <div class="blog-header-mask small-12 full-height abs left-axy"></div>
    <div class="row">
        <div class="small-12 columns d-table rel">
            <div class="small-12 d-table-cell text-center">
                <h1 class="blog-font">BLOG</h1>
                <h5 class="blog-font">Notícias e dicas do mundo da moda pra você</h5>
            </div>
        </div>
    </div>
</header>

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

