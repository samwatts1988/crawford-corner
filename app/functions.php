<?php

namespace wp_theme;

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
