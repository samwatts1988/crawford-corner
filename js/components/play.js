(($) => {

	if( !document.querySelector( '.play' ) ) return;

	var video = document.querySelector('.full-width-video video');
	var seekBar = document.getElementById('seek-bar');
	
	video.addEventListener('loadedmetadata', function() {
		var total = video.duration.toFixed(0); 
		var minutes = Math.floor(total / 60); 
		var seconds = total % 60;
				
		$('.duration').text("Duration: " + minutes + ":" + seconds + "s");
	});
	
	$('.full-width-video video').on('click touchstart', function(e) {
		e.preventDefault();

		document.body.classList.toggle( 'video-is-playing' );
		if( document.body.classList.contains( 'video-is-playing' ) ) {
			video.play();
		} else {
			video.pause();
		}

	});
	
	$(seekBar).on('input change', function() {
		var time = video.duration * (seekBar.value / 100);
		video.currentTime = time;
	});

	video.addEventListener("canplay", function() {
  		video.addEventListener("timeupdate", function() {

			if (!video.paused) {
				var value = (100 / video.duration) * video.currentTime;
				seekBar.value = value;
			}
			
		});
	});

	seekBar.addEventListener("mousedown", function() {
		video.pause();
		document.body.classList.renove( 'video-is-playing' );
	});

	seekBar.addEventListener("mouseup", function() {
		video.play();
		document.body.classList.add( 'video-is-playing' );
	});

})( jQuery );