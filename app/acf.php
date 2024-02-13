<?php

/**
 * Register ACF site options page.
 */
add_action( 'acf/init', function () {
	acf_add_options_page([
		'page_title'  => get_bloginfo( 'name' ) . ' Settings',
		'menu_title'  => get_bloginfo( 'name' ),
		'menu_slug'   => 'site-settings',
		'capability'  => 'manage_options',
		'parent_slug' => 'options-general.php',
		'autoload'    => true,
	]);
});

/**
 * Bump ACF meta box priority down from normal to default.
 */
add_filter( 'acf/input/meta_box_priority', function () {
	return 'default';
});

/**
 * Always HTML-escape text fields by default.
 */
add_filter( 'acf/format_value/type=text',     'esc_html', 5 );
add_filter( 'acf/format_value/type=textarea', 'esc_html', 5 );

/**
 * Apply shortcode to text fields.
 */
add_filter( 'acf/format_value/type=text',     'do_shortcode' );
add_filter( 'acf/format_value/type=textarea', 'do_shortcode' );

/**
 * Auto-populate form choices with Gravity Forms.
 */
add_filter( 'acf/load_field/name=form', function ( $field ) {
	if ( class_exists( 'GFAPI' )) {
		$field['choices'] = [];

		foreach ( GFAPI::get_forms() as $form ) {
			$field['choices'][ $form['id'] ] = $form['title'];
		}
	}

	return $field;
});
