<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

</div><!-- .site-content -->

<?php if ( ! is_front_page() ) { ?><?php } ?>

</div><!-- #content -->
<footer class="site-footer">

    <div class="row-footer-blocks">
        <div class="footer-blocks">
            <div class="container">
                <div class="row">
					<?php //if ( ! dynamic_sidebar( 'Footer blocks' ) ) : endif; ?>
					<?php get_template_part( 'template-parts/site-logo-secondary' ); ?>

                    <div class="contact-details">
                        <p><?php echo do_shortcode( '[phone-number ]' ); ?></p>
                        <p><?php echo do_shortcode( '[email]' ); ?></p>
						<?php echo show_text_block( 'social-links' ); ?>
                    </div>

                    <!--<div class="col-sm-3 block-logo-text">
		                <?php /*echo show_text_block( 'footer-logo-text' ); */ ?>
                    </div>

                    <div class="col-sm-3 block-address">
		                <?php /*echo show_text_block( 'footer-logo-text' ); */ ?>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <div class="row-copyright">
        <div class="container">
            <div class="copyright">
				<?php echo get_theme_mod( 'copyright' ); ?>
            </div>
            <div class="footer-menu">
                <nav>
					<?php wp_nav_menu( array(
						'container' => 'ul',
						'menu'      => 'Footer',
					) );
					?>
                </nav>
            </div>
        </div>
    </div>

</footer><!-- .site-footer -->

<span id="back_to_top"><i class="fa fa-arrow-up"></i></span>

</div><!-- .site-all -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
