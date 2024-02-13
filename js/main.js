//=require vendor/*
//=require lib/*
//=require components/*

(function ($) {

	$('.site-navicon').on('click', e => {
		e.preventDefault();

		$(document.documentElement).toggleClass('has-nav');
	});

	$('img[data-src]').lazy(function () {
		this.style.opacity = '0';

		$(this).one('load', () => this.style.opacity = '').attr({
			src: this.getAttribute('data-src'),
			sizes: this.getAttribute('data-sizes'),
			srcset: this.getAttribute('data-srcset'),
			'data-src': null,
			'data-sizes': null,
			'data-srcset': null
		});

		if (this.complete) $(this).trigger('load');
	});

	$(document.body).on({
		keydown (e) {
			if (e.which === 9) $(document.documentElement).addClass('has-tab-focus');
		},

		mousedown () {
			$(document.documentElement).removeClass('has-tab-focus');
		}
	});

})(jQuery);
