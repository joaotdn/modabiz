<?php
/**
 * Componente: Geolocalização
 * Descrição: lista lojas e revendas no mapa
 * Última atualização: 9 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="comp-geo" class="small-12 left section-block">
	<div class="row">
		<header class="small-12 columns text-center">
			<figure class="d-iblock divide-20">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-map.png" alt="">
			</figure>
			<h2 class="divide-30">Encontre o ModaBiz mais próximo de você</h2>
		</header>

		<div class="small-12 large-5 columns">
			<a href="#" class="geo-btn divide-20 d-block text-up text-center">
				<span>Usar minha localização atual</span>
			</a>
		</div>

		<div class="small-12 large-7 columns rel search-location">
			<input type="text" class="divide-20 geo-input text-up typeahead" placeholder="Faça uma busca personalizada">
			<span class="abs icon-search"></span>
		</div>
	</div>

	<div id="map-layer" class="small-12 left" data-lat="" data-lng="" data-brandicon="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png" data-brandiconover="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png" data-usericon="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png">
		
	</div>
</section>