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

/**
* Removes WYSIWYG from specified page templates
*/
add_action('admin_enqueue_scripts', function() {

    global $post;

    if( ! is_a($post, 'WP_Post') ) {
        return;
    }

    // Home
    if( get_the_ID() === 8 ) {
        remove_post_type_support( 'page', 'editor' );
    }    

});

/**
 * Removes buttons from the first row of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons', 'jivedig_remove_tiny_mce_buttons_from_editor');
function jivedig_remove_tiny_mce_buttons_from_editor( $buttons ) {
    $remove_buttons = array(
        'bold',
        'italic',
        'strikethrough',
        'numlist',
        'blockquote',
        'hr', // horizontal line
        'alignleft',
        'aligncenter',
        'alignright',
        'formatselect',
        'styleselect',
        'wp_more', // read more link
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}
/**
 * Removes buttons from the second row (kitchen sink) of the tiny mce editor
 *
 * @link     http://thestizmedia.com/remove-buttons-items-wordpress-tinymce-editor/
 *
 * @param    array    $buttons    The default array of buttons in the kitchen sink
 * @return   array                The updated array of buttons that exludes some items
 */
add_filter( 'mce_buttons_2', 'jivedig_remove_tiny_mce_buttons_from_kitchen_sink');
function jivedig_remove_tiny_mce_buttons_from_kitchen_sink( $buttons ) {
    $remove_buttons = array(
        'formatselect', // format dropdown menu for <p>, headings, etc
        'underline',
        'alignjustify',
        'forecolor', // text color
        'pastetext', // paste as text
        'removeformat', // clear formatting
        'charmap', // special characters
        'outdent',
        'indent',
        'strikethrough',
        'hr'
    );
    foreach ( $buttons as $button_key => $button_value ) {
        if ( in_array( $button_value, $remove_buttons ) ) {
            unset( $buttons[ $button_key ] );
        }
    }
    return $buttons;
}