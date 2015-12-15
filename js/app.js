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
