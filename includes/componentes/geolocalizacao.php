<?php
/**
 * Componente: Geolocalização
 * Descrição: lista lojas e revendas no mapa
 * Última atualização: 9 de dezembro de 2015
 */
global $plandd_option;

$lat = $plandd_option['comp-geo-lat'];
$lng = $plandd_option['comp-geo-lng'];
$icon_header = $plandd_option['comp-geo-icon']['url'];
$icon = $plandd_option['comp-geo-icon-normal']['url'];
$icon_hover = $plandd_option['comp-geo-icon-hover']['url'];
$icon_user = $plandd_option['comp-geo-icon-user']['url'];
$header = $plandd_option['comp-geo-header'];
?>
<section id="comp-geo" class="small-12 left section-block rel">
	<div class="row">
		<?php if(!is_page()): ?>
		<header class="small-12 columns text-center">
			<?php
				if($icon_header && !empty($icon_header)):
			?>
			<figure class="d-iblock divide-20">
				<img src="<?php echo $icon_header; ?>" alt="">
			</figure>
			<?php
				endif;
				if($header && !empty($header))
					echo '<h2 class="divide-30">'. $header .'</h2>';
			?>
		</header>
		<?php endif; ?>

		<div class="small-12 large-5 columns">
			<a href="#" class="geo-btn divide-20 d-block text-up text-center btn-userlocal">
				<span>Usar minha localização atual</span>
			</a>
		</div>

		<div class="small-12 large-7 columns rel search-location ui-widget">
			<input  id="places" type="text" class="divide-20 geo-input text-up typeahead" placeholder="Faça uma busca personalizada">
			<span class="abs icon-search"></span>
			<nav class="the-results small-12 left"></nav>

			<var id="result-container" class="result-container"></var>
		</div>
	</div>

	<div id="map-layer" class="small-12 left rel" data-arraylocal="<?php echo get_stylesheet_directory_uri(); ?>/places.json" data-lat="<?php echo $lat; ?>" data-lng="<?php echo $lng; ?>" data-brandicon="<?php echo $icon; ?>" data-brandiconover="<?php echo $icon_hover; ?>" data-usericon="<?php echo $icon_user; ?>">
	</div>
	
	<div id="map-info" class="abs small-12 medium-5 large-4 columns">
		<h1 class="icon-cross abs"></h1>
		<div class="row rel">
			<div class="d-table-cell">
				<header class="small-12 columns d-table">
					<div class="small-12 d-table-cell">
						
						<figure class="left d-iblock icon-title">
						<?php
							$icon_info = $plandd_option['comp-geo-info-icon']['url'];
							if($icon_info && !empty($icon_info)):
						?>
							<img src="<?php echo $icon_info; ?>" alt="" class="left">
						<?php
							endif;
						?>
							<figcaption class="left">
								<h1 class="left d-block no-margin" data-title></h1>
								<h6 class="no-margin" data-tipo></h6>
							</figcaption>
						</figure>

						<article class="small-12 left">
							<div class="divide-20"></div>
							<p class="divide-10" data-local></p>
							<p class="divide-10" data-cep></p>
							<p data-uf></p>
							<p class="divide-10"><strong>Contato</strong></p>
							<p class="divide-10" data-tel></p>
							<div data-whats></div>
							<p data-email></p>
							<p data-hora></p>

							<ul class="inline-list">
								<li data-facebook></li>
								<li data-instagram></li>
							</ul>
						</article>
					</div>
				</header>
			</div>
		</div>
	</div>

</section>



