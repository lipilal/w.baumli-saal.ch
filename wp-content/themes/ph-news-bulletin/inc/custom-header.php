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
 * @package phnewsbulletin
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses phnewsbulletin_header_style()
 */
function phnewsbulletin_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'phnewsbulletin_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '#000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'phnewsbulletin_front_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'phnewsbulletin_custom_header_setup' );


function phnewsbulletin_front_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
	 */

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
	//Header Image
	if (has_header_image()) : ?>
		#masthead {
			background: url(<?php header_image(); ?>);
			background-size: cover;
		}
	<?php endif;
		
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
	else :
		?>
		#site-branding .site-title a {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

