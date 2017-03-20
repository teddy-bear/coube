<?php
/**
 * The template for displaying posts from a category.
 */
?>
<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-8">
        <main class="main-column">

          <section class="page-description category-info">
            <!--<h2><?php /*echo single_cat_title(); */?></h2>-->
          </section>

          <div class="posts-list">
            <?php

            if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-title">
                  <h3><?php the_title(); ?></h3>

                  <div class="custom-info">
                    <?php get_template_part( 'includes/post-formats/post-meta' ); ?>
                    <?php //get_template_part( 'template-parts/share-networks' ); ?>
                  </div>
                </header>
                <section class="entry-content">
                  <?php if ( has_post_thumbnail() ) {
                    // Resize featured image.
                    $thumb   = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb, 'full' );
                    $image   = aq_resize( $img_url, 430, 230, TRUE, TRUE, TRUE );
                    ?>
                    <figure class="featured-thumbnail">
                      <img src="<?php echo $image ?>" alt="<?php the_title(); ?>"/>
                    </figure>
                  <?php } ?>

                  <div class="post-content">
                    <?php
                    $content = get_the_content();
                    $excerpt = get_the_excerpt();
                    if ( has_excerpt() ) {
                      echo trim_string_length( $excerpt, 70 );
                    } else {
                      if ( ! is_search() ) {
                        echo trim_string_length( $content, 70 );
                      } else {
                        echo trim_string_length( $excerpt, 70 );
                      }
                    }
                    ?>
                  </div>
                  <a href="<?php the_permalink() ?>" class="more">
                    <?php _e( 'more' ); ?>
                  </a>

                </section>

              </article>

              <?php

            endwhile;
            else:

              ?>

              <div class="no-results">
                <?php echo '<p><strong>' . __( 'There has been an error.', 'theme' ) . '</strong></p>'; ?>
                <p><?php _e( 'We apologize for any inconvenience, please', 'theme' ); ?> <a
                    href="<?php echo esc_url( home_url() ); ?>/"
                    title="<?php bloginfo( 'description' ); ?>"><?php _e( 'return to the home page', 'theme' ); ?></a> <?php _e( 'or use the search form below.', 'theme' ); ?>
                </p>
                <?php
                /* outputs the default search form */
                get_search_form();
                ?>
              </div>

            <?php endif; ?>

          </div>
        </main>

        <?php get_template_part( 'includes/post-formats/post-nav' ); ?>

      </div>

      <div class="sidebar sidebar-default col-sm-12 col-md-4">
        <?php dynamic_sidebar( 'sidebar' ); ?>
      </div>

    </div>
  </div>

<?php get_footer(); ?>