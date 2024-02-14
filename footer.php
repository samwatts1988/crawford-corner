
	</main>

	<?php 

	$contacts = get_field( 'contacts_one' );
	$contacts = get_field( 'contacts_two' );

	?>

	<footer class="site-footer">
		<div class="wrap">
			<div class="keyline content-wrap">
				<?php cc\view( 'download' ); ?>
			</div>
		</div>
		<div class="grid">
			<?php cc\view( 'contacts' ); ?>
			<?php cc\view( 'contacts' ); ?>
			<?php cc\view( 'credit' ); ?>
			<?php cc\view( 'collaborators' ) ?>
		</div>
	</footer>

	<?php wp_footer() ?>
</body>
</html>