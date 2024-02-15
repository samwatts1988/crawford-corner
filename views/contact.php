<li>
	<?php if( $content[ 'name' ] ) : ?>
		<p class="font:bd"><?php echo $content[ 'name' ]; ?></p>
	<?php endif; ?>
  	<?php if( $content[ 'email' ] ) : ?>
		<p>
			<a href="mailto:<?php echo antispambot( $content[ 'email' ] ); ?>">
				<?php echo $content[ 'email' ]; ?>
			</a>
		</p>
	<?php endif; ?>
	<?php if( $content[ 'telephone' ] ) : ?>
		<p>
			<a href="<?php echo cc\format_tel( $content[ 'telephone' ] ); ?>">
				<?php echo $content[ 'telephone' ]; ?>
			</a>
		</p>
	<?php endif; ?>
</li>