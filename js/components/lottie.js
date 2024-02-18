(() => {

	let lottiePlayers = document.querySelectorAll( 'lottie-player' );
	let splash = document.querySelector( '.splash' );

	lottiePlayers.forEach((player) => {

		player.addEventListener( 'complete', () => {
			document.body.classList.remove( 'splash-visible' );
			document.body.classList.add( 'splash-hidden' );

			setTimeout(() => {
				document.body.classList.remove( 'splash-hidden' );
				splash.remove();
			}, 1000);
		});
		
	});

	let footerLottie = document.querySelector( '.footer-lottie' );
	let footerLottieEl = footerLottie.querySelector( 'lottie-player' );
	footerLottieEl.stop();
	footerLottieEl.seek(0);
	
	function setFooterLottie() {
		if( footerLottie.getBoundingClientRect().top < window.innerHeight ) {
			footerLottieEl.play();
		} else {
			console.log("B");
		}
	}

	window.addEventListener( 'scroll', () => {
		setFooterLottie();
	});

	window.addEventListener( 'orientationchange', () => {
		setFooterLottie();
	});

	window.addEventListener( 'resize', () => {
		setFooterLottie();
	});

})();