<?php

/**
 * Force HTML5 for field inputs.
 */
add_filter( 'pre_option_rg_gforms_enable_html5', '__return_true' );

/**
 * Disable core styles.
 */
add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

/**
 * Disable field tab indexes.
 */
add_filter( 'gform_tabindex', '__return_zero' );

/**
 * Force scripts to the footer.
 */
add_filter( 'gform_init_scripts_footer', '__return_true' );

/**
 * Force scripts to the footer for AJAX forms.
 */
add_filter( 'gform_get_form_filter', function ( $html ) {
	if ( ! preg_match( '!<script.+?</script>!s', $html, $match ) ) return $html;

	add_action( 'wp_print_footer_scripts', function () use ( $match ) {
		echo $match[0];
	});

	return str_replace( $match[0], '', $html );
});

/**
 * Add size & type state classes.
 */
add_filter( 'gform_field_css_class', function ( $class, $field ) {
	return "$class gfield--$field->size gfield--" . $field->get_input_type();
}, 10, 2 );

/**
 * Override textarea rows based on field size.
 */
add_filter( 'gform_field_content', function ( $html, $field ) {
	if ( $field->type === 'textarea' ) {
		$html = str_replace(
			"rows='10'",
			sprintf( 'rows="%s"', $field->size === 'large' ? 9 : ( $field->size === 'small' ? 3 : 6 ) ),
			$html
		);
	}

	return $html;
}, 10, 2 );
