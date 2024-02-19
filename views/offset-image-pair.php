<?php 

$image_one = get_field( 'offset_image_one' );
$image_two = get_field( 'offset_image_two' );

?>

<section class="offset-image-pair grid">
	<figure data-reveal class="ar ar:square">
		<?php if( $image_one[ 'url' ] ) : ?>
			<img 
				width="<?php echo $image_one[ 'width' ]; ?>"
				height="<?php echo $image_one[ 'height' ]; ?>"
				src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
				data-lazy="<?php echo $image_one[ 'url' ]; ?>" 
				alt="<?php echo get_bloginfo( 'name' ); ?>" 
				class="cover"
			>
		<?php endif; ?>
	</figure>
	<figure data-reveal class="ar ar:square">
		<?php if( $image_two[ 'url' ] ) : ?>
			<img 
				width="<?php echo $image_two[ 'width' ]; ?>"
				height="<?php echo $image_two[ 'height' ]; ?>"
				src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
				data-lazy="<?php echo $image_two[ 'url' ]; ?>" 
				alt="<?php echo get_bloginfo( 'name' ); ?>" 
				class="cover"
			>
		<?php endif; ?>
	</figure>
</section>