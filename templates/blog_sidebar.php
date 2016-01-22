<!-- sidebar -->
<aside id="sidebar" class="small-12 large-4 columns blog-font">
    
    <div id="side-search" class="divide-20">
    	
    	<form action="<?php echo home_url(); ?>" class="divide-30 rel" method="get">
			<label for="s"><input name="s" type="text" id="s" class="small-12 left" placeholder="PESQUISAR NO BLOG"></label>
			<span class="icon-search abs"></span>
		</form>
		
		<header class="small-12 left">
			<h2 class="subject-header">Assuntos:</h2>
		</header>

		<nav class="subject-nav small-12 left">
			<ul class="no-bullet no-margin">
			<?php 
				global $modabiz_option;
			    $tags_array = get_tags( 'hide_empty=0' );
			    //var_dump($tags_array);
			    ob_start();
			    foreach ($tags_array as $tag) {	
			    	$tag_link = get_tag_link( $tag->term_id );
		    	?>
					<li><a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?> (<?php echo $tag->count; ?>)</a></li>
		    	<?php
			    }
			    $res = ob_get_contents();
			    ob_clean();
			    echo $res;
			?>
			</ul>
		</nav>
    </div>
	
	<?php
		//Facebook likebox
		global $plandd_option;
		$fb = $plandd_option['corp-facebook'];
		if(!empty($fb)):
	?>
    <div id="face-likebox" class="divide-20 rel">
    	<div class="fb-page small-12 left" data-href="<?php echo $fb; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"></div></div>
    </div>
    <?php
    	endif;
    ?>

    <?php
    	//instagram
    	$icon_ins = $plandd_option['temp-blogbar-search-ins-icon']['url'];
    	$gallery = get_option( 'userprofile_object' );
		shuffle($gallery);
		$perfil = $plandd_option['instagram-username'];
    ?>
    <div id="side-instagram" class="divide-20 rel">
    	<header class="divide-30 text-center">
    		<img src="<?php echo $icon_ins; ?>" alt=""><br>
    		<div class="divide-20"></div>
			<a href="https://www.instagram.com/joaotdn/?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
    	</header>

    	<nav class="small-12 left">
    		<ul class="small-block-grid-2 no-margin">
    			<?php
					$i = 0;
					foreach ($gallery as $pic):
						$i++;
						if(5 == $i) break;
				?>
				<li>
					<a href="<?php echo $pic['uri']; ?>" target="_blank" title="<?php echo $pic['user']; ?>" class="d-block small-12 left">
						<img src="<?php echo $pic['thumb']; ?>" alt="<?php echo $pic['user']; ?>" class="small-12 left">
					</a>
				</li>
				<?php
					endforeach;
				?>
    		</ul>
    	</nav>
    </div>

    <div id="side-popular" class="divide-20 rel">

		<header class="small-12 left">
			<h2 class="subject-header">Os mais lidos:</h2>
		</header>

		<nav class="subject-nav small-12 left">
			<ul class="no-bullet no-margin">
			<?php
			$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
			while ( $popularpost->have_posts() ) : $popularpost->the_post();
			?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php
			endwhile;

			wp_reset_query();
			?>
			</ul>
		</nav>
    </div>

</aside>