<?php
/**
 * Single news item.
 */
?>
<?php get_header(); ?>
<div class="container">

    <main class="main-column">

        <div class="row-padding">

			<?php
			while ( have_posts() ) {
				the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-title">
                        <h2><?php the_title(); ?></h2>
                        <div class="meta">
							<?php echo '<span class="months">' . get_the_time( 'M' ) . '</span> <span class="day">' . get_the_time( 'd' ) . '</span>, <span class="year">' . get_the_time( 'Y' ) . '</span>'; ?>
                        </div>
                    </header>
                    <section class="entry-content">
                        <!--<figure class="featured-thumbnail">
							<?php /*the_post_thumbnail(); */?>
                        </figure>-->
                        <div class="content">
							<?php the_content(); ?>
                        </div>
                    </section>
                </article>

			<?php } ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
