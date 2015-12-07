<?php
/**
 * Componente: Cadastro
 * Descrição: Leva a página de cadastro de revendedores
 * Última atualização: 7 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="comp-cadastro" class="small-12 left section-block">
	<div class="row">
		<div class="small-12 columns">
			<header class="small-12 left text-center">
				<?php
					$icon = $plandd_option['comp-cadastro-icon']['url'];
					if($icon && !empty($icon)):
				?>
				<figure class="divide-20 text-center">
					<img src="<?php echo $icon; ?>" alt="cadastro">
				</figure>
				<?php
					endif;
					$titulo = $plandd_option['comp-cadastro-header'];
					if($titulo && !empty($titulo))
						echo '<h1>'. $titulo .'</h1>';

					$subtitulo = $plandd_option['comp-cadastro-subheader'];
					if($subtitulo && !empty($subtitulo))
						echo '<h3 class="divide-20">'. $subtitulo .'</h3>';

					$button = $plandd_option['comp-cadastro-button-txt'];
					$button_url = $plandd_option['comp-cadastro-button-url'];
					$button_url = ($button_url && !empty($button_url)) ? $button_url : '#';

					if($button && !empty($button))
						echo '<div class="divide-40"></div><h3 class="cadastro-btn divide-20"><a href="'. $button_url .'" class="button-cadastro" title="'. $button .'">'. $button .'</a></h3>';
				?>
			</header>
		</div>
	</div>
</section>