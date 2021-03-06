<?php
/**
 * Componente: Blog
 * Descrição: Lista de posts e link para campanhas personalizadas
 * Última atualização: 7 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="comp-blog" class="small-12 left section-block">
	<div class="row">
		<nav id="list-posts" class="small-12 left">
<?php
$quantidade = $plandd_option['comp-blog-total'];
$args = array(
    'posts_per_page' => $quantidade,
    'orderby' => 'date',
    'post_type' => 'post'
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
			
			<figure class="small-12 medium-4 columns">
				<div class="comp-post small-12 left rel" data-thumb="<?php echo $th; ?>">
					<div class="post-content small-12 left rel">
						<header class="abs small-12 text-center">
							<h5 class="text-up no-margin"><a href="<?php echo get_first_category_link($post->ID); ?>" title="<?php echo get_first_category_name($post->ID); ?>"><?php echo get_first_category_name($post->ID); ?></a></h5>
						</header>

						<article class="small-12 full-height left d-table">
							<div class="d-table-cell small-12 text-center">
								<h1 class="divide-20">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h1>
								<p>
									<a href="<?php the_permalink(); ?>"><?php echo substr(get_the_excerpt(), 0, 50); ?></a>
								</p>
							</div>
						</article>

						<footer class="small-12 abs text-center">
							<time><?php echo get_the_time('d \d\e F'); ?></time>
						</footer>
					</div>
				</div>
			</figure>
<?php
    endwhile; wp_reset_postdata(); endif;

    $campanha = $plandd_option['comp-blog-camp-active'];
    $items = $plandd_option['comp-blog-camp-items'];
    $total = $plandd_option['comp-blog-camp-total'];
    $ordem = $plandd_option['comp-blog-camp-ordem'];

    if($campanha && $campanha == 1 && isset($items) && !empty($items[0]['thumb'])):
    	if($ordem == 2)
    		shuffle($items);

    	$i = 0;
    	
    	foreach ($items as $item):
    		if($total == $i) break;
    		$th = wp_get_attachment_image_src($item['attachment_id'], 'medium');
?>
			<figure class="small-12 medium-4 columns">
				<a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>" class="d-block comp-post camp small-12 left rel" data-thumb="<?php echo $item['image']; ?>">
				</a>
			</figure>
<?php
			$i++;
		endforeach;
	endif;
?>
		</nav>
	</div>
</section>