<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<script>document.documentElement.className='has-js';</script>
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
	<?php wp_body_open() ?>

	<header class="site-header">
		<div class="wrap push">
			<a class="site-logo" href="<?php bloginfo( 'url' ) ?>"><img src="<?php bloginfo( 'template_url' ) ?>/images/logo.svg" alt="<?php bloginfo( 'name' ) ?>" /></a>
			<a class="site-navicon" href="#nav">Menu</a>
		</div>
	</header>

	<nav class="site-nav" id="nav">
		<div class="wrap push">
			<a class="site-navicon" href="#content">Close</a>
			<?php

			wp_nav_menu([
				'theme_location' => 'header',
				'items_wrap'     => '<ul>%3$s</ul>',
				'fallback_cb'    => '',
				'container'      => '',
			]);

			?>
		</div>
	</nav>

	<main id="content">
