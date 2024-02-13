<?php

add_action( 'after_setup_theme', function () {
	global $content_width;

	$content_width = 800;

	register_nav_menus([
		'header' => 'Header',
	]);

	register_sidebar([
		'name'          => 'Page',
		'id'            => 'page',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n",
	]);

	register_sidebar([
		'name'          => 'Blog',
		'id'            => 'post',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => "</h5>\n",
	]);

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form',
		'gallery',
		'caption',
	]);

	add_theme_support( 'editor-style-formats', [
		'title'    => 'Button',
		'classes'  => 'button',
		'selector' => 'a',
	]);

	add_editor_style( 'dist/editor.css' );
});
