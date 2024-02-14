(($) => {

	if( !$( '.swiper-thumbnail-gallery' ) ) return;

	const thumbnails = new Swiper('.swiper-thumbnail-gallery', {
	  speed: 750,
	  slidesPerView: 2,
	  spaceBetween: 24,
	  loop: true,
	  keyboard: {
	  	enabled: true
	  },
	  navigation: {
	  	prevEl: '.swiper-button-prev',
	  	nextEl: '.swiper-button-next'
	  }
	});

})( jQuery );