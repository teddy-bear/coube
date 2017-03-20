<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<?php $detect = new Mobile_Detect; ?>

<body <?php body_class(); ?>>

<?php if ( ! is_admin_bar_showing() ) { ?>
    <div class="site-preloader"></div>
<?php } ?>

<div class="site">

    <div class="site-all">

        <header class="site-header">
            <div class="row-top">
                <div class="container">
					<?php get_template_part( 'template-parts/site-logo' ); ?>
                    <!--Primary menu-->
                    <div class="header-menu">
                        <nav id="menu_mobile" class="nav-primary">
							<?php wp_nav_menu( array(
								'container'   => 'ul',
								'menu_class'  => 'main-menu clearfix',
								'menu_id'     => 'primary',
								'menu'        => 'Primary',
								'link_before' => '<span>',
								'link_after'  => '</span>'
							) );
							?>
                        </nav>
                    </div>

                </div>
            </div>
        </header>

        <div id="content">
			<?php
			if ( ! is_front_page() ) {

				// Background image + slogan for the rest of the pages.

				// Get Meta box image value.
				$images = rwmb_meta( 'header-background', 'type=image' );
				if ( $detect->isMobile() && ! $detect->isTablet() ) {
					$images = false;
				}
				// Documentation https://metabox.io/docs/get-meta-value/#section-examples
				if ( $images ) {
					foreach ( $images as $image ) {
						// Resize featured image.
						//print_r( $image );
						$image_resized_src = aq_resize( $image['full_url'], 810, 273, true, true, true );
						//echo "<img src='$image_resized_src' alt='{$image['alt']}' />";
					}
				}
				?>
                <div class="page-title-row <?php if ( ! $images ) {
					echo 'no-image';
				} ?>">
                    <div class="image-background" <?php if ( $images ) {
						echo 'style="background-image:url(' . $image_resized_src . ');"';
					} ?>>
                    </div>
					<?php get_template_part( 'template-parts/page-title' ); ?>
                </div>
			<?php } else { ?>
                <div class="wrapper row-slider">
					<?php echo do_shortcode( '[slider]' ); ?>
                </div>
			<?php } ?>
            <div class="site-content">
