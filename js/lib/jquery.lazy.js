(function ($) {

	// Fire a callback on element(s) when they scroll into view for the first time.
	$.fn.lazy = function (cb) {
		return this.each(function () {
			lazy.add(this, cb);
		});
	};

	const lazy = {
		init (elem, cb) {
			$.data(elem, 'lazy.load', cb);
		},

		load (elem) {
			const cb = $.data(elem, 'lazy.load');
			if (typeof cb === 'function') cb.call(elem);
		}
	};

	if (window.IntersectionObserver) {
		lazy.run = entries => {
			entries.forEach(entry => {
				if (entry.isIntersecting || entry.intersectionRatio > 0) {
					lazy.observer.unobserve(entry.target);
					lazy.load(entry.target);
				}
			});
		};

		lazy.add = (elem, cb) => {
			if (!lazy.observer) {
				lazy.observer = new IntersectionObserver(lazy.run);
			}

			lazy.init(elem, cb);
			lazy.observer.observe(elem);
		};
	} else {
		lazy.run = () => {
			lazy.targets = $.grep(lazy.targets, target => {
				// https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/#using_event_handlers_the_most_compatible_way
				const c = target.getBoundingClientRect();
				const inView = (c.top <= window.innerHeight && c.bottom >= 0) && window.getComputedStyle(target).display !== 'none';
				if (inView) lazy.load(target);
				return !inView;
			});

			if (!lazy.targets.length) $(window).off('.lazy');
		};

		lazy.add = (elem, cb) => {
			if (!lazy.targets || !lazy.targets.length) {
				lazy.targets = [];
				$(window).on('resize.lazy orientationchange.lazy scroll.lazy', $.throttle(250, lazy.run));
			}

			lazy.init(elem, cb);
			lazy.targets.push(elem);
			lazy.run();
		};
	}

})(jQuery);
