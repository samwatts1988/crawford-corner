<?php

/**
 * Attempt to auto-cache all data in one for the current request
 * e.g. post authors, post thumbnails, post relations (via meta)
 *
 * Singular views will attempt to cache ACF-linked data:
 * - Field return setting must be set to ID
 * - Field key name must end with a post type or "image(s)"
 *
 * Use the template_redirect hook as it's late and (attempts) to ensure we're
 * not needlessly caching (i.e. if the request ends up redirecting).
 */
add_action( 'template_redirect', function () {
	if ( function_exists( 'wc_get_page_id' ) ) {
		$post_ids = [
			wc_get_page_id( 'shop' ),
			wc_get_page_id( 'cart' ),
			wc_get_page_id( 'checkout' ),
			wc_get_page_id( 'myaccount' ),
		];
	} else {
		$post_ids = [];
	}

	$user_ids = [];
	$the_post = is_singular() ? get_queried_object() : null;

	if ( $the_post ) {
		$post_ids = array_merge( $post_ids, get_post_ancestors( $the_post ) );

		$post_types = get_post_types([ 'show_ui' => true ]);
		$post_types = implode( '|', $post_types );
		$cache_keys = "/(^|_)($post_types|image|gallery)s?\$/";

		foreach ( get_post_meta( $the_post->ID ) as $key => $value ) {
			if ( $key === '_thumbnail_id' || $key[0] !== '_' && preg_match( $cache_keys, $key ) ) {
				$ids = array_filter( wp_parse_id_list( maybe_unserialize( $value[0] ) ) );
				if ( $ids ) {
					$post_ids = array_merge( $post_ids, $ids );
				}
			}
		}
	} else {
		global $wp_query;
		if ( ! empty( $wp_query->posts ) ) {
			$user_ids = wp_list_pluck( $wp_query->posts, 'post_author' );
		}
	}

	$post_ids = array_filter( wp_parse_id_list( $post_ids ) );

	if ( count( $post_ids ) > 1 ) {
		_prime_post_caches( $post_ids, false );

		$xtra_ids = [];

		foreach ( $post_ids as $post_id ) {
			if ( wp_cache_get( $post_id, 'posts' ) && 'attachment' !== $post_type = get_post_type( $post_id ) ) {
				// Cache all thumbnails and users of posts that have just been cached.
				$xtra_ids[] = absint( get_post_meta( $post_id, '_thumbnail_id', true ) );
				$user_ids[] = get_post_field( 'post_author', $post_id );
			}
		}

		$xtra_ids = array_filter( array_unique( $xtra_ids ) );

		if ( count( $xtra_ids ) > 1 ) {
			_prime_post_caches( $xtra_ids, false );
		}
	}

	$user_ids = array_filter( wp_parse_id_list( $user_ids ) );

	if ( count( $user_ids ) > 1 ) {
		cache_users( $user_ids );
	}
}, 1000 );
