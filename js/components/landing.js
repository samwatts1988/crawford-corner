(($) => {

	if( !$( '.swiper-hero' ) ) return;

	hero = new Swiper('.swiper-hero', {
	  speed: 750,
	  slidesPerView: 1,
	  loop: true,
	  keyboard: {
	  	enabled: true
	  },
	  autoplay: {
	  	enabled: false,
	  	delay: 4000
	  },
	  preloadImages: true,
	  loadPrevNext: true,
	  loadPrevNextAmount: 3,
	  lazy: true
	});

})( jQuery );