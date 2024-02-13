(($) => {

	if( !$( '.swiper-hero' ) ) return;

	const hero = new Swiper('.swiper-hero', {
	  speed: 750,
	  slidesPerView: 1,
	  loop: true,
	  keyboard: {
	  	enabled: true
	  },
	  autoplay: {
	  	delay: 4000
	  }
	});

})( jQuery );