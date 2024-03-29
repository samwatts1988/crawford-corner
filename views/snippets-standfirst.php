<?php 

$standfirst = get_field( 'snippets_standfirst' );

?>

<section class="snippets-standfirst">
	<?php if( $standfirst ) : ?>
		<div data-reveal class="grid">
			<div class="standfirst font:bd text:sf"><?php echo $standfirst; ?></div>
		</div>
	<?php endif; ?>
	<div data-step-reveal class="snippets grid">
		<?php while( have_rows( 'snippet' ) ) : the_row(); 
			cc\view( 'snippet', [ 
				'heading' => get_sub_field( 'heading' ),
				'content' => get_sub_field( 'content' ),
				'image'	  => get_sub_field( 'image' )
			]);
		endwhile; ?>
	</div>
</section>