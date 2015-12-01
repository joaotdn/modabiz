// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

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
