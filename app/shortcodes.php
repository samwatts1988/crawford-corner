<?php

/**
 * Generate anti-spam mailto: link.
 */
add_shortcode( 'email', function ( $atts ) {
	$email = is_array( $atts ) ? array_shift( $atts ) : get_option( 'options_contact_email' );
	$email = antispambot( $email );
	$uri   = antispambot( 'mailto:' );

	return sprintf( '<a href="%s%s">%2$s</a>', $uri, $email );
});

/**
 * Generate encoded tel: link.
 */
add_shortcode( 'phone', function ( $atts ) {
	$phone = is_array( $atts ) ? array_shift( $atts ) : get_option( 'options_contact_email' );
	$uri   = str_replace( [ '(0)', ' ' ], '', $phone );
	$uri   = urlencode( $uri );
	$phone = esc_html( $phone );

	return sprintf( '<a href="tel:%s">%s</a>', $uri, $phone );
});

/**
 * Generate post image gallery markup.
 */
add_filter( 'post_gallery', function ( $html, $args ) {
	$r = shortcode_atts([
		'id'      => get_the_ID(),
		'link'    => 'file',
		'order'   => 'ASC',
		'orderby' => 'menu_order ID',
		'include' => '',
		'exclude' => '',
	], $args, 'gallery' );

	$attachments = get_posts([
		'post_type'      => 'attachment',
		'post_status'    => 'inherit',
		'post_mime_type' => 'image',
		'posts_per_page' => -1,
		'post_parent'    => $r['include'] ? null : $r['id'],
		'include'        => $r['include'],
		'exclude'        => $r['exclude'],
		'orderby'        => $r['orderby'],
		'order'          => $r['order'],
	]);

	if ( is_feed() ) {
		foreach ( $attachments as $attachment ) {
			$html .= "\n" . wp_get_attachment_link( $attachment->ID, 'thumbnail', true );
		}
	} else {
		$html = '<div class="gallery">';

		foreach ( $attachments as $attachment ) {
			$image = wp_theme\image( $attachment, 'medium_large', 'class=cover' );

			if ( $r['link'] !== 'none' ) {
				$url = $r['link'] === 'file' ? wp_get_attachment_url( $attachment->ID ) : get_attachment_link( $attachment->ID );
				$image = sprintf( '<a class="gallery-media" href="%s">%s</a>', $url, $image );
			} else {
				$image = sprintf( '<div class="gallery-media">%s</div>', $image );
			}

			if ( $caption = trim( $attachment->post_excerpt ) ) {
				$image .= '<figcaption>' . wptexturize( $caption ) . '</figcaption>';
			}

			$html .= "\n<figure>$image</figure>";
		}

		$html .= '</div>';
	}

	// Always return non-empty string to skip core handling in gallery_shortcode()
	return "$html\n";
}, 10, 2 );
