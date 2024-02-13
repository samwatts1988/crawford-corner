
	</main>

	<footer class="site-footer">
		<div class="wrap push">
			<?php if ( have_rows( 'networks', 'options' ) ) : ?>
				<ul>
					<?php while ( have_rows( 'networks', 'options' ) ) : the_row() ?>
						<li><a target="_blank" rel="noopener" href="<?php the_sub_field( 'url' ) ?>"><?php the_sub_field( 'name' ) ?></a></li>
					<?php endwhile ?>
				</ul>
			<?php endif ?>

			<p>© <?php echo date( 'Y' ) ?> <?php bloginfo( 'name' ) ?> <?php the_privacy_policy_link() ?></p>
		</div>
	</footer>

	<?php wp_footer() ?>
</body>
</html>