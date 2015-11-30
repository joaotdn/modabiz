// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();

//Topo
//------------------------------------------------------------------------

//Menu
$(document).on('mouseover', '*[data-hover]', function(event) {
	event.preventDefault();
	var dt_hover = $(this).data('hover'),
		dt_src = $('img',this).attr('src');
	$('img',this).attr('src', dt_hover);

	$(this).on('mouseout',function() {
		$('img',this).attr('src', dt_src);
	});
});