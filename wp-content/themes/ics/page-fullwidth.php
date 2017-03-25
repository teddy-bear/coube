<?php
/**
 * Template Name: Fullwidth
 */

get_header(); ?>

    <main class="main-column">
		<?php
		// Show default page content.
		while ( have_posts() ) {
			the_post();
			the_content();
		}
		?>
    </main>

<?php get_footer(); ?>