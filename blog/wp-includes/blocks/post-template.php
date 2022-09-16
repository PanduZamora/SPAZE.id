<?php
/**
 * Server-side rendering of the `core/post-template` block.
 *
 * @package WordPress
 */

/**
 * Determines whether a block list contains a block that uses the featured image.
 *
 * @param WP_Block_List $inner_blocks Inner block instance.
 *
 * @return bool Whether the block list contains a block that uses the featured image.
 */
function block_core_post_template_uses_featured_image( $inner_blocks ) {
	foreach ( $inner_blocks as $block ) {
		if ( 'core/post-featured-image' === $block->name ) {
			return true;
		}
		if (
			'core/cover' === $block->name &&
			! empty( $block->attributes['useFeaturedImage'] )
		) {
			return true;
		}
		if ( $block->inner_blocks && block_core_post_template_uses_featured_image( $block->inner_blocks ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Renders the `core/post-template` block on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 *
 * @return string Returns the output of the query, structured using the layout defined by the block's inner blocks.
 */
function render_block_core_post_template( $attributes, $content, $block ) {
	$page_key = isset( $block->context['queryId'] ) ? 'query-' . $block->context['queryId'] . '-page' : 'query-page';
	$page     = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ];

<<<<<<< HEAD
	$query_args = build_query_vars_from_query_block( $block, $page );
	// Override the custom query with the global query if needed.
	$use_global_query = ( isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'] );
	if ( $use_global_query ) {
		global $wp_query;
		if ( $wp_query && isset( $wp_query->query_vars ) && is_array( $wp_query->query_vars ) ) {
			// Unset `offset` because if is set, $wp_query overrides/ignores the paged parameter and breaks pagination.
			unset( $query_args['offset'] );
			$query_args = wp_parse_args( $wp_query->query_vars, $query_args );

			if ( empty( $query_args['post_type'] ) && is_singular() ) {
				$query_args['post_type'] = get_post_type( get_the_ID() );
			}
		}
	}

	$query = new WP_Query( $query_args );

=======
	// Use global query if needed.
	$use_global_query = ( isset( $block->context['query']['inherit'] ) && $block->context['query']['inherit'] );
	if ( $use_global_query ) {
		global $wp_query;
		$query = clone $wp_query;
	} else {
		$query_args = build_query_vars_from_query_block( $block, $page );
		$query      = new WP_Query( $query_args );
	}

>>>>>>> 74fb2cee (update)
	if ( ! $query->have_posts() ) {
		return '';
	}

	if ( block_core_post_template_uses_featured_image( $block->inner_blocks ) ) {
		update_post_thumbnail_cache( $query );
	}

	$classnames = '';
	if ( isset( $block->context['displayLayout'] ) && isset( $block->context['query'] ) ) {
		if ( isset( $block->context['displayLayout']['type'] ) && 'flex' === $block->context['displayLayout']['type'] ) {
			$classnames = "is-flex-container columns-{$block->context['displayLayout']['columns']}";
		}
	}

	$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $classnames ) );

	$content = '';
	while ( $query->have_posts() ) {
		$query->the_post();
<<<<<<< HEAD
		$block_content = (
			new WP_Block(
				$block->parsed_block,
=======

		// Get an instance of the current Post Template block.
		$block_instance = $block->parsed_block;

		// Set the block name to one that does not correspond to an existing registered block.
		// This ensures that for the inner instances of the Post Template block, we do not render any block supports.
		$block_instance['blockName'] = 'core/null';

		// Render the inner blocks of the Post Template block with `dynamic` set to `false` to prevent calling
		// `render_callback` and ensure that no wrapper markup is included.
		$block_content = (
			new WP_Block(
				$block_instance,
>>>>>>> 74fb2cee (update)
				array(
					'postType' => get_post_type(),
					'postId'   => get_the_ID(),
				)
			)
		)->render( array( 'dynamic' => false ) );
<<<<<<< HEAD
		$post_classes  = implode( ' ', get_post_class( 'wp-block-post' ) );
		$content      .= '<li class="' . esc_attr( $post_classes ) . '">' . $block_content . '</li>';
	}

=======

		// Wrap the render inner blocks in a `li` element with the appropriate post classes.
		$post_classes = implode( ' ', get_post_class( 'wp-block-post' ) );
		$content     .= '<li class="' . esc_attr( $post_classes ) . '">' . $block_content . '</li>';
	}

	/*
	 * Use this function to restore the context of the template tags
	 * from a secondary query loop back to the main query loop.
	 * Since we use two custom loops, it's safest to always restore.
	*/
>>>>>>> 74fb2cee (update)
	wp_reset_postdata();

	return sprintf(
		'<ul %1$s>%2$s</ul>',
		$wrapper_attributes,
		$content
	);
}

/**
 * Registers the `core/post-template` block on the server.
 */
function register_block_core_post_template() {
	register_block_type_from_metadata(
		__DIR__ . '/post-template',
		array(
			'render_callback'   => 'render_block_core_post_template',
			'skip_inner_blocks' => true,
		)
	);
}
add_action( 'init', 'register_block_core_post_template' );