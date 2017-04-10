<?php
/**
 * Template Name: Services
 */
get_header(); ?>


<main class="main-column">
	<?php
	// Get page content
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
		}
		the_content();
	}
	?>

	<?php
	$args = array(
		'post_type'      => 'services',
		'posts_per_page' => - 1
	);
	?>
	<?php $the_query = new WP_Query( $args ); ?>
	<?php if ( $the_query->have_posts() ) { ?>

    <div class="services-list">
        <div class="container">
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$url            = $attachment_url['0'];

				?>
                <div class="item" id="<?php echo $post->post_name; ?>">
                    <figure class="featured-thumbnail"
                            style="background: url(<?php echo $url; ?>) no-repeat 50% 50%;"></figure>
                    <span class="title-text"><strong><?php the_title(); ?></strong></span>
                    <div class="post-content">
                        <div class="excerpt">
							<?php the_excerpt(); ?>
                        </div>
                        <div class="content">
							<?php the_content(); ?>
                        </div>
                    </div>
                </div>
			<?php }
			} ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

