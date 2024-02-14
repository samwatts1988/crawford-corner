(($) => {

	if( !$( '.swiper-standfirst-gallery' ) ) return;

	const thumbnails = new Swiper('.swiper-standfirst-gallery', {
	  speed: 750,
	  slidesPerView: 1,
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