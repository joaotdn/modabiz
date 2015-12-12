// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

//plugins
$.fn.getDataThumb = function(options) {
    options = $.extend({
        bgClass: 'bg-cover'
    }, options || {});
    return this.each(function() {
        var th = $(this).data('thumb');
        if (th) {
            $(this).css('background-image', 'url(' + th + ')').addClass(options.bgClass);
        }
    });
};
$('*[data-thumb]').getDataThumb(); // data-thumb para esses elementos

//trocar icone com hover
$(document).on('mouseover', '*[data-hover]', function(event) {
	event.preventDefault();
	var dt_hover = $(this).data('hover'),
		dt_src = $('img',this).attr('src');
	$('img',this).attr('src', dt_hover);

	$(this).on('mouseout',function() {
		$('img',this).attr('src', dt_src);
	});
});

//Topo
//------------------------------------------------------------------------

//Menu scroll
$('.d-table-cell','#main-menu').clone().appendTo('#main-menu-mo > .row');
(function() {
	var lastScrollTop = 0;
	$(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            $('#main-menu-mo').removeClass('show');
        } else if(st <= 200) {
            $('#main-menu-mo').removeClass('show');
        } else {
            $('#main-menu-mo').addClass('show');
        }
        lastScrollTop = st;
    });
})();

//Menu principal
$(document).on('click', '.close-menu,.open-menu', function(event) {
    event.preventDefault();
    $('#list-menu,.close-canvas').toggleClass('show');
});

//Painel 
//------------------------------------------------------------------------

(function() {
    var painel = $(".slider-items");

    if(painel.length) {
        painel.owlCarousel({
            responsiveBaseWidth: $("#main-painel"),
            responsive: true,
            responsiveRefreshRate: 200,
            pagination: true,
            autoPlay: 5000,
            rewindNav: true,
            rewindSpeed: 1000,
            loop: true,
            singleItem: true,
            rewindNav: true,
            rewindSpeed: 300
        });

        $(".next-painel").click(function(e) {
            e.preventDefault();
            painel.trigger('owl.next');
        });
        $(".prev-painel").click(function(e) {
            e.preventDefault();
            painel.trigger('owl.prev');
        });
    }

    
})();


//Geolocalização
//------------------------------------------------------------------------
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
            draggable: false,
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

        var my_Suggestion_class = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('vval'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: {
                url: getData.urlDir + '/places.json',
                filter: function(countryArray) {
                    return $.map(countryArray, function(country) {
                        return {vval: country.nome + ' - ' + country.tipo};
                    });
                }
            },
            remote: {
                url: "s.php?s=%QUERY",
                filter: function(x) {
                    return $.map(x, function(item) {
                        return {vval: item.nome + ' - ' + item.tipo};
                    });
                },
                wildcard: "%QUERY"
            }
        });

        my_Suggestion_class.initialize();
        var typeahead_elem = $('.typeahead');

        typeahead_elem.typeahead({
            hint: false,
            highlight: true,
            minLength: 3
        },
        {
            name: 'vval',
            displayKey: 'vval',
            source: my_Suggestion_class.ttAdapter()
        });

        $('input').on([
            //'typeahead:initialized',
            //'typeahead:initialized:err',
            'typeahead:selected',
            //'typeahead:autocompleted',
            //'typeahead:cursorchanged',
            //'typeahead:opened',
            //'typeahead:closed'
        ].join(' '), function(x) {
            var txt = $(this).val();
            //alert(txt);

            $.getJSON( getData.urlDir + '/places.json', function(json, textStatus) {
                            
                //Avise se o json não estiver presente
                if(json) places = json; else alert(textStatus);
                
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
                    draggable: false,
                    panControl: true,
                    zoomControl: true,
                    zoomControlOptions: {
                      style: google.maps.ZoomControlStyle.LARGE
                    }
                };
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

                //console.log(places);
                var len = places.length;

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

                    if(place.nome == txt) {
                        mapLayer.setCenter(new google.maps.LatLng(place.lat,place.lng));
                    }

                })(j, marker, location);
                    
                }
            });
        });
    }
})();