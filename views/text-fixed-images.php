<?php 

$heading = get_field( 'text_fixed_image_heading' );
$text = get_field( 'text_fixed_image_text' );
$small_img_one = get_field( 'small_image_one' );
$small_img_two = get_field( 'small_image_two' );
$square_img = get_field( 'large_image' );

?>

<section class="text-fixed-images">
	<article class="grid">
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
			<figure>
				<?php if( $small_img_one[ 'url' ] ) : ?>
					<img src="<?php echo $small_img_one[ 'url' ]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
				<?php endif; ?>
			</figure>
			<figure>
				<?php if( $small_img_two[ 'url' ] ) : ?>
					<img src="<?php echo $small_img_two[ 'url' ]; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
				<?php endif; ?>
			</figure>
		</div>

		<figure class="ar ar:square text-fixed-images__square">
			<?php if( $square_img[ 'url' ] ) : ?>
				<img 
					src="<?php echo $square_img[ 'url' ]; ?>" 
					alt="<?php echo get_bloginfo( 'name' ); ?>" 
					class="cover"
				>
			<?php endif; ?>
		</figure>
	</div>
</section>