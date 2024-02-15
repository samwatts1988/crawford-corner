
	</main>

	<?php 

	$contacts_one = get_field( 'contacts_one' );
	$contacts_two = get_field( 'contacts_two' );

	?>

	<footer class="site-footer">
		<div class="wrap">
			<div class="keyline content-wrap">
				<?php //cc\view( 'download' ); ?>
			</div>
		</div>
		<div class="grid">
			<?php //cc\view( 'contacts', [ 'content' => $contacts_one ] ); ?>
			<?php //cc\view( 'contacts', [ 'content' => $contacts_two ] ); ?>
			<?php //cc\view( 'credit' ); ?>
			<?php //cc\view( 'collaborators' ) ?>
		</div>
	</footer>

	<?php wp_footer() ?>
</body>
</html>