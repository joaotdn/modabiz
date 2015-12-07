<?php
/**
 * Componente: Cadastro
 * Descrição: Leva a página de cadastro de revendedores
 * Última atualização: 7 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="comp-galeria" class="small-12 left section-block">
	<div class="row">
		
		<nav id="list-galeria" class="small-12 left grid show-onload">
<?php
$quantidade = $plandd_option['comp-galeria-total'];
$args = array(
    'posts_per_page' => $quantidade,
    'orderby' => 'date',
    'post_type' => 'galeria'
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';

    $video = get_field('galeria_video',$post->ID);
    $icone = get_field('galeria_icone',$post->ID);
    $subtitulo = get_field('galeria_subtitulo',$post->ID);
    $url = get_field('galeria_url',$post->ID);
?>
			<figure class="small-6 columns grid-item">

				<a href="<?php echo $url; ?>" class="d-block small-12 left rel" <?php if($video && !empty($video)) echo 'data-reveal-id="video-' . $post->ID . '"'; ?>>

					<img src="<?php echo $th; ?>" alt="" class="grid-thumb">
					
					<figcaption class="small-12 abs full-height left-axy show-for-large-up">
					<?php
						if(!$video && empty($video)):
					?>
						<div class="d-table full-height small-12 text-center">
						    <div class="d-table-cell small-12">
						    	<?php
						    		if($icone && !empty($icone)):
						    	?>
						    	<span class="d-iblock divide-10">
									<img src="<?php echo $icone; ?>" alt="" >
								</span>
								<?php
									endif;
								?>
								<hgroup class="small-12 left">
									<h2 class="no-margin"><?php the_title(); ?></h2>
									<?php
										if($subtitulo && !empty($subtitulo))
											echo '<h4 class="no-margin">'. $subtitulo .'</h4>';
									?>
								</hgroup>
						    </div>
						</div>
					<?php
						else:
					?>
					<div class="d-table full-height small-12 text-center">
						<div class="d-table-cell small-12">
							<span class="d-iblock text-center play-btn">
								<h1 class="no-margin"><i class="icon-play3"></i></h1>
							</span>
						</div>
					</div>
					<?php
						endif;
					?>
					</figcaption>
				</a>

				<?php
					if($video && !empty($video)):
				?>
				<div id="video-<?php echo $post->ID; ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="divide-20"></div>
					<div class="flex-video small-12 left"><?php echo $video; ?></div>
			  		<a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
				<?php
					endif;
				?>
			</figure>
<?php
	endwhile; wp_reset_postdata(); endif;
?>
		</nav>

	</div>
</section>