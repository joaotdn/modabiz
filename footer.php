  <?php
    global $plandd_option;

  	$marca = $plandd_option['comp-footer-marca']['url'];
  	$rua = $plandd_option['corp-rua'];
  	$bairro = $plandd_option['corp-bairro'];
  	$cep = $plandd_option['corp-cep'];
  	$cidade = $plandd_option['corp-cidade'];
  	$gmap = $plandd_option['corp-map'];
  ?>
  <footer id="footer" class="small-12 left">
  	<div class="row">
  		
  		<section class="small-12 medium-4 columns">
  			
  			<figure class="logo-footer divide-30 text-center">
  				<a href="#" title="Página principal" class="d-iblock">
  					<img src="<?php echo $marca; ?>" alt="">
  				</a>
  			</figure>

  			<div class="address small-12 left text-center">
				<?php
					if(!empty($plandd_option['corp-header']))
						echo '<p class="text-up divide-20">'. $plandd_option['corp-header'] .'</p>';

					//Rua e bairro
					if($rua && !empty($rua) || $bairro && !empty($bairro))
						echo '<p class="divide-10">';

					if($rua && !empty($rua))
						echo $rua;

					if($bairro && !empty($bairro))
						echo ' ' . $bairro;

					if($rua && !empty($rua) || $bairro && !empty($bairro))
						echo '</p>';

					//Cidade e CEP
					if($cidade && !empty($cidade) || $cep && !empty($cep))
						echo '<p class="divide-40">';

					if($cidade && !empty($cidade))
						echo $cidade;

					if($cep && !empty($cep))
						echo ' - CEP ' . $cep;

					if($cidade && !empty($cidade) || $cep && !empty($cep))
						echo '</p>';

					if($gmap && !empty($gmap))
						echo '<p class="divide-20 gmap-link"><a href="'. $gmap .'" target="_blank" title="Ver endereço no Google Maps">Ver endereço no Google Maps</a></p>';
				?>
				<p class="no-margin">
					<a href="http://www.modabiz.com.br/" title="Desenvolvido por ModaBiz" target="_blank" class="d-iblock">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png" alt="">
					</a>
				</p>
  			</div>

  		</section>

  		<section class="small-12 medium-4 columns show-for-medium-up">
			<nav id="social-footer" class="small-12 left text-center">
				<ul class="inline-list d-iblock">
				<?php
			        $facebook = $plandd_option['corp-facebook'];
			        $twitter = $plandd_option['corp-twitter'];
			        $instagram = $plandd_option['corp-instagram'];

			        if($facebook && !empty($facebook))
			          printf('<li><a href="%s" class="icon-facebook-with-circle" target="_blank"></a></li>',$facebook);

			        if($twitter && !empty($twitter))
			          printf('<li><a href="%s" class="icon-twitter3" target="_blank"></a></li>',$twitter);

			        if($instagram && !empty($instagram))
			          printf('<li><a href="%s" class="icon-instagram-with-circle" target="_blank"></a></li>',$instagram);
			      ?>
				</ul>
			</nav>

			<?php
				$telefone = $plandd_option['corp-telefone'];
				$telefone_header = $plandd_option['comp-footer-telefone-header'];

				if($telefone && !empty($telefone)):
			?>
			<hgroup class="divide-30 text-center footer-tel">
			
				<?php if($telefone_header && !empty($telefone_header)): ?>
				<h5 class="text-up">
					<?php echo $telefone_header; ?>
				</h5>
				<?php endif; ?>
				<h4>
					<?php echo $telefone[0]; ?>
				</h4>
			</hgroup>
			<?php
				endif;

				$wapp = $plandd_option['corp-whatsapp'];
				if($wapp && !empty($wapp)):
			?>
			<hgroup class="divide-30 text-center footer-wapp">
				<header class="small-12 left">
					<h5 class="text-up">
						<span class="icon-whatsapp"></span> Whatsapp
					</h5>
					<h4>
						<?php echo $wapp; ?>
					</h4>
				</header>
			</hgroup>
			<?php
				endif;
			?>
			<nav class="share-footer small-12 left show-for-large-up text-center">
				<ul class="inline-list d-iblock no-margin">
					<li><div class="fb-like" data-layout="button_count" data-href="<?php echo home_url();?>"></div></li>
					<li><a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=<?php echo home_url();?>">Tweet</a></li>
					<li><div class="g-plusone" data-size="medium" data-width="65" data-href="<?php echo home_url();?>"></div></li>
				</ul>
			</nav>
  		</section>

  		<nav id="footer-menu" class="small-12 medium-4 columns show-for-medium-up text-center">
  			<ul class="no-bullet d-iblock text-up">
  				<?php
			        $defaults = array(
			          'theme_location'  => 'primary',
			          'menu'            => 'Menu principal',
			          'container'       => '',
			          'container_class' => '',
			          'container_id'    => '',
			          'menu_class'      => '',
			          'menu_id'         => '',
			          'echo'            => true,
			          'fallback_cb'     => 'primary',
			          'before'          => '<h3>',
			          'after'           => '</h3>',
			          'link_before'     => '',
			          'link_after'      => '',
			          'items_wrap'      => '%3$s',
			          'depth'           => 0,
			          'walker'          => '',
			        );
			        wp_nav_menu($defaults);
			    ?>
  			</ul>
  		</nav>

  		<section id="credits" class="small-12 left text-center">
  			<div class="divide-40"></div>
  			<p class="no-margin"><?php echo $plandd_option['comp-footer-copy']; ?></p>
  		</section>

  	</div>
  </footer>

  <a href="#" class="close-menu close-canvas"></a>
  <?php wp_footer(); ?>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
   
  </body>
</html>