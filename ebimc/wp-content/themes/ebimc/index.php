<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package schneider
 */

get_header(); 
?>

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