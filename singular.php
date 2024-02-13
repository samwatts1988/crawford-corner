<?php

get_header();

while ( have_posts() ) : the_post() ?>

	<div class="wrap layout">
		<article class="layout-main">
			<?php the_title( '<h1>', '</h1>' ) ?>
			<?php the_content() ?>
			<?php the_post_navigation() ?>
		</article>

		<aside class="layout-side">
			<?php dynamic_sidebar( get_post_type() ) ?>
		</aside>
	</div>

<?php endwhile;

get_footer();
