<?php
/**
 * Componente: Instagram Perfil
 * Descrição: Fotos selecionadas para o perfil do instagram
 * Última atualização: 9 de dezembro de 2015
 */
global $plandd_option;
?>
<section id="instagram-perfil" class="small-12 left section-block">
	<div class="row">
<?php
$gallery = get_option( 'userprofile_object' );
shuffle($gallery);

$perfil = $plandd_option['instagram-username'];

//variaveis personalizadas
?>
		<div class="profile-block small-12 medium-4 columns">
			<div class="d-table small-12 left">
				<div class="d-table-cell small-12 text-center">
					<header class="small-12 columns">
						<h1 class="icon-instagram"></h1>
						<h3 class="no-margin"><a href="http://instagram.com/<?php echo $perfil; ?>" target="_blank">@<?php echo $perfil; ?></a></h3>
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
					if(5 == $i) break;
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