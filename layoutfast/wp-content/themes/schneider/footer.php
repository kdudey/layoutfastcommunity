<?php
/**
* Contains the closing of the #content div and all content after.
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package schneider
*/
?>
	
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="page-footer" class="fixed-bottom" role="contentinfo">
		<div class="container">
        	Sponsored by <img src="/layoutfast/wp-content/themes/schneider/assets/images/sponsors.jpg">
    	</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
