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
    <a id="content-anchor"></a>
    <div id="page-content" class="container">
        <div class="row">
        	<div class="col-md-8">
               	<div class="secondary-menu">
                    <?php
                    wp_nav_menu(array(
                    'theme_location'  => 'secondary',
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