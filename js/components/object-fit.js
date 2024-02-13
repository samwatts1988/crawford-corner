(function ($) {

	if ('object-fit' in document.body.style) return;

	function objectFit() {
		const $image = $(this);
		const size   = $image.css('background-size');

		if (size === 'cover' || size === 'contain') {
			if (!$.data(this, 'objectFitted')) {
				$.data(this, 'objectFitted', true);
				$image.wrap('<div />').parent().addClass(this.className);
			}

			$image.parent().css('backgroundImage', 'url(' + (this.currentSrc || this.src) + ')');
			$image.css('opacity', 0);
		}
	}

	$('img').on('load', objectFit).each(objectFit);

	$(window).on('resize orientationchange', $.throttle(250, () => {
		$('img').each(objectFit);
	}));

})(jQuery);
