(function() {
	if($('#map-layer').length) {
		/**
		 * Leia o arquivo json no atributo do elemento
		 * e use os dados escritos para compor o mapa
		 */
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

		$.getJSON($('#map-layer').attr('data-arraylocal'), function(json, textStatus) {
			
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

		//Fechar caixa de informações, se houver
		if($('.map-info-block').length) {
			$('.close-local-info').on('click',function(e) {
				e.preventDefault();

				$('.map-info-block')
					.removeClass('active');
			});
		}

		mainLocal = (initLat && initLng) ? new google.maps.LatLng(initLat,initLng) : new google.maps.LatLng(-7.1557616,-34.8407942);

		/**
		 * Opções gerais do mapa
		 */
		var options = {
			center: mainLocal,
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
		

		//Funções de geolocalização
		function getLocation() {
			if(navigator.geolocation) {
			    navigator.geolocation.getCurrentPosition(function(position) {
			      	var pos = new google.maps.LatLng(position.coords.latitude,
			                                       position.coords.longitude);

			      	//Marcador para o usuario
					marker = new google.maps.Marker({
						position: pos,
						map: mapLayer,
						title: 'Você está aqui',
						icon: userLocal
					});

			      mapLayer.setCenter(pos);
			      var geocoder = new google.maps.Geocoder(), city, state;
			      geocoder.geocode({'latLng': pos}, function(results, status) {
			      	if (status == google.maps.GeocoderStatus.OK) {
			      		city = results[0].address_components[3].long_name;
			      		state = results[0].address_components[5].long_name;

			      		//console.log(results[0]);
			      		$('.city-name').stop().fadeOut('fast', function() {
			      			$('.city-name').html('<br>' + city + ", " + state).fadeIn('fast');
			      		});
			      	}
			      });

			    }, function() {
			      handleNoGeolocation(true);
			    });
			} else {
			    // Browser doesn't support Geolocation
			    handleNoGeolocation(false);
			}
		};
		

		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
		    var content = 'Falha no serviço de geolocalização';
		  } else {
		    var content = 'Seu navegador não suporta este recurso';
		  }

		  var options = {
		    map: map,
		    position: new google.maps.LatLng(initLat, initLng),
		    content: content
		  };

		  var infowindow = new google.maps.InfoWindow(options);
		  mapLayer.setCenter(options.position);
		};

		$('.btn-userlocal').on('click',getLocation);
		$('.btn-userlocal').on('click',function(e) {
			e.preventDefault();
			if($('.map-info-block').hasClass('active')) {
				$('.map-info-block')
					.removeClass('active');
			}
		});
		var hTml;
		angular.module('modaBizApp', ['mm.foundation'])
			.controller('TypeaheadCtrl', ['$scope','$http', function($scope,$http){
				$scope.selected = undefined;
				
				$scope.dataLocation = function(arg) {
					return $http.get($('#map-layer').attr('data-arraylocal'), {
				      params: {
				      }
				    }).then(function(res){
				      //var positions = [];
				      angular.forEach(res.data, function(item){
				        if(arg === item.endereco_formatado) {
				        	mapLayer.setCenter(new google.maps.LatLng(item.lat,item.lng));

				        	//peque os dados do local
							var location = {
								nome: item.nome,
								tipo: item.tipo,
								endereco: item.endereco,
								cep: item.cep,
								uf: item.uf,
								horarios: item.horarios,
								telefones: item.telefones,
								whatsapp: item.whatsapp,
								facebook: item.facebook,
								instagram: item.instagram,
								email: item.email,
								lat: item.lat,
								lng: item.lng
							};
				        	
				        	(function(location) {
				        		if($('.map-info-block').length) {
									$('.map-info-block')
										.addClass('active');
									return locationsData(location);
								}
				        	})(location);
				        }
				      });
				    });
				};

				$scope.getLocation = function(val) {
				    return $http.get($('#map-layer').attr('data-arraylocal'), {
				      params: {
				        address: val,
				        //sensor: false
				      }
				    }).then(function(res){
				      var addresses = [];

				      angular.forEach(res.data, function(item){
				        addresses.push(item.endereco_formatado);
				        //console.log($http);
				      });

				      return addresses;
				    });
				};
			}]);
		
		//reutilize esta função para aplicar consultas
		function locationsData(location) {
			$('.local-social').html('');

			//nome do local
			if(location.nome != '') {
				$('.local-name').html(location.nome);
			} else {
				$('.local-name').html('');
			}

			//tipo de local
			if(location.tipo != '') {
				$('.local-type').html(location.tipo);
			} else {
				$('.local-type').html('');
			}
			
			//endereço do local
			if(location.endereco != '') {
				$('.local-street').html(location.endereco);
			} else {
				$('.local-street').html('');
			}

			//cep do local
			if(location.cep != '') {
				$('.local-zipcode').html("CEP: " + location.cep);
			} else {
				$('.local-zipcode').html('');
			}

			//estado e cidade
			if(location.uf != '') {
				$('.local-city').html(location.uf);
			} else {
				$('.local-city').html('');
			}

			//telefones
			if(location.telefones != '') {
				$('.local-phones').html('<strong><i class="icon-phone"></i> Telefone</strong><br><span>'+ location.telefones +'</span>');
			} else {
				$('.local-phones').html('');
			}

			//whatsapp
			if(location.whatsapp != '') {
				$('.local-whatsapp').html('<strong><i class="icon-whatsapp"></i> Whatsapp</strong><br><span>'+ location.whatsapp +'</span>');
			} else {
				$('.local-whatsapp').html('');
			}

			//horarios
			if(location.horarios != '') {
				$('.local-hours').html('<b>Horários</b><br><span>'+ location.horarios +'</span>');
			} else {
				$('.local-hours').html('');
			}

			//social
			if(location.facebook != '' || location.instagram != '') {
				$('.local-social').append('<a href="'+ location.facebook +'" class="d-iblock icon-facebook-with-circle"></a>');
				$('.local-social').append('<a href="'+ location.instagram +'" class="d-iblock icon-instagram-with-circle"></a>');
			} else {
				$('.local-social').html('');
			}
		}
	}

	if($('#mapInner').length) {
		//var mapInner = document.getElementById('map-layer');

		$('.item-local','#mapInner').each(function() {
			$(this).on('click',function(e) {
				var lat = $(this).data('lat'),
					lng = $(this).data('lng');
				
				$(this).addClass('active')
				.siblings('.item-local').removeClass('active');

				mapLayer.setCenter(new google.maps.LatLng(lat, lng));
				
				//alert(lat + ' - ' + lng);
			});
			
		});
	}
})();