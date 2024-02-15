<article class="snippet flex spacious keyline content-wrap">
	<div>
		<?php if( $heading ) : ?>
			<h2 class="font:bd"><?php echo $heading; ?></h2>
		<?php endif; ?>

		<?php if( $content ) : ?>
			<div><?php echo $content; ?></div>
		<?php endif; ?>		
	</div>

	<?php if( $image ) : ?>
		<figure>
			<img src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo $heading; ?>">
		</figure>
	<?php endif; ?>
</article>