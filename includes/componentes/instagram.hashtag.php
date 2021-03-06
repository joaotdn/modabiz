<?php
/**
 * Componente: Instagram Hashtag
 * Descrição: Fotos selecionadas para a hashtag do instagram
 * Última atualização: 8 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="instagram-hash" class="small-12 left section-block">
	<div class="row">
<?php
$gallery = get_option( 'hashtag_object' );
$hash = $plandd_option['instagram-hash'];
shuffle($gallery);
?>
		<div class="hash-block small-12 medium-4 columns">
			<div class="d-table small-12 left">
				<div class="d-table-cell small-12 text-center">
					<header class="small-12 columns">
						<h1 class="icon-instagram"></h1>
						<h5>Publique suas fotos com a hashtag:</h5>
						<h3><a href="http://instagram.com/explore/tags/<?php echo $hash ?>" target="_blank">#<?php echo $hash; ?></a></h3>
					</header>
				</div>
			</div>
		</div>

		<nav id="hash-pics" class="small-12 medium-8 columns">
			<ul class="small-block-grid-2 medium-block-grid-4 collapse no-margin">
			<?php
				$i = 0;
				foreach ($gallery as $pic):
					$i++;
					if(9 == $i) break;
			?>
				<li>
					<a href="<?php echo $pic['uri']; ?>" target="_blank" title="<?php echo $pic['user']; ?>" class="d-block small-12 left">
						<img src="<?php echo $pic['thumb']; ?>" alt="<?php echo $pic['user']; ?>">
						<span class="icon-instagram abs"></span>
					</a>
				</li>
			<?php
				endforeach;
			?>
			</ul>
		</nav>
	</div>
</section>