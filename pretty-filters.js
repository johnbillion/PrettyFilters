
jQuery( function($) {

	$('.search-box input[name="s"]')
		.prependTo('.top')
		.attr('placeholder',$('#search-submit').val())
	;

} );
