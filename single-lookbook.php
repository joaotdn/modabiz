<?php
get_header();

global $plandd_option;
$obj = get_queried_object();
$height = $plandd_option['temp-cole-altura']['height']; 

$layout = $plandd_option['temp-look-int-blocks-layout']['topo'];

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
<section id="inner-look" class="small-12 left section-block">
    <div class="row">
        <div class="small-12 columnns">
            <nav id="breadcrumb" class="small-12 left">
                <?php the_breadcrumb(); ?>
                <div class="divide-30"></div>
            </nav>

            <header class="divide-40">
                <h1 class="left"><?php the_title(); ?></h1>

                <nav class="share-footer show-for-large-up right">
                    <ul class="inline-list d-iblock no-margin">
                        <li><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink();;?>"></div></li>
                        <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink();;?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink();;?>"></div></li>
                    </ul>
                </nav>
            </header>

            <nav id="look-slider" class="small-12 left rel">
                
                <div class="list-items-look" style="height:<?php echo $height; ?>;">
                    <nav id="item-choices" class="divide-30">
                        <ul class="inline-list no-margin">
                            <li class="share-look rel" data-tooltip aria-haspopup="true" class="has-tip" title="Compartilhe esta imagem">
                                <a href="#" data-hover="<?php echo $plandd_option['temp-cole-choices-share-hover']['url']; ?>" class="text-center rel">
                                    <?php echo '<img src="'.$plandd_option['temp-cole-choices-share']['url'] . '" class="d-iblock">'; ?>
                                </a>
                                <nav class="abs share-icons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=" class="icon-facebook" target="_blank"></a>
                                    <a href="https://twitter.com/home?status=" class="icon-twitter" target="_blank"></a>
                                    <a href="https://pinterest.com/pin/create/button/?url=&media=&description=" class="icon-pinterest2" target="_blank"></a>
                                </nav>
                            </li>

                            <li data-tooltip aria-haspopup="true" class="has-tip" title="Medidas">
                                <a href="#" data-reveal-id="myModal" data-hover="<?php echo $plandd_option['temp-cole-choices-meter-hover']['url']; ?>" class="text-center">
                                    <?php echo '<img src="'.$plandd_option['temp-cole-choices-meter']['url'] . '" class="d-iblock">'; ?>
                                </a>

                                <div id="myModal" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                  <header class="divide-30">
                                      <h3>Tamanhos e medidas</h3>
                                  </header>

                                  <div class="info-meters small-12 left text-center">
                                      <ul class="small-block-grid-4 no-margin">
                                          <li>Numeração (cm)</li>
                                          <li>Busto (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Para medir o busto, contorne o tronco na altura do centro do perito com uma fita métrica">Como medir</span></li>
                                          <li>Cintura (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Passe a fita métrica na região próxima ao umbigo, abaixo das costelas.">Como medir</span></li>
                                          <li>Quadril (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Contorne a região mais longa dos quadris para tirar a medida">Como medir</span></li>
                                      </ul>
                                  </div>
                                  <div class="divide-20"></div>

                                  <nav class="meter-list small-12">
                                    <ul class="no-bullet no-margin">
                                        <li class="small-12 left">
                                            <ul class="small-block-grid-4 no-margin">
                                                <li class="text-center">P</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                            </ul>
                                        </li>

                                        <li class="small-12 left">
                                            <ul class="small-block-grid-4 no-margin">
                                                <li class="text-center">P</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                            </ul>
                                        </li>

                                        <li class="small-12 left">
                                            <ul class="small-block-grid-4 no-margin">
                                                <li class="text-center">P</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                                <li class="text-center">45-70</li>
                                            </ul>
                                        </li>
                                    </ul>
                                  </nav>
                                  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                                </div>
                            </li>

                            <li data-tooltip aria-haspopup="true" class="has-tip" title="Envie para o email de alguém!">
                                <a href="#" data-hover="<?php echo $plandd_option['temp-cole-choices-gift-hover']['url']; ?>" class="text-center">
                                    <?php echo '<img src="'.$plandd_option['temp-cole-choices-gift']['url'] . '" class="d-iblock">'; ?>
                                </a>
                            </li>

                            <li data-tooltip aria-haspopup="true" class="has-tip" title="Veja na loja">
                                <a href="#" data-hover="<?php echo $plandd_option['temp-cole-choices-sacola-hover']['url']; ?>" class="text-center">
                                    <?php echo '<img src="'.$plandd_option['temp-cole-choices-sacola']['url'] . '" class="d-iblock">'; ?>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <figure class="small-12 left" style="height:<?php echo $height; ?>;">
                        <img src="http://plan-dev.com.br/modabiz/wp-content/uploads/2015/12/02.jpg" alt="">
                    </figure>
                </div>
                
            </nav>
        </div>
    </div>
</section>
<?php
$layout = $plandd_option['temp-look-int-blocks-layout']['rodape'];

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

