<?php get_header() ?>

<div class="wrap layout">
	<div class="layout-main">
		<h1><?php

			if ( is_singular() )
				single_post_title();
			elseif ( is_search() )
				printf( 'Search for "%s"', get_search_query() );
			elseif ( is_day() )
				echo get_the_date();
			elseif ( is_month() )
				echo get_the_date( 'F Y' );
			elseif ( is_year() )
				echo get_the_date( 'Y' );
			elseif ( is_category() || is_tag() || is_tax() )
				single_term_title();
			elseif ( is_post_type_archive() )
				post_type_archive_title();
			elseif ( is_author() )
				echo esc_html( get_queried_object()->display_name );
			else
				echo get_the_title( get_option( 'page_for_posts' ) );

		?></h1>

		<?php while ( have_posts() ) : the_post() ?>

			<article>
				<?php the_title( '<h2><a href="' . get_permalink() . '">', '</a></h2>' ) ?>
				<?php the_excerpt() ?>
			</article>

		<?php endwhile ?>

		<?php the_posts_navigation() ?>
	</div>

	<aside class="layout-side">
		<?php dynamic_sidebar( 'post' ) ?>
	</aside>
</div>

<?php get_footer();
