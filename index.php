<?php
  get_header();
?>

<?php
	$height = $plandd_option['comp-painel-altura']['height'];
?>
<section id="main-painel" class="small-12 left d-table rel">
	<div class="small-12 d-table-cell text-center slider-loader rel">
		<span class="icon-spinner8 font-large anim-rotate"></span>
	</div>

	<nav class="slider-items small-12 abs left-axy">

		<figure class="small-12 left full-height" data-thumb="http://www.scavenclothing.com.br/wp-content/uploads/2015/10/painel-1.jpg">
			<a href="#" class="small-12 slider-mask d-block full-height abs left-axy" title=""></a>
			<div class="row rel d-table slider-content" style="<?php echo "height:{$height};"; ?>">
				<a href="#" class="small-12 slider-link d-block full-height abs left-axy" title=""></a>
				<div class="d-table-cell small-12">
					<div class="small-12 columns text-center rel">
						<h1><a href="#" title="">Titulo</a></h1>
						<div class="divide-30 show-for-large-up"></div>
						<h3><a href="#" title="">SubTitulo</a></h3>
						<div class="divide-40 show-for-large-up"></div>
						<p>
							<a href="#" class="slider-button d-iblock">Texto do botão</a>
						</p>
					</div>
				</div>
			</div>
		</figure>

	</nav>

	<a href="#" class="d-table abs nav-painel next-painel full-height">
		<span class="d-table-cell">
			<span class="icon-chevron-thin-right"></span>
		</span>
	</a>

	<a href="#" class="d-table abs nav-painel prev-painel full-height">
		<span class="d-table-cell">
			<span class="icon-chevron-thin-left"></span>
		</span>
	</a>
</section>

<?php
  get_footer();
?>

