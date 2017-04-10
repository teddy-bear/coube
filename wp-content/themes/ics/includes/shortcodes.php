<?php

/**
 * Layout controls & grid markup based on Bootstrap version 3.* framework.
 */

// Container
function container_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="container ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .container (end) -->';

	return $output;
}

add_shortcode( 'container', 'container_shortcode' );

// Row
function row_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="row ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .row (end) -->';

	return $output;
}

add_shortcode( 'row', 'row_shortcode' );

// Row inner
function row_inner_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="row ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .row inner (end) -->';

	return $output;
}

add_shortcode( 'row_inner', 'row_inner_shortcode' );

/**
 * Columns: add bootstrap classes to make grid layout.
 * Eg.: [column class="col-sm-6"]
 */
function column_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	$return = '<div class="' . $class . '">';
	$return .= do_shortcode( $content );
	$return .= '</div><!-- column (end) -->';

	return $return;
}

add_shortcode( 'column', 'column_shortcode' );

// Column inner
function column_inner_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	$return = '<div class="' . $class . '">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}

add_shortcode( 'column_inner', 'column_inner_shortcode' );

// Wrapper
function wrapper_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="wrapper ' . $class . '">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .wrapper (end) -->';

	return $output;
}

add_shortcode( 'wrapper', 'wrapper_shortcode' );

// Universal block wrapper for styling purposes.
function block_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => '',
		'id'    => '',
		'link'  => ''
	), $atts ) );

	$block_id = '';

	if ( $id ) {
		$block_id = 'id="' . $id . '"';
	}

	if ( $link != '' ) {
		$output = ' < div class="block ' . $class . '" > ';
		$output .= '<a href = "' . $link . '" > ';
		$output .= do_shortcode( $content );
		$output .= '</a > ';
		$output .= '</div > ';
	} else {
		// add divs to the content
		$output = '<div class="block ' . $class . '" ' . $block_id . '> ';
		$output .= do_shortcode( $content );
		$output .= '</div > ';
	}

	return $output;
}

add_shortcode( 'block', 'block_shortcode' );

// Universal block for text wrapping and easier styling.
function text_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = ' < div class="text ' . $class . '" > ';
	$output .= do_shortcode( $content );
	$output .= '</div > ';

	return $output;
}

add_shortcode( 'text', 'text_shortcode' );

// Button.
function button_shortcode( $atts, $content = null ) {
	extract( shortcode_atts(
		array(
			'link'   => '#',
			'text'   => 'Button Text',
			'style'  => '',
			'target' => '_self',
			'class'  => '',
			'icon'   => 'no',
			'align'  => ""
		), $atts ) );

	if ( $align == 'aligncenter' ) {
		$output = '<div class="btn-center">';
	}

	$output .= '<a href="' . $link . '" title="' . $text . '" class="' . $style . ' ' . $class . ' ' . $align . '" target="' . $target . '">';
	if ( $icon != 'no' ) {
		$output .= '<i class="fa ' . $icon . '"></i>';
	}
	$output .= '<span>' . $text . '</span>';
	$output .= '</a>';

	if ( $align == 'aligncenter' ) {
		$output .= '</div>';
	}

	return $output;
}

add_shortcode( 'button', 'button_shortcode' );

// Clear
function clear_shortcode( $atts, $content = null ) {

	$output = '<div class="clear"></div>';

	return $output;
}

add_shortcode( 'clear', 'clear_shortcode' );

// Spacer
function spacer_shortcode( $atts, $content = null ) {

	$output = '<div class="spacer"></div>';

	return $output;
}

add_shortcode( 'spacer', 'spacer_shortcode' );

// Separator
function separator_shortcode( $atts, $content = null ) {

	$output = '<div class="separator"></div>';

	return $output;
}

add_shortcode( 'separator', 'separator_shortcode' );


/**
 * Content adding section
 */
// Content (list of recent posts by default)
// todo: make shortcode more flexible and universal.
function shortcode_content( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'post_type'        => 'post',
		'category'         => '',
		'custom_category'  => '',
		'layout'           => 'primary',
		'num'              => '-1',
		'meta'             => 'false',
		'thumb'            => 'false',
		'thumb_width'      => '120',
		'thumb_height'     => '120',
		'more_text_single' => '',
		'show_content'     => 'yes',
		'title_tag'        => 'h3',
		'excerpt_count'    => '0',
		'content_count'    => '0',
		'wrapper_tag'      => 'div',
		'class'            => '',
		'id'               => '',
		'class_item'       => '',
		'exclude'          => '',
		'orderby'          => ''
	), $atts ) );

	if ( $wrapper_tag == 'div' ) {
		$item_tag = $wrapper_tag;
	} else {
		$item_tag = 'li';
	}

	if ( ! empty( $id ) ) {
		$id = 'id="' . $id . '"';
	}

	$output = '<' . $wrapper_tag . ' class="recent-posts ' . $class . '" ' . $id . '>';
	// Split items into columns.
	/*if ( $layout == 'secondary' ) {
	  $output .= '<div class="column ' . $class_item . '">';
	}*/

	global $post;

	$args = array(
		'post_type'              => $post_type,
		'category_name'          => $category,
		$post_type . '_category' => $custom_category,
		'numberposts'            => $num,
		'orderby'                => $orderby,
		'order'                  => 'DESC',
		'exclude'                => $exclude
	);

	$latest = get_posts( $args );

	$i = 0;
	foreach ( $latest as $post ) {
		$i ++;

		setup_postdata( $post );
		$excerpt        = get_the_excerpt( $post->ID );
		$content        = get_the_content( $post->ID );
		$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$url            = $attachment_url['0'];
		$image          = aq_resize( $url, $thumb_width, $thumb_height, true, true, true );


		$post_classes = get_post_class();

		foreach ( $post_classes as $key => $value ) {
			$pos = strripos( $value, 'tag-' );
			if ( $pos !== false ) {
				unset( $post_classes[ $i ] );
			}
		}
		$post_classes = implode( ' ', $post_classes );

		// Major layouts.
		switch ( $layout ) {
			// Default layout.
			case 'primary':
				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '">';

				//$output .= '<a href="' . get_permalink($post->ID) . '" title="' . get_the_title($post->ID) . '">';

				$output .= '<div class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</div>';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}

				$output .= '<div class="wrap-info">';

				if ( $meta == 'true' ) {
					$output .= '<span class="meta">';
					$output .= '<span class="day">' . get_the_time( 'd' ) . '/</span><span class="months">' . get_the_time( 'm' ) . '/</span><span class="year">' . get_the_time( 'Y' ) . '</span>';
					$output .= '</span>';
				}

				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">';
						$output .= trim_string_length( $content, $content_count );
						$output .= '</div>';
					}
					$output .= '</div>';
				}

				if ( $more_text_single != "" ) {
					$output .= '<a href="' . get_permalink( $post->ID ) . '" class="more" title="' . get_the_title( $post->ID ) . '">';
					$output .= $more_text_single;
					$output .= '</a>';
				}

				$output .= '</div>'; // .wrap-info close.

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Services layout.
			case 'services':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' match ' . $class_item . ' item item-' . $i . '">';

				$output .= '<div class="inner">';

				$output .= '<a href="' . home_url( '/dienstleistungen#' ) . $post->post_name . '" title="' . get_the_title( $post->ID ) . '">';

				if ( has_post_thumbnail( $post->ID ) ) {
					$output .= '<figure class="featured-thumbnail" style="background: url(' . $url . ') no-repeat 50% 50%;">';
					//$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
					$output .= '</figure>';
				}

				// Title.
				$output .= '<div class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</div>';

				// Content.
				if ( ! empty( $excerpt ) ) {

					$output .= '<div class="post-content">';
					$output .= '<div class="excerpt">';
					$output .= $excerpt;
					$output .= '</div>';
					$output .= '</div>';
				}

				$output .= '</a>';
				$output .= '</div>'; //.inner

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Posts layout.
			case 'posts':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}

				// Title.
				$output .= '<div class="title">';
				$output .= '<a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
				$output .= get_the_title( $post->ID );
				$output .= '</a></div>';

				if ( $meta == 'true' ) {
					$output .= '<span class="meta">';
					//$output .= '<span class="day">' . get_the_time( 'd' ) . '/</span><span class="months">' . get_the_time( 'm' ) . '/</span><span class="year">' . get_the_time( 'Y' ) . '</span>';
					$output .= '<time>' . get_the_time( 'D, m M Y H:i:s' ) . '</time>';
					$output .= '</span>';
				}


				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">';
						$output .= trim_string_length( $content, $content_count );
						$output .= '</div>';
					}
					$output .= '</div>';
				}


				// Read more link.
				if ( $more_text_single != "" ) {
					$output .= '<a href="' . get_permalink( $post->ID ) . '" class="more" title="' . get_the_title( $post->ID ) . '">';
					$output .= $more_text_single;
					$output .= '</a>';
				}

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// News layout.
			case 'news':
				$priority = rwmb_meta( 'priority' );
				$output   .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				$output .= '<div class="inner">';
				//$output .= '<' . $title_tag . '><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">' . get_the_title( $post->ID ) . '</a></' . $title_tag . '>';

				// Meta.
				$output .= '<div class="meta">';

				// Date.
				if ( $meta == 'true' ) {
					$output .= '<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>';
					$output .= get_the_time( 'd.M.Y' );
					$output .= '</span>';
				}

				// Category taxonomy.
				$terms = wp_get_post_terms( $post->ID, 'news_category' );
				if ( $terms ) {
					$output      .= '<span class="categories"><i class="fa fa-file-text-o" aria-hidden="true"></i>';
					$i           = 0;
					$terms_count = count( $terms );
					foreach ( $terms as $term ) {
						$i ++;
						$output .= $term->name;
						if ( $i < $terms_count ) {
							$output .= ', ';
						}
					}
					$output .= '</span>';
				}

				$output .= '</div>'; //.meta

				// Title.
				$output .= '<div class="title priority-' . $priority . '"><i class="fa fa-info-circle" aria-hidden="true"></i>' . get_the_title( $post->ID ) . '</div>';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}
				$output .= '<div class="wrapper">';

				// Content.
				$output .= '<div class="post-content">';
				$output .= $excerpt;
				$output .= '</div>';

				// Read more link.
				if ( $more_text_single != "" ) {
					$output .= '<div class="read-more-wrapper">';
					$output .= '<a href="' . get_permalink( $post->ID ) . '" class="btn" title="' . get_the_title( $post->ID ) . '">';
					$output .= $more_text_single;
					$output .= '</a>';
					$output .= '</div>';
				}

				$output .= '</div>'; //.wrapper
				$output .= '</div>'; //.inner

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Gallery.
			case
			'gallery':

				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';

				$output .= '<a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
				$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
				// Title.
				$output .= '<span class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</span>';
				$output .= '</a>';

				$output .= '</div></' . $item_tag . '><!-- .entry (end) -->';

				break;

			// Plans.
			case
			'plans':

				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';

				$output .= '<span class="title-text"><strong>' . get_the_title( $post->ID ) . '</strong></span>';

				// Content.
				$output .= '<div class="content">';
				$output .= apply_filters( 'the_content', $content );
				$output .= '</div>';

				$output .= '</div></' . $item_tag . '><!-- .entry (end) -->';

				break;

			// Logo layout.
			case 'logo':

				$output .= '<' . $item_tag . ' class="item item-' . $i . ' ' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}


				// Title.
				$output .= '<div class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</div>';

				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">"';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '"</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">"';
						$output .= trim_string_length( $content, $content_count );
						$output .= '"</div>';
					}
					$output .= '</div>';
				}

				// Read more link.
				if ( $more_text_single != "" ) {
					$output .= '<span class="read-more-wrapper">[';
					$output .= '<a href="' . get_permalink( $post->ID ) . '" class="read-more" title="' . get_the_title( $post->ID ) . '">';
					$output .= $more_text_single;
					$output .= '</a>]</span>';
				}


				$output .= '</div></' . $item_tag . '><!-- .entry (end) -->';

				break;

			// Video layout.
			case 'video':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				// Featured image.
				if ( has_post_thumbnail( $post->ID ) ) {
					$output .= '<figure class="featured-thumbnail">';
					$output .= '<a href="' . rwmb_meta( "oembed" ) . '">';
					$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
					$output .= '</a>';
					$output .= '</figure>';
				}

				// Info wrapper.
				$output .= '<div class="wrap-info">';

				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">"';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '"</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">"';
						$output .= trim_string_length( $content, $content_count );
						$output .= '"</div>';
					}
					$output .= '</div>';
				}

				// Title.
				$output .= '<strong class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</strong>';

				// wrap-info end.
				$output .= '</div>';

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Team layout.
			case 'team':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}


				// Info wrapper.
				$output .= '<div class="wrap-info">';

				// Title.
				$output .= '<h3 class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</h3>';

				// Position.
				$output .= '<div class="position">';
				$output .= rwmb_meta( 'position' );
				$output .= '</div>';

				// Content.

				$output .= '<div class="post-content">';

				$output .= '<div class="content">';
				$output .= get_the_content();
				$output .= '</div>';

				$output .= '</div>';

				// wrap-info end.
				$output .= '</div>';

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;

			// Testimonials layout.
			case 'testimonials':
				$output .= '<' . $item_tag . ' class="' . $post_classes . ' ' . $class_item . ' item item-' . $i . '">';

				if ( $thumb == 'true' ) {

					if ( has_post_thumbnail( $post->ID ) ) {
						$output .= '<figure class="featured-thumbnail">';
						if ( $image ) {
							$output .= '<img  src="' . $image . '" alt="' . get_the_title( $post->ID ) . '"/>';
						} else {
							$output .= '<img  src="' . $url . '" alt="' . get_the_title( $post->ID ) . '"/>';
						}
						$output .= '</figure>';
					}
				}


				// Info wrapper.
				$output .= '<div class="wrap-info">';

				// Title.
				/*$output .= '<h4 class="title">';
				$output .= get_the_title( $post->ID );
				$output .= '</h4>';*/

				// Content.
				if ( $excerpt_count >= 1 || $content_count >= 1 ) {

					$output .= '<div class="post-content">';
					if ( $excerpt_count >= 1 ) {

						$output .= '<div class="excerpt">';
						$output .= trim_string_length( $excerpt, $excerpt_count );
						$output .= '"</div>';
					}
					if ( $content_count >= 1 ) {
						$output .= '<div class="content">';
						$output .= trim_string_length( $content, $content_count );
						$output .= '</div>';
					}
					$output .= '</div>';
				}

				//$name     = rwmb_meta( 'name' );
				$location = rwmb_meta( 'location' );
				$service  = rwmb_meta( 'service' );
				$output   .= '<div class="custom-fields">';
				$output   .= '<span class="name">' . get_the_title( $post->ID ) . '</span>';
				if ( $location ) {
					$output .= ', <span class="location">' . rwmb_meta( 'location' ) . '</span>';
				}
				if ( $service ) {
					$output .= ', <span class="service">' . rwmb_meta( 'service' ) . '</span>';
				}
				$output .= '</div>';

				// wrap-info end.
				$output .= '</div>';

				$output .= '</' . $item_tag . '><!-- .entry (end) -->';
				break;
		}

	}

	$output .= '</' . $wrapper_tag . '><!-- .recent-posts (end) -->';
	//the_posts_pagination();
	wp_reset_postdata();

	return $output;

}

add_shortcode( 'content', 'shortcode_content' );

// Output vacancy -> offices taxonomy navigation tree.
function offices_shortcode() {
	ob_start();
	get_template_part( 'template-parts/offices-tree' );

	return ob_get_clean();
}

add_shortcode( 'offices', 'offices_shortcode' );

// Phone.
function phone_shortcode() {
	ob_start();
	//$phone = get_theme_mod( 'phone' );
	echo '<a class="phone-number" href="tel:' . phone . '">' . phone . '</a>';

	return ob_get_clean();
}

add_shortcode( 'phone-number', 'phone_shortcode' );

// Phone secondary.
function phone_secondary_shortcode() {
	ob_start();
	echo '<a class="phone-number secondary" href="tel:' . phone_secondary . '">' . phone_secondary . '</a>';

	return ob_get_clean();
}

add_shortcode( 'phone-number-alt', 'phone_secondary_contshortcode' );

// Fax.
function fax_shortcode() {
	ob_start();
	echo '<a class="fax" href="tel:' . fax . '">' . fax . '</a>';

	return ob_get_clean();
}

add_shortcode( 'fax', 'fax_shortcode' );

// Email.
function email_shortcode() {
	ob_start();
	echo '<a class="email" href="mailto:' . email . '">' . email . '</a>';

	return ob_get_clean();
}

add_shortcode( 'email', 'email_shortcode' );

// Address.
function address_shortcode() {
	ob_start();
	echo '<span class="address">' . address . '</span>';

	return ob_get_clean();
}

add_shortcode( 'address', 'address_shortcode' );

// Tab title
function tab_title_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="tab-link">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .container (end) -->';

	return $output;
}

add_shortcode( 'tab_title', 'tab_title_shortcode' );

// Tab content.
function tab_content_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	// add divs to the content
	$output = '<div class="tab-content">';
	$output .= do_shortcode( $content );
	$output .= '</div> <!-- .container (end) -->';

	return $output;
}

add_shortcode( 'tab_content', 'tab_content_shortcode' );