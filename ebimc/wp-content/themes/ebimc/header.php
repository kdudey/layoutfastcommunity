<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package schneider
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'schneider' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header fixed-top" role="banner">
        <nav class="navbar justify-content-between navbar-dark p-0">
            <a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/ebimc/wp-content/themes/ebimc/assets/ebimc.png" class="d-inline-block align-top" alt="">
            </a>
            <ul class="navbar-nav" style="flex-direction:row;">
                <li class="nav-item"><a href="#" class="nav-link"><img src="http://layoutfastweb-env.jyzcfuubg7.us-west-2.elasticbeanstalk.com//images/User-yellow-icon.png" width="42" height="42" style="background-color:#000;border:solid 1px #fff;"></a></li>
            </ul>
        </nav>
	</header><!-- #masthead -->
    <?php// if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <?php /*
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'EBIMC';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','schneider');
                    }
                    ?>
                </p>
                <div class="buttons">
                    <a href="http://www.bim-schneider-electric.com/layoutfastdownload/Schneider.LayoutFAST.Setup_x64.msi" class="btn btn-primary" target="_blank">Download now for free</a>
                    <a href="https://youtu.be/knZVLwENfbA" class="btn btn-primary" target="_blank">Watch the video</a>
                </div>
                */ ?>
                <div class="header-spacer">&nbsp;</div>
                <a href="#content-anchor" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php// endif; ?>
    <a id="content-anchor"></a>
	<div id="content" class="site-content">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => '',
                    'container_id'    => '',
                    'container_class' => '',
                    'menu'            => 'a',
                    'menu_id'         => false,
                    'menu_class'      => 'nav nav-pills primary-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>
                </div>
            </div>
			<div class="row">
                <?php endif; ?>
