
jQuery( function($) {

	if ( !$('.wrap').length )
		return;

	search = $('.search-box');

	search
		.prependTo('.top')
		.find('input[name="s"]')
		.attr('placeholder',$(':submit',search).val())
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
		$('.search-box :submit')
			.insertBefore('.top .tablenav-pages')
			.val( pretty_filters.filter )
		;
	} else {
		$('.search-box :submit')
			.hide()
		;
	}

	search.removeClass('search-box');

	if ( !$('.bottom').children(':visible').length )
		$('.bottom').hide();

} );
