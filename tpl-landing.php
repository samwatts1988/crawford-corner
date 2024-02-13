<?php

/**
 * Template Name: Landing
 */

get_header();

while ( have_posts() ) : the_post() ?>

	<div class="wrap layout">
		<article>
			<?php the_title( '<h1>', '</h1>' ) ?>
			<?php the_content() ?>
		</article>
	</div>

<?php endwhile;

get_footer();
