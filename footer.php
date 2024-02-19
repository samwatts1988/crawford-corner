
	</main>

	<?php 

	$contacts_one = get_field( 'contacts_one', 8 );
	$contacts_two = get_field( 'contacts_two', 8 );

	?>

	<footer class="site-footer">
		<div class="wrap">
			<div class="keyline content-wrap">
				<?php cc\view( 'download' ); ?>
			</div>
		</div>
		<div class="grid">
			<?php cc\view( 'contacts', [ 'content' => $contacts_one ] ); ?>
			<?php cc\view( 'contacts', [ 'content' => $contacts_two ] ); ?>
			<?php cc\view( 'credit' ); ?>
			<?php cc\view( 'collaborators' ) ?>
		</div>

		<div class="footer-lottie">
			<lottie-player src="<?php echo get_stylesheet_directory_uri(); ?>/js/lotties/CC_Logo_Animation_Footer.json"  background="transparent" speed="1"  style="width: 100%;"></lottie-player>		
		</div>

	</footer>

	<?php cc\view( 'splash' ); ?>
	<?php wp_footer() ?>
</body>
</html>