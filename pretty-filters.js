
jQuery( function($) {

	search = $('.search-box')
		.hide()
		.find('input[name="s"]')
		.prependTo('.top')
		.attr('placeholder',$('#search-submit').val())
	;

	users = $('.top .actions')
		.has('#new_role')
		.appendTo('.bottom')
	;

	submit = $('.top :submit')
		.not('#changeit')
		.not('#doaction')
		.not('#doaction2')
	;

	if ( !submit.length ) {
		$('#search-submit')
			.insertBefore('.top .tablenav-pages')
			.val( pretty_filters.filter )
		;
	}

} );
