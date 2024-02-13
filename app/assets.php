<?php

/**
 * Frontend assets.
 */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		get_stylesheet(),
		get_theme_file_uri( 'dist/main.css' ),
		null,
		@filemtime( get_theme_file_path( 'dist/main.css' ) ),
	);

	wp_enqueue_script(
		get_stylesheet(),
		get_theme_file_uri( 'dist/main.js' ),
		[ 'jquery' ],
		@filemtime( get_theme_file_path( 'dist/main.js' ) ),
		true
	);

	// Removes jquery-migrate & pushes jQuery to footer
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->registered['jquery']->deps = [
		'jquery-core',
	];

	// No Gutenberg
	wp_dequeue_style( 'wp-block-library' );
});

/**
 * Admin assets.
 */
add_action( 'admin_enqueue_scripts', function () {
	wp_enqueue_style(
		get_stylesheet() . '-admin',
		get_theme_file_uri( 'dist/admin.css' ),
		null,
		@filemtime( get_theme_file_path( 'dist/admin.css' ) )
	);
});

/**
 * Login assets.
 */
add_action( 'login_enqueue_scripts', function () {
	wp_enqueue_style(
		get_stylesheet() . '-login',
		get_theme_file_uri( 'dist/login.css' ),
		null,
		@filemtime( get_theme_file_path( 'dist/login.css' ) )
	);
});

/**
 * Cleanup header & footer asset attributes for HTML5.
 */
add_action( 'wp_head', $start = function () {
	ob_start();
}, 5 );

add_action( 'wp_head', $clean = function () {
	echo strtr( ob_get_clean(), [
		" media='all'" => '',
		' media="all"' => '',
		" type='text/css'" => '',
		' type="text/css"' => '',
		" type='text/javascript'" => '',
		' type="text/javascript"' => '',
	]);
}, 500 );

add_action( 'wp_footer', $start, 5 );
add_action( 'wp_footer', $clean, 500 );
