  
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

  		<section class="small-12 medium-4 columns">
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
  		</section>

  	</div>
  </footer>

  <a href="#" class="close-menu close-canvas"></a>
  <?php wp_footer(); ?>
  </body>
</html>