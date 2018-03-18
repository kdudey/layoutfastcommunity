<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package schneider
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses schneider_custom_subheader_styles()
 */

function schneider_custom_subheader() {
	add_theme_support('custom-header', apply_filters('schneider_custom_subheader_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2400,
		'height'                 => 560,
		'flex-height'            => true,
		'wp-head-callback'       => 'schneider_header_style',
	) ) );
}
add_action('after_setup_theme', 'schneider_custom_subheader');


if ( ! function_exists( 'schneider_custom_subheader_styles' ) ) :
	/**
	* @see schneider_custom_subheader().
	*/
	function schneider_custom_subheader_styles() {
		//If no custom options for text are set, let's bail.
		$header_text_color = get_header_textcolor();
		if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		/*
		echo '<style type="text/css">';
		echo '#page-subheader h1, #page-subheader p { color:#' . $header_text_color . ';}'
		echo '</style>';
		*/
	}
endif;
