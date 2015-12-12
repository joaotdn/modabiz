(function() {
	if($('#map-layer').length) {

		var mapBlock = document.getElementById('map-layer'), //id do mapa
			places, // armazene o json
			len, // armazene o comprimento do json
			mainLocal, // armazene o local inicial;
			ic = new google.maps.MarkerImage($('#map-layer').attr('data-brandicon')), // marcador
			ic_over = new google.maps.MarkerImage($('#map-layer').attr('data-brandiconover')), // marcador
	 		userLocal = new google.maps.MarkerImage($('#map-layer').attr('data-usericon')), //marcador geolocation
	 		initLat = $('#map-layer').data('lat'), // latitude inicial
	 		initLng = $('#map-layer').data('lng'), // longitude inicial
	 		latlon,
	 		mapLayer;

	 	$.getJSON(getData.urlDir + '/places.json', function(json, textStatus) {
			
			//Avise se o json não estiver presente
			if(json) places = json; else alert(textStatus);

			//console.log(places);
			len = places.length;

			for(var j = 0; j < len; j++) {
				var place = places[j];
				//console.log(place.nome);

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
					});

					google.maps.event.addListener(marker, 'mouseover', function() {
					    marker.setIcon(ic_over);
					});

					google.maps.event.addListener(marker, 'mouseout', function() {
					    marker.setIcon(ic);
					});

				})(j, marker, location);
			}
		});

		mainLocal = (initLat && initLng) ? new google.maps.LatLng(initLat,initLng) : new google.maps.LatLng(-7.1557616,-34.8407942);

		/**
		 * Opções gerais do mapa
		 */
		var options = {
			center: mainLocal,
			zoom: 13,
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

		//Contrua o mapa
		mapLayer = new google.maps.Map(mapBlock, options);
		
		//crie um marcador para o local
		var markerOne = new google.maps.Marker({
			position: mainLocal,
			map: mapLayer,
			icon: ic
		});

		google.maps.event.addListener(markerOne, 'mouseover', function() {
		    markerOne.setIcon(ic_over);
		});
		google.maps.event.addListener(markerOne, 'mouseout', function() {
		    markerOne.setIcon(ic);
		});
	}
})();