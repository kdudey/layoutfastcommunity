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
        <div class="topbar">
            <ul>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/flag-usa.png" alt="Language" style="padding-right:8px;"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-datasheet.png" onMouseOver="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-datasheet-hover.png'" onMouseOut="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-datasheet.png'" alt="Datasheet"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-layoutfast.png" onMouseOver="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-layoutfast-hover.png'" onMouseOut="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-layoutfast.png'" alt="layoutFAST"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-engineering.png" onMouseOver="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-engineering-hover.png'" onMouseOut="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-engineering.png'" alt="Engineering"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-community.png" onMouseOver="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-community-hover.png'" onMouseOut="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-community.png'" alt="Community"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-mylinks.png" onMouseOver="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-mylinks-hover.png'" onMouseOut="this.src='http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-mylinks.png'" alt="My Links"></a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/nav-avatar.png" alt="User Profile" style="padding-left:8px;"> Register/Login</a></li>
                <li><a href="#"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/icon-settings.png" alt="Settings"></a></li>
            </ul>
        </div>

        <nav class="navbar justify-content-between navbar-dark p-0">
            <a class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/layoutfast.png" width="41" height="42" class="d-inline-block align-top" alt="">
                <span class="seThick">layout</span><span class="seThin">FAST</span>
            </a>

            <div>
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
            <div class="navbar-nav" style="flex-direction:row;">
                <img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/brand-lifeison.png">
                <a href="#" onclick="showNavSearch();"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/icon-search.png" style="margin:17px 20px;width:30px;height:30px;"></a>
                
                <form id="navSearch-form">
                <div id="navSearch">
                    <div class="input-group" role="group">
                        <input type="text" id="navsearch-text" placeholder="Search for Part Number">
                        <div class="input-group-append">
                            <button type="reset"><img src="http://ec2-54-201-157-102.us-west-2.compute.amazonaws.com/layoutfast/wp-content/themes/schneider/assets/icon-cancel.png"></button>
                        </div>
                    </div>
                    <a href="#" class="navsearch-close" alt="Close" onclick="hideNavSearch();">X</a>
                </div>
                </form>

            </div>
        </nav>
	</header><!-- #masthead -->
    <?php// if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'Wordpress + Bootstrap';
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
                    'theme_location'    => 'secondary',
                    'container'       => '',
                    'container_id'    => '',
                    'container_class' => '',
                    'menu'            => 'a',
                    'menu_id'         => false,
                    'menu_class'      => 'nav nav-pills secondary-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>
                </div>
            </div>
			<div class="row">
                <?php endif; ?>
