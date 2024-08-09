(() => {

	if( !document.querySelector( '.splash' ) ) return;

	let lottiePlayers = document.querySelectorAll( 'lottie-player' );
	let splash = document.querySelector( '.splash' );
	heroVideo = document.querySelector( '.hero-video' );

	lottiePlayers.forEach((player) => {

		player.addEventListener( 'complete', () => {
			document.body.classList.remove( 'splash-visible' );
			document.body.classList.add( 'splash-hidden' );

			if( heroVideo ) {
				heroVideo.play();
			}

			setTimeout(() => {
				document.body.classList.remove( 'splash-hidden' );
				splash.remove();

				hero.autoplay.start();

			}, 2000);
		});
		
	});

	let footerLottie = document.querySelector( '.footer-lottie' );
	let footerLottieEl = footerLottie.querySelector( 'lottie-player' );
	
	function setFooterLottie() {
		if( footerLottie.getBoundingClientRect().bottom < window.innerHeight ) {
			footerLottieEl.play();
		}
	}

	footerLottieEl.addEventListener( 'complete', () => {
		footerLottieEl.pause();
	});

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