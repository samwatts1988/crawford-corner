<article class="keyline content-wrap">
	<?php if( $content['logo'] ) : 

		$image = $content['logo'];
		$link = get_field('link', $image); 
		$size = 'full';

		?>
		<?php if( $link ) : ?>
			<a target="_blank" rel="noreferrer" href="<?php echo $link; ?>">
		<?php endif; ?>
			<figure>
				<?php echo wp_get_attachment_image( $image, $size ); ?>
			</figure>
		<?php if( $link ) : ?>
			</a>
		<?php endif; ?>
	<?php endif; ?>

	<ul class="contacts">
		<?php foreach( $content[ 'contact' ] as $contact ) : 
			cc\view( 'contact', [ 'content' => $contact ] );
		endforeach; ?>		
	</ul>
</article>
