<?php
/**
 * Template Name: Projects
 */
get_header(); ?>

    <div class="container">

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
            <div class="row-padding">

                <div class="title-text"><strong>Projektbeispiele</strong></div>
                <div class="projects-list">
					<?php

					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					query_posts( array( 'post_type' => 'projects', 'posts_per_page' => 2, 'paged' => $paged ) );

					if ( have_posts() ) {
					while ( have_posts() ) {
					the_post();

					$projektbeschreibung = rwmb_meta( 'content01' );
					$aufgabe            = rwmb_meta( 'aufgabe' );
					$projektzeitraum     = rwmb_meta( 'projektzeitraum' );
					$tätigkeiten         = rwmb_meta( 'tätigkeiten' );
					$anwendung           = rwmb_meta( 'anwendung' );

					?>
                    <div class="item">
                        <h6 class="title"><?php the_title(); ?></h6>
                        <div class="post-content">
                            <div class="item-row">
                                <div class="item-label">
                                    Projektbeschreibung:
                                </div>
                                <div class="item-text">
									<?php echo $projektbeschreibung; ?>
									<?php //var_dump( $projektbeschreibung ); ?>
                                </div>
                            </div>
                            <div class="item-row">
                                <div class="item-label">
                                    Aufgabe:
                                </div>
                                <div class="item-text">
									<?php echo $aufgabe; ?>
                                </div>
                            </div>
                            <div class="item-row">
                                <div class="item-label">
                                    Projektzeitraum:
                                </div>
                                <div class="item-text">
									<?php echo $projektzeitraum; ?>
                                </div>
                            </div>
                            <div class="item-row">
                                <div class="item-label">
                                    Tätigkeiten:
                                </div>
                                <div class="item-text">
									<?php echo $tätigkeiten; ?>
                                </div>
                            </div>
                            <div class="item-row">
                                <div class="item-label">
                                    Anwendung von:
                                </div>
                                <div class="item-text">
									<?php echo $anwendung; ?>
                                </div>
                            </div>
                        </div>
                    </div>

				<?php }
				} ?>
            </div>
			<?php get_template_part( 'includes/post-formats/post-nav' ); ?>
            </div>
        </main>

    </div>
<?php get_footer(); ?>