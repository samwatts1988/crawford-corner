<article class="keyline content-wrap">
	<?php if( $content['heading'] ) : ?>
		<p class="uppercase font:bd"><?php echo $content['heading']; ?></p>
	<?php endif; ?>

	<ul class="contacts">
		<?php foreach( $content[ 'contact' ] as $contact ) : 
			cc\view( 'contact', [ 'content' => $contact ] );
		endforeach; ?>		
	</ul>
</article>
