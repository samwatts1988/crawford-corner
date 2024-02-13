<?php

/**
 * Clean up nav menus.
 */
add_filter( 'nav_menu_item_id',           '__return_null' );
add_filter( 'nav_menu_submenu_css_class', '__return_empty_array' );
add_filter( 'nav_menu_css_class', function ( $classes ) {
	$clean = [];
	if ( in_array( 'menu-item-has-children', $classes ) ) $clean[] = 'is-parent';
	if ( in_array( 'current-menu-item', $classes ) ) $clean[] = 'is-active';
	return $clean;
});

/**
 * Wrap embeds in .embed wrapper.
 */
add_filter( 'embed_oembed_html', function ( $html ) {
	return sprintf( '<div class="embed">%s</div>', preg_replace( '/ (width|height|frameborder)="[0-9]+"/i', '', $html ) );
});

/**
 * Excerpt length.
 */
add_filter( 'excerpt_length', function ( $length ) {
	return is_feed() ? $length : 45;
});

/**
 * Excerpt more.
 */
add_filter( 'excerpt_more', function () {
	return '...';
});

/**
 * Use site title for login header.
 */
add_filter( 'login_headertext', function () {
	return get_bloginfo( 'name' );
});

/**
 * Use site URL for login header.
 */
add_filter( 'login_headerurl', function () {
	return home_url( '/' );
});
