(($) => {

	if( !$( '.swiper-thumbnail-gallery' ) ) return;

	const thumbnails = new Swiper('.swiper-thumbnail-gallery', {
	  speed: 750,
	  spaceBetween: 20,
	  loop: true,
	  preloadImages: false,
	  loadPrevNext: true,
	  loadPrevNextAmount: 3,
	  lazy: true,
	  keyboard: {
	  	enabled: true
	  },
	  navigation: {
	  	prevEl: '.swiper-button-prev',
	  	nextEl: '.swiper-button-next'
	  },
	  breakpoints: {
	  	960: {
	  		slidesPerView: 2,
	  		spaceBetween: 24
	  	}
	  },

	});

})( jQuery );