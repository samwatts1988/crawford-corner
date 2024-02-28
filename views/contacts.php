<article class="keyline content-wrap">
	<?php if( $content['logo'] ) : ?>
		<figure>
			<img src="<?php echo $content[ 'logo' ][ 'url' ]; ?>">
		</figure>
	<?php endif; ?>

	<ul class="contacts">
		<?php foreach( $content[ 'contact' ] as $contact ) : 
			cc\view( 'contact', [ 'content' => $contact ] );
		endforeach; ?>		
	</ul>
</article>
