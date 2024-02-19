(($) => {

	if( !$( '.floorplan-nav' ) ) return;

	let $toggle = $( '.floorplan-nav__current' );
	let $nav = $( '.floorplan-nav ul' );
	let $floorplans = $( '[data-floor]' );
	let $body = $( 'body' );

	$toggle.on( 'click', (e) => {
		$body.toggleClass( 'has-floorplan-nav' );
	});

	$floorplans.each(function() {
		$( this ).on( 'click', function(e) {
			let $floor = $( this ).attr( 'data-floor' );
			let $activeInfo = $( '[data-floor-info].active' );
			let $activePlan = $( '[data-floor-plan].active' );
			let $info = $('[data-floor-info="'+$floor+'"]');
			let $plan = $('[data-floor-plan="'+$floor+'"]');

			$activeInfo.removeClass( 'active' );
			$activePlan.removeClass( 'active' );
			$toggle.find( 'span' ).text( $floor );

			$info.addClass( 'active' );
			$plan.addClass( 'active' );
			$body.removeClass( 'has-floorplan-nav' );
		});
	});

})( jQuery );