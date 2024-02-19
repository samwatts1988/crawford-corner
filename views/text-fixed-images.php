<?php 

$heading = get_field( 'text_fixed_image_heading' );
$text = get_field( 'text_fixed_image_text' );
$small_img_one = get_field( 'small_image_one' );
$small_img_two = get_field( 'small_image_two' );
$square_img = get_field( 'large_image' );

?>

<section class="text-fixed-images">
	<article data-reveal class="grid">
		<header class="keyline content-wrap">
			<?php if( $heading ) : ?>
				<h2 class="font:bd text:md"><?php echo $heading; ?></h2>
			<?php endif; ?>
		</header>

		<div class="keyline content-wrap text:md copy">
			<?php echo $text; ?>
		</div>
	</article>

	<div class="grid">
		<div class="text-fixed-images__small">
			<figure data-reveal>
				<?php if( $small_img_one[ 'url' ] ) : ?>
					<img 
						width="<?php echo $small_img_one[ 'width' ]; ?>"
						height="<?php echo $small_img_one[ 'height' ]; ?>"
						src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
						data-lazy="<?php echo $small_img_one[ 'url' ]; ?>" 
						alt="<?php echo get_bloginfo( 'name' ); ?>"
					>
				<?php endif; ?>
			</figure>
			<figure data-reveal>
				<?php if( $small_img_two[ 'url' ] ) : ?>
					<img 
						width="<?php echo $small_img_two[ 'width' ]; ?>"
						height="<?php echo $small_img_two[ 'height' ]; ?>"
						src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
						data-lazy="<?php echo $small_img_two[ 'url' ]; ?>" 
						alt="<?php echo get_bloginfo( 'name' ); ?>"
					>
				<?php endif; ?>
			</figure>
		</div>

		<figure data-reveal class="ar ar:square text-fixed-images__square">
			<?php if( $square_img[ 'url' ] ) : ?>
				<img 
					width="<?php echo $square_img[ 'width' ]; ?>"
					height="<?php echo $square_img[ 'height' ]; ?>"
					src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
					data-lazy="<?php echo $square_img[ 'url' ]; ?>" 
					alt="<?php echo get_bloginfo( 'name' ); ?>" 
					class="cover"
				>
			<?php endif; ?>
		</figure>
	</div>
</section>