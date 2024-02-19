(($) => {

	reveal = function() {
		$('[data-reveal]').lazy(function() {
			$(this).attr('data-reveal', 'revealed');
		});
	}

	if( !$( '[data-reveal]' ).length ) return;
	reveal();


})( jQuery );