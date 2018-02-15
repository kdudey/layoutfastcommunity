<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package schneider
 */

if ( ! function_exists( 'schneider_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function schneider_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'schneider', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'schneider' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'schneider_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function schneider_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'schneider_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'schneider_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function schneider_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'schneider_content_width', 1170 );
}
add_action( 'after_setup_theme', 'schneider_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function schneider_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'schneider' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'schneider' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'schneider' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'schneider' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'schneider_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function schneider_scripts() {
	// load bootstrap css
	wp_enqueue_style( 'schneider-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
	// load bootstrap css
	wp_enqueue_style( 'schneider-font-awesome', get_template_directory_uri() . '/inc/assets/css/font-awesome.min.css', false, '4.1.0' );
	// load AItheme styles
	// load Schneider styles
	wp_enqueue_style( 'schneider-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

	// load bootstrap js
    wp_enqueue_script('schneider-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array() );
	wp_enqueue_script('schneider-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array() );
    wp_enqueue_script('schneider-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array() );
	wp_enqueue_script( 'schneider-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'schneider_scripts' );


function schneider_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "schneider" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "schneider" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "schneider" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'schneider_password_form' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

function fb_move_admin_bar() {
    echo '
    <style type="text/css">
    body {
    margin-top: -28px;
    padding-bottom: 28px;
    }
    body.admin-bar #wphead {
       padding-top: 0;
    }
    body.admin-bar #footer {
       padding-bottom: 28px;
    }
    #wpadminbar {
        top: auto !important;
        bottom: 0;
    }
    #wpadminbar .quicklinks .menupop ul {
        bottom: 28px;
    }
    </style>';
}
// on backend area
add_action( 'admin_head', 'fb_move_admin_bar' );
// on frontend area
add_action( 'wp_head', 'fb_move_admin_bar' );