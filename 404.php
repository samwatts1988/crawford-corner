<?php get_header(); ?>

	<section class="error">
		<div class="grid">
			<div class="standfirst text:sf font:bd">
				<?php if( get_field( 'heading', 'option' ) ) : ?>
					<h2 class="text:sf"><?php echo get_field( 'heading', 'option' ); ?></h2>
				<?php endif; ?>

				<?php if( get_field( 'content', 'option' ) ) : ?>
					<div><?php echo get_field( 'content', 'option' ); ?></div>
				<?php endif; ?>

				<p class="download font:bd text:md flex">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.679 15.952"><g fill="#735d53" data-name="Group 9"><path d="m17.158 11.433-3.456 3.456 1.063 1.063 3.456-3.456 3.456-3.456-1.063-1.063Z" data-name="Path 23"/><path d="m14.766 0-1.063 1.063 3.456 3.457 3.456 3.456 1.063-1.063-3.456-3.456Z" data-name="Path 24"/><path d="M19.552 8.728v-1.5H9.776v1.5h9.776Z" data-name="Path 25"/><path d="M4.888 7.228H0v1.5h9.776v-1.5Z" data-name="Path 26"/></g></svg>
					<a rel="noreferrer" target="_blank" href="<?php echo get_bloginfo( 'url' ); ?>">Homepage</a>
				</p>
			</div>
		</div>
	</section>

<?php get_footer(); ?>