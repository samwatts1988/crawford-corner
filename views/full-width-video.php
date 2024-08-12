<?php 

$video = get_field( 'full_width_video' );

if( $video ) :

?>
	<figure data-reveal class="full-width-image full-width-video wrap">
		<video poster="<?php echo get_stylesheet_directory_uri(); ?>/images/poster.jpg" playsinline>
			<source src="<?php echo $video; ?>">
		</video>

		<a class="play" href="#play">
			<span class="screen-reader-text">Play/Pause toggle</span>
		</a>

		<input type="range" id="seek-bar" min="0" max="100" value="0" step="0.05">
	</figure>
<?php endif; ?>