<?php 

$image = get_field( 'full_width_image' );

if( $image[ 'url' ] ) :

?>
	<figure class="full-width-image wrap">
		<img 
			width="<?php $image[ 'width' ]; ?>"
			height="<?php $image[ 'height' ]; ?>"
			src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
			data-lazy="<?php echo $image[ 'url' ]; ?>" 
			alt="<?php echo get_bloginfo( 'name' ); ?>"
		>	
	</figure>
<?php endif; ?>