<?php

/**
 * Register theme style formats.
 *
 * @see app/setup.php
 */
add_filter( 'tiny_mce_before_init', function ( $config ) {
	$config['style_formats'] = wp_json_encode( get_theme_support( 'editor-style-formats' ) ?: [] );

	return $config;
});

/**
 * Add styleselect (formats) to MCE toolbar.
 */
add_filter( 'mce_buttons', $mce_buttons_add_styleselect = function ( $buttons ) {
	$i = array_search( 'formatselect', $buttons ) ?: 0;
	array_splice( $buttons, $i, 0, 'styleselect' );
	return $buttons;
});

add_filter( 'teeny_mce_buttons', $mce_buttons_add_styleselect );
