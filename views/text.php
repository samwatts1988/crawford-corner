<?php 

$heading = get_field( 'text_heading' );
$text = get_field( 'text_text' );

?>

<section class="text">
	<article class="grid">
		<header class="keyline content-wrap">
			<?php if( $heading ) : ?>
				<h2 class="font:bd text:md"><?php echo $heading; ?></h2>
			<?php endif; ?>
		</header>

		<div class="keyline content-wrap text:md">
			<?php echo $text; ?>
		</div>
	</article>
</section>