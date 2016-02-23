  <?php
    global $plandd_option;
  	$marca = $plandd_option['comp-footer-marca']['url'];
  	$rua = $plandd_option['corp-rua'];
  	$bairro = $plandd_option['corp-bairro'];
  	$cep = $plandd_option['corp-cep'];
  	$cidade = $plandd_option['corp-cidade'];
  	$gmap = $plandd_option['corp-map'];
  ?>
  
  <?php wp_footer(); ?>

  <script>
  jQuery(document).ready(function($) {
  	if($( '.slideshow' ).length) {
  		$( '.slideshow' ).cycle();
  	}
  });
  </script>
  

  <style>
    .ig-b- { display: inline-block; }
	.ig-b- img { visibility: hidden; }
	.ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }
	.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
	@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
	.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }
  </style>
	
  <!-- AUTO COMPLETAR REVENDEDORES -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <?php
  	$args = array(
	      'posts_per_page' => -1,
	      'orderby' => 'date',
	      'post_type' => 'localizacao'
	  );
	  $the_query = new WP_Query( $args );
	  $output = array();

	  if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
	    global $post;

	    $location = get_field('gmap_latlng', $post->ID);

	    //$output[] = $post->post_title . ' - ' . get_field('gmap_uf',$post->ID);

	    $output[] = array(
	      'nome' => get_field('gmap_nome',$post->ID),
	    );

	  endwhile; wp_reset_postdata(); endif;
  ?>
  <script>
  	(function() {
  			var places = [
	  			<?php
	  				foreach ($output as $key) {
	  					echo "'". $key['nome'] ."',";
	  				}
	  			?>
	  		];
	  		$( "#places" ).autocomplete({
		      source: places,
		      select: function( event, ui ) {
		      	var v = ui.item.value;
		      	var mapBlock = document.getElementById('map-layer')
		      		options = {
						zoom: 14,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
				        disableDefaultUI: true,
				        mapTypeControl: false,
				        scaleControl: false,
				        scrollwheel: false,
				        backgroundColor: '#f1f1f1',
				        draggable: true,
				        panControl: true,
				        zoomControl: true,
				        zoomControlOptions: {
				          style: google.maps.ZoomControlStyle.LARGE
				        }
					},
		      		mapLayer = new google.maps.Map(mapBlock,options),
		      		ic = new google.maps.MarkerImage($('#map-layer').attr('data-brandicon')), // marcador
					ic_over = new google.maps.MarkerImage($('#map-layer').attr('data-brandiconover')), // marcador
			 		userLocal = new google.maps.MarkerImage($('#map-layer').attr('data-usericon')), //marcador geolocation;
			 		places;

		      	$.getJSON(getData.urlDir + '/places.json', function(json, textStatus) {

		      		//Avise se o json não estiver presente
					if(json) places = json; else alert(textStatus);

					//console.log(places);
					len = places.length;

					for(var j = 0; j < len; j++) {
						var place = places[j];
						//console.log(place.nome);
						if(v == place.nome) {
		      				mapLayer.setCenter(new google.maps.LatLng(place.lat, place.lng));
		      				
		      				var whatsApp = (place.whatsapp != "") ? '<p class="divide-10"><i class="icon-whatsapp"></i> <strong>Whatsapp</strong></p><p class="divide-10">'+ place.whatsapp +'</p>' : "",
		      				    horarios = (place.horarios != "") ? '<p class="divide-10"><strong>Horário de funcionamento:</strong></p><p class="divide-10">'+ place.horarios +'</p>' : "";

		      				$('#map-info')
								.find('[data-title]').text(place.nome)
								.end()
								.find('[data-tipo]').text(place.tipo)
								.end()
								.find('[data-local]').text(place.endereco)
								.end()
								.find('[data-cep]').text('CEP: ' + place.cep)
								.end()
								.find('[data-uf]').text(place.uf)
								.end()
								.find('[data-tel]').text(place.telefones)
								.end()
								.find('[data-whats]').html(whatsApp)
								.end()
								.find('[data-email]').text(place.email)
								.end()
								.find('[data-hora]').html(horarios);

							if(place.facebook !== "")
								$('#map-info').find('[data-facebook]').html('<h1><a href="' + place.facebook + '" class="icon-facebook-with-circle" target="_blank"></a></h1>');

							if(place.instagram !== "")
								$('#map-info').find('[data-instagram]').html('<h1><a href="' + place.instagram + '" class="icon-instagram-with-circle" target="_blank"></a></h1>');

							if(place.twitter !== "")
								$('#map-info').find('[data-twitter]').html('<a href="' + place.twitter + '" class="icon-twitter3" target="_blank"></a>');
							$('#map-info, #map-info > .row').addClass('active');
		      			}

						//crie um marcador para o local
						var marker = new google.maps.Marker({
							position: new google.maps.LatLng(place.lat, place.lng),
							map: mapLayer,
							icon: ic,
							title: place.nome
						});

						//peque os dados do local
						var location = {
							id: place.id,
							nome: place.nome,
							tipo: place.tipo,
							endereco: place.endereco,
							cep: place.cep,
							uf: place.uf,
							horarios: place.horarios,
							telefones: place.telefones,
							whatsapp: place.whatsapp,
							facebook: place.facebook,
							instagram: place.instagram,
							email: place.email,
							lat: place.lat,
							lng: place.lng
						};

						//Crie eventos e a caixa de informação do local
						(function(j, marker, location) {
							google.maps.event.addListener(marker, 'click', function() {
								if($('.map-info-block').length) {
									$('.map-info-block')
										.addClass('active');
									var $i = $('.map-info-block');
									return locationsData(location);
								}
								if($('#nav-loactions').length) {
									$('.item-local','#nav-loactions').each(function() {
										if($(this).data('lat') == location.lat) {
											$(this).addClass('active')
											.siblings('.item-local').removeClass('active');
										}
									});
								}

							    var whatsApp = (location.whatsapp != "") ? '<p class="divide-10"><i class="icon-whatsapp"></i> <strong>Whatsapp</strong></p><p class="divide-10" data-whats>'+ location.whatsapp +'</p>' : "",
							        horarios = (place.horarios != "") ? '<p class="divide-10"><strong>Horário de funcionamento:</strong></p><p class="divide-10">'+ place.horarios +'</p>' : "";

								$('#map-info')
									.find('[data-title]').text(location.nome)
									.end()
									.find('[data-tipo]').text(location.tipo)
									.end()
									.find('[data-local]').text(location.endereco)
									.end()
									.find('[data-cep]').text('CEP: ' + location.cep)
									.end()
									.find('[data-uf]').text(location.uf)
									.end()
									.find('[data-tel]').text(location.telefones)
									.end()
									.find('[data-whats]').text(whatsApp)
									.end()
									.find('[data-email]').text(location.email)
									.end()
									.find('[data-hora]').html(horarios);

									if(location.facebook !== "")
										$('#map-info').find('[data-facebook]').html('<h1><a href="' + location.facebook + '" class="icon-facebook-with-circle" target="_blank"></a></h1>');

									if(location.instagram !== "")
										$('#map-info').find('[data-instagram]').html('<h1><a href="' + location.instagram + '" class="icon-instagram-with-circle" target="_blank"></a></h1>');

									$('#map-info, #map-info > .row').addClass('active');
									/*var ht = $('#map-info').position().top;
									var body = $("html, body");
									body.stop().animate({scrollTop:ht}, '500', 'swing');*/
							});

							google.maps.event.addListener(marker, 'mouseover', function() {
							    marker.setIcon(ic_over);
							});

							google.maps.event.addListener(marker, 'mouseout', function() {
							    marker.setIcon(ic);
							});

						})(j, marker, location);
					}

					$('.icon-cross','#map-info').on('click',function() {
						$('#map-info, #map-info > .row').removeClass('active');
					});
		      	});
		      }
		    });
  	})();
  </script>
   <!-- // AUTO COMPLETAR REVENDEDORES -->

  </body>
</html>