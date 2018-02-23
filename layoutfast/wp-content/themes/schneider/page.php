<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package schneider
 */


get_header(); 

//Subheader hero on Default templates ?>
<div id="page-subheader" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
    <h1>
        <?php
        if (get_theme_mod('header_banner_title_setting')) {
            echo get_theme_mod('header_banner_title_setting');
        } else {
            echo 'Enter Headline Here';
        }
        ?>
    </h1>
    <p>
        <?php
        if (get_theme_mod('header_banner_tagline_setting')) {
            echo get_theme_mod('header_banner_tagline_setting');
        } else {
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


<a id="content-anchor"></a>
<div id="page-content" class="container">
    <div class="row">
    	<div class="col-md-8">
           	<div class="secondary-menu">
                <?php
                wp_nav_menu(array(
                'theme_location'    => 'secondary',
                'menu'            => 'a',
                'menu_id'         => false,
                'menu_class'      => 'nav nav-pills',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </div>

            <div class="content">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

	                // If comments are open or we have at least one comment, load up the comment template.
	                if ( comments_open() || get_comments_number() ) :
	                    comments_template();
	                endif;

				endwhile; // End of the loop.
				?>
			</div>
		</div>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div> <!-- .row -->
</div> <!-- #page-content -->

<?php
get_footer();
?>