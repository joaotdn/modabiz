<?php
/**
 * Componente: Painel
 * Descrição: Conteúdo alimentado a partir do CPT painel
 * Última atualização: 3 de dezembro de 2015
 */
global $plandd_option;
$height = $plandd_option['comp-painel-altura']['height']; // altura do painel (desktop)
?>
<section id="main-painel" class="small-12 left d-table rel">
	<div class="small-12 d-table-cell text-center slider-loader rel">
		<span class="icon-spinner8 font-large anim-rotate"></span>
	</div>

	<nav class="slider-items small-12 abs left-axy show-onload">
<?php
$total = $plandd_option['comp-painel-total'];
$args = array(
    'posts_per_page' => $total,
    'orderby' => 'date',
    'post_type' => 'painel'
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = get_field('painel_imagem',$post->ID);
    $video = get_field('painel_video',$post->ID);
    $subtitulo = get_field('painel_subtitulo',$post->ID);
    $botao = get_field('painel_botao',$post->ID);
    $titulo = get_field('painel_titulo',$post->ID);
    $url = get_field('painel_url',$post->ID);
?>	
		<?php
			if($video && !empty($video))
				echo '<figure class="item small-12 left full-height">';
			else
				echo '<figure class="item small-12 left full-height" data-thumb="'. $thumb .'">';
		?>
			<a href="<?php echo $url; ?>" class="small-12 slider-mask d-block full-height abs left-axy" title=""></a>

			<?php
				if($video && !empty($video)):
			?>
			<video class="abs small-12 left-axy" loop="" autoplay="" muted="">
	            <source src="<?php echo $video; ?>" type="video/mp4">
	        </video>
	    	<?php endif; ?>

			
			<div class="row rel d-table slider-content" style="<?php echo "height:{$height};"; ?>">
				<a href="<?php echo $url; ?>" class="small-12 slider-link d-block full-height abs left-axy" title=""></a>
				<div class="d-table-cell small-12">
					<div class="small-12 columns text-center rel">
						<?php
							if($titulo && !empty($titulo))
								echo '<h1><a href="'. $url .'" title="'. $titulo .'">'. $titulo .'</a></h1><div class="divide-30 show-for-large-up"></div>';

							if($titulo && !empty($titulo))
								echo '<h3><a href="'. $url .'" title="'. $subtitulo .'">'. $subtitulo .'</a></h3><div class="divide-40 show-for-large-up"></div>';

							if($titulo && !empty($titulo))
								echo '<p><a href="'. $url .'" class="slider-button d-iblock" title="'. $botao .'">'. $botao .'</a></p>';
						?>
					</div>
				</div>
			</div>
		</figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
	</nav>

	<a href="#" class="d-table abs nav-painel next-painel" style="<?php echo "height:{$height};"; ?>">
		<span class="d-table-cell">
			<span class="icon-chevron-thin-right"></span>
		</span>
	</a>

	<a href="#" class="d-table abs nav-painel prev-painel" style="<?php echo "height:{$height};"; ?>">
		<span class="d-table-cell">
			<span class="icon-chevron-thin-left"></span>
		</span>
	</a>
</section>