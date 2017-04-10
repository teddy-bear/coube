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

    <link rel="shortcut icon" href="<?php echo favicon_path; ?>favicon.ico">

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
                    <div class="contact-details">
						<?php echo do_shortcode( '[phone-number ]' ); ?>
						<?php echo do_shortcode( '[email]' ); ?>
                    </div>
					<?php echo show_text_block( 'social-links' ); ?>
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
            <div class="site-content">
