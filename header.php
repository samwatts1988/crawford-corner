<!DOCTYPE html>
<html class="no-js" <?php language_attributes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<script>document.documentElement.className='has-js';</script>
	<?php wp_head() ?>

	<!-- Google tag (gtag.js) -->
	<script async src=“https://www.googletagmanager.com/gtag/js?id=G-H6MQQ0SXS3”></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'G-H6MQQ0SXS3');
	</script>
</head>
<body <?php body_class( 'bg:light splash-visible' ) ?>>
	<?php wp_body_open() ?>

	<header class="site-header">
		<div class="wrap grid">
			<div data-reveal class="site-header__title">
				<p class="font:bd text:md"><a href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></p>
			</div>
			<div data-reveal class="site-header__desc">
				<p class="font:bd text:md"><?php echo get_bloginfo( 'description' ); ?></p>
			</div>
		</div>
	</header>

	<main id="content">
