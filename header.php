<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<script>document.documentElement.className='has-js';</script>
	<?php wp_head() ?>
</head>
<body <?php body_class( 'bg:light' ) ?>>
	<?php wp_body_open() ?>

	<header class="site-header">
		<div class="wrap grid">
			<div class="site-header__title">
				<p class="font:bd text:md"><a href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></p>
			</div>
			<div class="site-header__desc">
				<p class="font:bd text:md"><?php echo get_bloginfo( 'description' ); ?></p>
			</div>
		</div>
	</header>

	<main id="content">
