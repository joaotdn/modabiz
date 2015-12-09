<?php
get_header();

global $plandd_option;
$layout = $plandd_option['temp-home-blocks-layout']['template'];

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

