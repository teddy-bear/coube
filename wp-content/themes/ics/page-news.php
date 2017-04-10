<?php
/**
 * Template Name: News
 */
get_header(); ?>


<main class="main-column">

    <div class="row-padding">

        <div class="container">

            <span class="title-text">Aktuelle <strong>Themen</strong></span>

			<?php
			// Categories filtering.
			$taxonomy = 'news_category';
			$terms    = get_terms( $taxonomy );

			if ( $terms && ! is_wp_error( $terms ) ) {
				?>
                <ul class="news-categories-filter">
					<?php foreach ( $terms as $term ) { ?>
                        <li>
                            <a href="<?php echo get_term_link( $term->slug, 'news_category' ); ?>"><?php echo $term->name; ?></a>
                        </li>
					<?php } ?>
                </ul>
			<?php } ?>

			<?php
			// Get page content
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
				}
				the_content();
			}
			?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

