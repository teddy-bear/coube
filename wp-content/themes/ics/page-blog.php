<?php
/**
 * Template Name: Blog
 */
get_header(); ?>

    <div class="container">
        <div class="row">

            <div class="col-md-9">
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
                    <div class="posts-list">
						<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						query_posts( array( 'post_type' => 'post', 'posts_per_page' => 2, 'paged' => $paged ) );
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
							} ?>
						<?php } ?>
                    </div>
					<?php get_template_part( 'includes/post-formats/post-nav' ); ?>
                </main>
            </div>

            <div class="sidebar sidebar-blog col-md-3">
				<?php dynamic_sidebar( 'sidebar-blog' ); ?>
            </div>

        </div>
    </div>
<?php get_footer(); ?>