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

$('.item-th').zoom();
$('.meter-list').perfectScrollbar();

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

    var lookbook = $("#look-slider");

    if(lookbook.length) {
        lookbook.owlCarousel({
            responsiveBaseWidth: $(".list-items-look"),
            responsive: true,
            responsiveRefreshRate: 200,
            pagination: true,
            autoPlay: false,
            rewindNav: true,
            rewindSpeed: 1000,
            loop: true,
            singleItem: true,
            rewindNav: true,
            rewindSpeed: 300
        });

        $(".next-lookbook").click(function(e) {
            e.preventDefault();
            lookbook.trigger('owl.next');
        });
        $(".prev-lookbook").click(function(e) {
            e.preventDefault();
            lookbook.trigger('owl.prev');
        });
    }

    var carousel = $("#campaing-carousel");
    carousel.owlCarousel({
        responsive: true,
        responsiveBaseWidth: $("#campaing-carousel"),
        pagination: false,
        itemsCustom: [
            [200, 3],
            [700, 6],
            [800, 10],
        ],
        //rewindNav: false,
        rewindSpeed: 300,
    });
    $(".prev-carousel").click(function(e){
        e.preventDefault();
        carousel.trigger('owl.next');

        reloadActiveThumb();
    });

    $(".next-carousel").click(function(e){
        e.preventDefault();
        carousel.trigger('owl.prev');

        reloadActiveThumb();
    });

    //instancias
    var owl = $("#look-slider").data('owlCarousel'), car = $("#campaing-carousel").data('owlCarousel');

    //navegação do slider
    $(".prev-campaing").click(function(e){
        e.preventDefault();
        partners.trigger('owl.next');

        reloadActiveThumb();
    });

    $(".next-campaing").click(function(e){
        e.preventDefault();
        partners.trigger('owl.prev');

        reloadActiveThumb();
    });

    $('.owl-item','#campaing-carousel').each(function(i) {
      if(i == 0)
        $('figure',this).addClass('active');

      $('figure',this).on('click',function() {
        $(this).addClass('active')
        .parents('div').siblings('div')
        .find('figure').removeClass('active');

        owl.goTo(i);
      });

    });

    
})();


//video na galeria
//------------------------------------------------------------------------
$.ajaxSetup({
    url: getData.ajaxDir,
    type: 'GET',
    dataType: 'html'
});

$(document).on('click', '[data-videoid]', function(event) {
    event.preventDefault();
    var dt = $(this).data('videoid'),
        dtv = $(this).data('reveal-id');

    $.ajax({
        data: {
            action: 'get_video_galeria',
            video_id: dt
        },
        success: function(data) {
            $('#' + dtv).append(data);
        }
    });
});
$(document).on('close.fndtn.reveal', '[data-reveal]', function () {
  var modal = $(this);
  modal.find('.flex-video').remove();
});

//Enviar item lookbook de presente
//------------------------------------------------------------------------
$(document).on('submit','.gift-form',function(e) {
    e.preventDefault();
    var data_f = $(this).serialize();

    $.ajax({
        data: {
            action: 'lookbook_presente',
            form_data: data_f
        },
        success: function(data) {
            if(data !== "true")
                alert(data);
            else
                window.location.href = getData.resposta;
        }
    });
});