<?php
get_header();

global $plandd_option;
global $post;
$obj = get_queried_object();
$height = $plandd_option['temp-cole-altura']['height'];
$_h = explode('px', $height);
$nav_height = $_h[0] - 96;

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
                        <li><div class="fb-like" data-layout="button_count" data-href="<?php the_permalink(); ?>"></div></li>
                        <li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">Tweet</a></li>
                        <li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php the_permalink(); ?>"></div></li>
                    </ul>
                </nav>
            </header>
            
            <section class="small-12 left rel"> 

                <a href="#" class="next-lookbook nav-lookbook abs d-table" style="height:<?php echo $nav_height; ?>px;">
                    <span class="d-table-cell small-12">
                        <span class="icon-chevron-thin-left"></span>
                    </span>
                </a>

                <a href="#" class="prev-lookbook nav-lookbook abs d-table" style="height:<?php echo $nav_height; ?>px;">
                    <span class="d-table-cell small-12">
                        <span class="icon-chevron-thin-right"></span>
                    </span>
                </a>

                <nav id="look-slider" class="small-12 left rel">
                    <?php
                        $items = get_field('look_items');
                        $thumbs = array();

                        if($items):
                            foreach ($items as $item):
                                $id_unique = uniqid();
                                $id_unique_gift = uniqid();
                                $url = $item['look_url'];
                    ?>

                    <div class="list-items-look item" style="height:<?php echo $height; ?>;">

                        <nav id="item-choices" class="divide-30">

                            <ul class="list-choices no-margin">

                                <li data-tooltip aria-haspopup="true" class="has-tip" title="Medidas">
                                    <a href="#" data-reveal-id="item-<?php echo $post->ID . '-' . $id_unique; ?>" data-hover="<?php echo $plandd_option['temp-cole-choices-meter-hover']['url']; ?>" class="text-center">
                                        <?php echo '<img src="'.$plandd_option['temp-cole-choices-meter']['url'] . '" class="d-iblock">'; ?>
                                    </a>

                                    <div id="item-<?php echo $post->ID . '-' . $id_unique; ?>" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                      
                                      <header class="divide-30">
                                          <h1 class="meter-title">Tamanhos e medidas</h1>
                                      </header>

                                      <div class="info-meters small-12 left text-center">
                                          <ul class="small-block-grid-4 no-margin">
                                              <li>Numeração (cm)</li>
                                              <li>Busto (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Para medir o busto, contorne o tronco na altura do centro do peito com uma fita métrica">Como medir</span></li>
                                              <li>Cintura (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Passe a fita métrica na região próxima ao umbigo, abaixo das costelas.">Como medir</span></li>
                                              <li>Quadril (cm)<br><span data-tooltip aria-haspopup="true" class="has-tip font-small" title="Contorne a região mais longa dos quadris para tirar a medida">Como medir</span></li>
                                          </ul>
                                      </div>
                                      <div class="divide-20"></div>

                                      <nav class="meter-list small-12">
                                        <ul class="no-bullet no-margin">
                                            <?php
                                                $medidas = $item['look_medidas'];
                                                foreach ($medidas as $medida):
                                            ?>
                                            <li class="small-12 left">
                                                <ul class="small-block-grid-4 no-margin">
                                                    <li class="text-center"><?php echo $medida['look_tamanho']; ?></li>
                                                    <li class="text-center"><?php echo $medida['look_busto']; ?></li>
                                                    <li class="text-center"><?php echo $medida['look_cintura']; ?></li>
                                                    <li class="text-center"><?php echo $medida['look_quadril']; ?></li>
                                                </ul>
                                            </li>
                                            <?php
                                                endforeach;
                                            ?>
                                        </ul>
                                      </nav>
                                      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                                    </div>
                                </li>

                                <li data-tooltip aria-haspopup="true" class="has-tip" title="Envie para o email de alguém!">
                                    <a href="#" data-reveal-id="item-<?php echo $post->ID . '-' . $id_unique_gift; ?>" data-hover="<?php echo $plandd_option['temp-cole-choices-gift-hover']['url']; ?>" class="text-center">
                                        <?php echo '<img src="'.$plandd_option['temp-cole-choices-gift']['url'] . '" class="d-iblock">'; ?>
                                    </a>

                                    <div id="item-<?php echo $post->ID . '-' . $id_unique_gift; ?>" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                        
                                        <form class="gift-form small-12 columns">
                                            <header class="divide-30">
                                                <h1 class="meter-title">Pedir de presente</h1>
                                            </header> 

                                            <p>
                                                <input type="email" name="email" class="small-12 left" required title="Seu email" placeholder="EMAIL*">
                                            </p>

                                            <p>
                                                <textarea name="mensagem" rows="10" placeholder="MENSAGEM"></textarea>
                                            </p>

                                            <p>
                                                <button type="submit" class="right">ENVIAR</button>
                                            </p> 
                                            <input type="hidden" name="item-gift" value="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $item['look_img']; ?>&description=">   
                                        </form>
                                        
                                        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                                    </div>
                                </li>
                                
                                <?php
                                    if($url && !empty($url)):
                                ?>
                                <li data-tooltip aria-haspopup="true" class="has-tip" title="Veja na loja">
                                    <a href="#" data-hover="<?php echo $plandd_option['temp-cole-choices-sacola-hover']['url']; ?>" class="text-center">
                                        <?php echo '<img src="'.$plandd_option['temp-cole-choices-sacola']['url'] . '" class="d-iblock">'; ?>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <li class="share-look rel">
                                    <a href="#" data-hover="<?php echo $plandd_option['temp-cole-choices-share-hover']['url']; ?>" class="text-center rel">
                                        <?php echo '<img src="'.$plandd_option['temp-cole-choices-share']['url'] . '" class="d-iblock">'; ?>
                                    </a>
                                    <nav class="abs share-icons">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="icon-facebook net-icon" target="_blank"></a>
                                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" class="icon-twitter net-icon" target="_blank"></a>
                                        <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $item['look_img']; ?>&description=" class="icon-pinterest2 net-icon" target="_blank"></a>
                                    </nav>
                                </li>
                            </ul>
                        </nav>

                        <figure class="small-12 left text-center item-th rel" style="height:<?php echo $height; ?>;">
                            <?php
                                $ref = $item['look_ref'];
                                if(!empty($ref))
                                    echo '<p class="small-12 abs prod-ref text-center"><span>'. $ref .'</span></p>';
                            ?>
                            <img src="<?php echo $item['look_img']; ?>" alt="">
                        </figure>
                    </div>
                    <?php
                        $thumbs[] = $item['look_img'];
                        endforeach;
                        endif;
                    ?>
                </nav>
            </section>

            <div class="divide-20"></div>

            <section class="small-12 left rel">
                <nav id="campaing-carousel" class="small-12 left rel">
                <?php
                    foreach ($thumbs as $th) {
                       echo '<figure class="item left" data-thumb="'. $th .'"></figure>';
                    }
                ?>
                </nav>

                <a href="#" class="abs nav-look-thumbs prev-carousel icon-chevron-thin-left"></a>
                <a href="#" class="abs nav-look-thumbs next-carousel icon-chevron-thin-right"></a>
            </section>

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

