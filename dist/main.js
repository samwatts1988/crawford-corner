/**
 * Throttle execution of a function. Especially useful for rate limiting
 * execution of handlers on events like resize and scroll.
 *
 * @param  {Number}    delay          A zero-or-greater delay in milliseconds. For event callbacks, values around 100 or 250 (or even higher) are most useful.
 * @param  {Boolean}   [noTrailing]   Optional, defaults to false. If noTrailing is true, callback will only execute every `delay` milliseconds while the
 *                                    throttled-function is being called. If noTrailing is false or unspecified, callback will be executed one final time
 *                                    after the last throttled-function call. (After the throttled-function has not been called for `delay` milliseconds,
 *                                    the internal counter is reset)
 * @param  {Function}  callback       A function to be executed after delay milliseconds. The `this` context and all arguments are passed through, as-is,
 *                                    to `callback` when the throttled-function is executed.
 * @param  {Boolean}   [debounceMode] If `debounceMode` is true (at begin), schedule `clear` to execute after `delay` ms. If `debounceMode` is false (at end),
 *                                    schedule `callback` to execute after `delay` ms.
 *
 * @return {Function}  A new, throttled, function.
 */
jQuery.throttle = function (delay, noTrailing, callback, debounceMode) {

	/*
	 * After wrapper has stopped being called, this timeout ensures that
	 * `callback` is executed at the proper times in `throttle` and `end`
	 * debounce modes.
	 */
	var timeoutID;
	var cancelled = false;

	// Keep track of the last time `callback` was executed.
	var lastExec = 0;

	// Function to clear existing timeout
	function clearExistingTimeout () {
		if (timeoutID) {
			clearTimeout(timeoutID);
		}
	}

	// Function to cancel next exec
	function cancel () {
		clearExistingTimeout();
		cancelled = true;
	}


	// `noTrailing` defaults to falsy.
	if (typeof noTrailing !== 'boolean') {
		debounceMode = callback;
		callback = noTrailing;
		noTrailing = undefined;
	}

	/*
	 * The `wrapper` function encapsulates all of the throttling / debouncing
	 * functionality and when executed will limit the rate at which `callback`
	 * is executed.
	 */
	function wrapper () {

		var self = this;
		var elapsed = Date.now() - lastExec;
		var args = arguments;

		if (cancelled) {
			return;
		}

		// Execute `callback` and update the `lastExec` timestamp.
		function exec () {
			lastExec = Date.now();
			callback.apply(self, args);
		}

		/*
		 * If `debounceMode` is true (at begin) this is used to clear the flag
		 * to allow future `callback` executions.
		 */
		function clear () {
			timeoutID = undefined;
		}

		if (debounceMode && !timeoutID) {
			/*
			 * Since `wrapper` is being called for the first time and
			 * `debounceMode` is true (at begin), execute `callback`.
			 */
			exec();
		}

		clearExistingTimeout();

		if (debounceMode === undefined && elapsed > delay) {
			/*
			 * In throttle mode, if `delay` time has been exceeded, execute
			 * `callback`.
			 */
			exec();

		} else if (noTrailing !== true) {
			/*
			 * In trailing throttle mode, since `delay` time has not been
			 * exceeded, schedule `callback` to execute `delay` ms after most
			 * recent execution.
			 *
			 * If `debounceMode` is true (at begin), schedule `clear` to execute
			 * after `delay` ms.
			 *
			 * If `debounceMode` is false (at end), schedule `callback` to
			 * execute after `delay` ms.
			 */
			timeoutID = setTimeout(debounceMode ? clear : exec, debounceMode === undefined ? delay - elapsed : delay);
		}

	}

	wrapper.cancel = cancel;

	// Return the wrapper function.
	return wrapper;

};

/**
 * Debounce execution of a function. Debouncing, unlike throttling,
 * guarantees that a function is only executed a single time, either at the
 * very beginning of a series of calls, or at the very end.
 *
 * @param  {Number}   delay         A zero-or-greater delay in milliseconds. For event callbacks, values around 100 or 250 (or even higher) are most useful.
 * @param  {Boolean}  [atBegin]     Optional, defaults to false. If atBegin is false or unspecified, callback will only be executed `delay` milliseconds
 *                                  after the last debounced-function call. If atBegin is true, callback will be executed only at the first debounced-function call.
 *                                  (After the throttled-function has not been called for `delay` milliseconds, the internal counter is reset).
 * @param  {Function} callback      A function to be executed after delay milliseconds. The `this` context and all arguments are passed through, as-is,
 *                                  to `callback` when the debounced-function is executed.
 *
 * @return {Function} A new, debounced function.
 */
jQuery.debounce = function (delay, atBegin, callback) {
	return callback === undefined ? jQuery.throttle(delay, atBegin, false) : jQuery.throttle(delay, callback, atBegin !== false);
};

(function ($) {

	// Fire a callback on element(s) when they scroll into view for the first time.
	$.fn.lazy = function (cb) {
		return this.each(function () {
			lazy.add(this, cb);
		});
	};

	var lazy = {
		init: function init (elem, cb) {
			$.data(elem, 'lazy.load', cb);
		},

		load: function load (elem) {
			var cb = $.data(elem, 'lazy.load');
			if (typeof cb === 'function') { cb.call(elem); }
		}
	};

	if (window.IntersectionObserver) {
		lazy.run = function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting || entry.intersectionRatio > 0) {
					lazy.observer.unobserve(entry.target);
					lazy.load(entry.target);
				}
			});
		};

		lazy.add = function (elem, cb) {
			if (!lazy.observer) {
				lazy.observer = new IntersectionObserver(lazy.run);
			}

			lazy.init(elem, cb);
			lazy.observer.observe(elem);
		};
	} else {
		lazy.run = function () {
			lazy.targets = $.grep(lazy.targets, function (target) {
				// https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/#using_event_handlers_the_most_compatible_way
				var c = target.getBoundingClientRect();
				var inView = (c.top <= window.innerHeight && c.bottom >= 0) && window.getComputedStyle(target).display !== 'none';
				if (inView) { lazy.load(target); }
				return !inView;
			});

			if (!lazy.targets.length) { $(window).off('.lazy'); }
		};

		lazy.add = function (elem, cb) {
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

(function ($) {

	if ('object-fit' in document.body.style) { return; }

	function objectFit() {
		var $image = $(this);
		var size   = $image.css('background-size');

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

	$(window).on('resize orientationchange', $.throttle(250, function () {
		$('img').each(objectFit);
	}));

})(jQuery);


(function ($) {

	$('.site-navicon').on('click', function (e) {
		e.preventDefault();

		$(document.documentElement).toggleClass('has-nav');
	});

	$('img[data-src]').lazy(function () {
		var this$1 = this;

		this.style.opacity = '0';

		$(this).one('load', function () { return this$1.style.opacity = ''; }).attr({
			src: this.getAttribute('data-src'),
			sizes: this.getAttribute('data-sizes'),
			srcset: this.getAttribute('data-srcset'),
			'data-src': null,
			'data-sizes': null,
			'data-srcset': null
		});

		if (this.complete) { $(this).trigger('load'); }
	});

	$(document.body).on({
		keydown: function keydown (e) {
			if (e.which === 9) { $(document.documentElement).addClass('has-tab-focus'); }
		},

		mousedown: function mousedown () {
			$(document.documentElement).removeClass('has-tab-focus');
		}
	});

})(jQuery);

//# sourceMappingURL=main.js.map
