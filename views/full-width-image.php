<?php 

$image = get_field( 'full_width_image' );
$mobile = get_field( 'full_width_image_mobile' );

if( $image[ 'url' ] ) :

?>
	<figure data-reveal class="full-width-image wrap">
		<img 
			<?php if( $mobile[ 'url' ] ) : ?>class="desktop"<?php endif; ?>
			width="<?php $image[ 'width' ]; ?>"
			height="<?php $image[ 'height' ]; ?>"
			src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
			data-lazy="<?php echo $image[ 'url' ]; ?>" 
			alt="<?php echo get_bloginfo( 'name' ); ?>"
		>	
		<?php if( $mobile[ 'url' ] ) : ?>
			<img 
				class="mobile"
				width="<?php $mobile[ 'width' ]; ?>"
				height="<?php $mobile[ 'height' ]; ?>"
				alt="<?php echo get_bloginfo( 'name' ); ?>"
				src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
				data-lazy="<?php echo $mobile[ 'url' ]; ?>"
			>
		<?php endif; ?>
	</figure>
<?php endif; ?>