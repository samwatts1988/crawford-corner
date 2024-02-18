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
			<img 
				width="<?php echo $image[ 'width' ]; ?>"
				height="<?php echo $image[ 'height' ]; ?>"
				src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
				data-lazy="<?php echo $image[ 'url' ]; ?>" 
				alt="<?php echo $heading; ?>"
			>
		</figure>
	<?php endif; ?>
</article>