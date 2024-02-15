<?php

namespace cc;

/**
 * Get (lazy-loaded) image HTML.
 *
 * Passing a post or term object will retrieve its thumbnail (featured) image.
 *
 * @param  int|object|string $image
 * @param  string            $size
 * @param  string|array      $atts
 * @return string
 */
function image( $image = null, $size = 'full', $attr = '' ) {
	if ( $image === null ) $image = get_post();

	if ( ! is_string( $image ) || ctype_digit( $image ) ) {
		if ( ! is_object( $image ) )
			$id = $image;
		elseif ( isset( $image->post_type ) )
			$id = $image->post_type === 'attachment' ? $image->ID : get_post_thumbnail_id( $image );
		elseif ( isset( $image->term_id ) )
			$id = get_term_meta( $image->term_id, 'thumbnail_id', true );
		else
			$id = 0;

		$id    = (int) $id;
		$image = $id ? wp_get_attachment_image( $id, $size, false, $attr ) : '';
	}

	if ( $image ) {
		$image = strtr( $image, [
			' src='    => ' src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src=',
			' srcset=' => ' data-srcset=',
			' sizes='  => ' data-sizes=',
		]) . "<noscript>$image</noscript>";
	}

	return $image;
}

/**
 * Render view file.
 *
 * @param  string|array $name If array, first found will be rendered.
 * @param  array        $vars
 * @return bool Was the view was found?
 */
function view( $name, $vars = [] ) {
	if ( is_array( $name ) ) {
		foreach ( $name as $_name ) {
			$view = view( $_name, $vars );
			if ( $view ) return $view;
		}
		return false;
	}

	if ( ! $name ) return false;
	if ( substr( $name, -4 ) !== '.php' ) $name .= '.php';
	if ( validate_file( $name ) ) return false;

	$__file = locate_template( "views/$name" );
	if ( ! $__file ) return false;

	unset( $name );
	extract( $vars, EXTR_SKIP );

	if ( isset( $vars['vars'] ) ) {
		$vars = $vars['vars'];
	} else {
		unset( $vars );
	}

	include $__file;

	return $__file;
}

/**
* Format telephone number link
*
* @param  string 	$tel
*/
function format_tel( $tel ) {

	$tel 	= 	str_replace( '+', '', $tel );
	$tel 	= 	str_replace( '(', '', $tel );
	$tel 	= 	str_replace( ')', '', $tel );
	$tel 	= 	str_replace( ' ', '', $tel );
	return "tel:+" . $tel;

}