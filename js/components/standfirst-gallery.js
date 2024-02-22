(($) => {

	if( !$( '.swiper-standfirst-gallery' ) ) return;

	const thumbnails = new Swiper('.swiper-standfirst-gallery', {
	  speed: 750,
	  slidesPerView: 1,
	  loop: true,
	  keyboard: {
	  	enabled: true
	  },
	  navigation: {
	  	prevEl: '.swiper-button-prev',
	  	nextEl: '.swiper-button-next'
	  },
  	  preloadImages: false,
	  loadPrevNext: true,
	  loadPrevNextAmount: 3,
	  lazy: true
	});

})( jQuery );