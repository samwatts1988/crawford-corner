<?php 

$image_one = get_field( 'offset_image_one' );
$image_two = get_field( 'offset_image_two' );

?>

<section class="offset-image-pair grid">
	<figure class="ar ar:square">
		<?php if( $image_one[ 'url' ] ) : ?>
			<img 
				src="<?php echo $image_one[ 'url' ]; ?>" 
				alt="<?php echo get_bloginfo( 'name' ); ?>" 
				class="cover"
			>
		<?php endif; ?>
	</figure>
	<figure class="ar ar:square">
		<?php if( $image_two[ 'url' ] ) : ?>
			<img 
				src="<?php echo $image_two[ 'url' ]; ?>" 
				alt="<?php echo get_bloginfo( 'name' ); ?>" 
				class="cover"
			>
		<?php endif; ?>
	</figure>
</section>