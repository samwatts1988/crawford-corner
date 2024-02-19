(($) => {

	reveal = function() {
		$('[data-reveal]').lazy(function() {
			$(this).attr('data-reveal', 'revealed');
		});
	}

	if( !$( '[data-reveal]' ).length ) return;
	reveal();

	stepReveal = function() {
		$('[data-step-reveal]').lazy(function() {
			$(this).attr('data-step-reveal', 'revealed');
		});
	}

	if( !$( '[data-step-reveal]' ).length ) return;
	stepReveal();


})( jQuery );