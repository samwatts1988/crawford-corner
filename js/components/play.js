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

	video.addEventListener( "ended", function(e) {
		document.body.classList.remove( 'video-is-playing' );
		video.currentTime = 0;
	});

	seekBar.addEventListener("mousedown", function() {
		video.pause();
	});

	video.addEventListener("mousemove", function() {
		document.body.classList.remove( 'video-idle' );
	});

	seekBar.addEventListener("mouseup", function() {
		video.play();
		document.body.classList.add( 'video-is-playing' );
	});

	let timer, currSeconds = 0; 
          
        function resetTimer() { 
            clearInterval(timer); 
            currSeconds = 0; 
            timer = setInterval(startIdleTimer, 1000); 
        } 
          
        window.onmousemove = resetTimer; 
        window.onclick = resetTimer; 
          
        function startIdleTimer() { 

        	if( !document.querySelector( '.video-is-playing' ) ) return;
              
            currSeconds++; 

            if( currSeconds > 1 ) {
            	document.body.classList.add( 'video-idle' );
            } 
        } 

})( jQuery );