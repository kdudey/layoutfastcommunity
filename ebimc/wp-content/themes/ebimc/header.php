<?php
/**
* This is the template that displays all of the <head> section and everything up until <div id="content">
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package schneider
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<header id="page-header" class="fixed-top" role="banner">
        <div class="topbar">
            <ul>
                <li><a href="#"><img src="/layoutfast/wp-content/themes/schneider/assets/images/flag-usa.png" alt="Language" style="padding-right:8px;"></a></li>
                <li><a href="#"><img src="/layoutfast/wp-content/themes/schneider/assets/images/nav-layoutfast.png" onMouseOver="this.src='/layoutfast/wp-content/themes/schneider/assets/images/nav-layoutfast-hover.png'" onMouseOut="this.src='/layoutfast/wp-content/themes/schneider/assets/images/nav-layoutfast.png'" alt="layoutFAST"></a></li>
                <li><a href="#"><img src="/layoutfast/wp-content/themes/schneider/assets/images/nav-avatar.png" alt="User Profile" style="padding-left:8px;"> Register/Login</a></li>
                <li><a href="#"><img src="/layoutfast/wp-content/themes/schneider/assets/images/icon-settings.png" alt="Settings"></a></li>
            </ul>
        </div>

        <nav class="navbar justify-content-between">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="/ebimc/wp-content/themes/ebimc/assets/images/ebimc.png" width="134" height="54" class="d-inline-block align-top" alt="Electric BIM Council">
            </a>

            <div class="navbar-nav"">
                <div class="primary-menu">
                    <?php
                    wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'menu'            => 'a',
                    'menu_id'         => false,
                    'menu_class'      => 'nav nav-pills',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>
                </div>
            </div>
            <div class="navbar-right">
                <a href="#" onclick="showNavSearch();"><img src="/ebimc/wp-content/themes/ebimc/assets/images/icon-search.png" style="margin:17px 20px;width:30px;height:30px;"></a>
                
                <form id="navSearch-form">
                <div id="navSearch">
                    <div class="input-group" role="group">
                        <input type="text" id="navsearch-text" placeholder="Search for Part Number">
                        <div class="input-group-append">
                            <button type="reset"><img src="/ebimc/wp-content/themes/ebimc/assets/images/icon-cancel.png"></button>
                        </div>
                    </div>
                    <a href="#" class="navsearch-close" alt="Close" onclick="hideNavSearch();">X</a>
                </div>
                </form>
            </div>
        </nav>
	</header><!-- #page-header -->

    <?php //if(!is_page_template('page-nosubhead.php')): ?>
    <div id="page-subheader">
        <div class="carousel slide" data-ride="carousel" id="subheader-carousel">
            <ol class="carousel-indicators">
                <li data-target="#subheader-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#subheader-carousel" data-slide-to="1"></li>
                <li data-target="#subheader-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div id="carousel-slide-1" class="carousel-slide">
                        <div class="messageblock">
                            <p>Join Electrical BIM Council and get access to BIM electrical experts, free Revit Content and stay in touch with the latest Revit Electrical news.</p>
                            <a href="#" class="btn btn-secondary" target="_blank">Join for free</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div id="carousel-slide-2" class="carousel-slide">
                        <div class="messageblock">
                            <h2>layout<span class="thin">FAST</span> Plugin</h2>
                            <p>A Revit MEP Plugin to access thousands of Schneider Electric product models from the cloud, on the fly.</p>
                            <a href="http://www.bim-schneider-electric.com/layoutfastdownload/Schneider.LayoutFAST.Setup_x64.msi" class="btn btn-secondary" target="_blank">Download now for free</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div id="carousel-slide-3" class="carousel-slide">
                        <div class="messageblock">
                            <h2>Social Media</h2>
                            <p>Want to know what is happening at Schneider Electric right now? Find us on Facebook, follow us on Twitter and network with us on LinkedIn.</p>
                            <div class="buttons">
                                <a href="#" class="btn btn-secondary">LinkedIn</a>
                                <a href="#" class="btn btn-secondary">Twitter</a>
                                <a href="#" class="btn btn-secondary">Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-scroller">
                <a href="#content-anchor"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    </div>
    <?php //endif; ?>
