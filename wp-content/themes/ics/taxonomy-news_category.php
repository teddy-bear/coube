<?php
/**
 * The template for displaying news category items.
 */

get_header(); ?>

<div class="container">
    <main class="main-column">
        <div class="row-padding">
			<?php
			if ( have_posts() ) { ?>
                <span class="title-text"><strong><?php echo get_queried_object()->name; ?></strong></span>
                <div class="news-blocks row">
					<?php
					while ( have_posts() ) {
						the_post();

						$priority = rwmb_meta( 'priority' );

						// Resize featured image.
						$thumb_width    = 268;
						$thumb_height   = 75;
						$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						$url            = $attachment_url['0'];
						$image          = aq_resize( $url, $thumb_width, $thumb_height, true, true, true );

						// Get Category.
						//$category = wp_get_post_terms( $post->ID, 'service_category' );
						//$terms    = get_the_terms( get_the_ID(), 'service_category' );

						// Add image size.
						//add_image_size( 'project-image', 298, 224, TRUE );
						?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'item col-sm-4' ); ?>>

                            <div class="inner">
                                <div class="meta">
                                <span class="date">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
	                                <?php echo get_the_time( 'd.M.Y' ); ?>
                                </span>
									<?php
									// Category taxonomy.
									$terms = wp_get_post_terms( $post->ID, 'news_category' );
									if ( $terms ) { ?>
                                        <span class="categories"><i class="fa fa-file-text-o" aria-hidden="true"></i>
											<?php
											$i           = 0;
											$terms_count = count( $terms );
											foreach ( $terms as $term ) {
												$i ++;
												echo $term->name;
												if ( $i < $terms_count ) {
													echo ', ';
												}
											} ?>
										</span>
									<?php } ?>
                                </div>
                                <div class="title priority-<?php echo $priority; ?>">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
									<?php the_title(); ?>
                                </div>
								<?php if ( $image ) { ?>
                                    <figure class="featured-thumbnail">
                                        <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/>
                                    </figure>
								<?php } ?>
                                <div class="wrapper">
                                    <div class="post-content">
										<?php the_excerpt(); ?>
                                    </div>
                                    <div class="read-more-wrapper">
                                        <a href="<?php the_permalink(); ?>" class="btn"
                                           title="<?php the_title(); ?>"><?php _e( 'Lesen
                                        Sie mehr' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </article>
					<?php } ?>
                </div>
			<?php } ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
