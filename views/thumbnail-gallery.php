<?php 

$thumbnails = get_field( 'thumbnail_gallery' );

?>

<?php if( $thumbnails ) : ?>
	<section class="thumbnail-gallery wrap">
		<h2 class="screen-reader-text">Thumbnail Gallery for <?php echo bloginfo( 'name' ); ?></h2>
		
		<div class="swiper-navigation flex spacious">
			<div class="swiper-button-prev">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.679 15.952"><g fill="#735d53" data-name="Group 9"><path d="m17.158 11.433-3.456 3.456 1.063 1.063 3.456-3.456 3.456-3.456-1.063-1.063Z" data-name="Path 23"/><path d="m14.766 0-1.063 1.063 3.456 3.457 3.456 3.456 1.063-1.063-3.456-3.456Z" data-name="Path 24"/><path d="M19.552 8.728v-1.5H9.776v1.5h9.776Z" data-name="Path 25"/><path d="M4.888 7.228H0v1.5h9.776v-1.5Z" data-name="Path 26"/></g></svg>
			</div>
			<div class="swiper-button-next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.679 15.952"><g fill="#735d53" data-name="Group 9"><path d="m17.158 11.433-3.456 3.456 1.063 1.063 3.456-3.456 3.456-3.456-1.063-1.063Z" data-name="Path 23"/><path d="m14.766 0-1.063 1.063 3.456 3.457 3.456 3.456 1.063-1.063-3.456-3.456Z" data-name="Path 24"/><path d="M19.552 8.728v-1.5H9.776v1.5h9.776Z" data-name="Path 25"/><path d="M4.888 7.228H0v1.5h9.776v-1.5Z" data-name="Path 26"/></g></svg>
			</div>
		</div>
		<div class="swiper-container swiper-thumbnail-gallery">
			<div class="swiper-wrapper">
				<?php foreach( $thumbnails as $image ) : ?>
					<div class="swiper-slide">
						<figure class="ar ar:square">
							<img class="cover" src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
						</figure>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>