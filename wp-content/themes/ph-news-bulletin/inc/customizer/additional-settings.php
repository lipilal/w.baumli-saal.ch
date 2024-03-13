<?php
/**
 *	Sidebar Recent Posts
 *  Featured Post Footer
 *  Scroll to Top
 */ 
function phnewsbulletin_general_settings_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'phnewsbulletin-additional-settings', array(
			'title'		=>	__('PH News Bulletin Options', 'ph-news-bulletin'),
			'priority'	=>	20
		)
	);
		
	// Sidebar Recent Posts
	$wp_customize-> add_section('phnewsbulletin-sidebar-featured-posts', array(
		'title'                    => __('Featured Post in Sidebar','ph-news-bulletin'),
		'description'              => __('Check the box to enable featured posts in sidebar','ph-news-bulletin'),
		'panel'                    => 'phnewsbulletin-additional-settings'

	 ));
	
	 $wp_customize-> add_setting('phnewsbulletin-sidebar-featured-posts_set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phnewsbulletin_sanitize_checkbox',
	 ));
	 
	 $wp_customize-> add_control( 'phnewsbulletin-sidebar-featured-posts_ctrl', array(
		'label'                   => __('Featured Post in Sidebar','ph-news-bulletin'),
		'description'             => __('Check the box to enable featured posts in sidebar','ph-news-bulletin'),
		'section'                 => 'phnewsbulletin-sidebar-featured-posts',
		'settings'                => 'phnewsbulletin-sidebar-featured-posts_set',
		'type'                    => 'checkbox',
	 ));

	// Featured Posts Footer
	$wp_customize-> add_section('phnewsbulletin-footer-featured-posts', array(
		'title'                    => __('Featured Post Footer','ph-news-bulletin'),
		'description'              => __('Check the box to enable featured posts in footer','ph-news-bulletin'),
		'panel'                    => 'phnewsbulletin-additional-settings',
		'priority' => 29,

	 ));
	
	 $wp_customize-> add_setting('phnewsbulletin-footer-featured-posts_set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phnewsbulletin_sanitize_checkbox',
	 ));
	 
	 $wp_customize-> add_control( 'phnewsbulletin-footer-featured-posts_ctrl', array(
		'label'                   => __('Featured Post Footer','ph-news-bulletin'),
		'description'             => __('Check the box to enable featured posts in footer','ph-news-bulletin'),
		'section'                 => 'phnewsbulletin-footer-featured-posts',
		'settings'                => 'phnewsbulletin-footer-featured-posts_set',
		'type'                    => 'checkbox',
	 ));

	   // Footer Featured posts
	   $wp_customize->add_section('phnewsbulletin_footer_fa_heading', array(
		'title' => 'You May Have Missed Section Title',
		'priority' => 30,
		'panel'    => 'phnewsbulletin-additional-settings',
	));

	// Add a setting for your heading
	$wp_customize->add_setting('phnewsbulletin_footer_fa_heading', array(
		'default' => 'You May Have Missed',
		'sanitize_callback' => 'sanitize_text_field',
	));

	// Add a control to input the heading
	$wp_customize->add_control('phnewsbulletin_footer_fa_heading_control', array(
		'label' => 'You may have missed section title',
		'section' => 'phnewsbulletin_footer_fa_heading',
		'settings' => 'phnewsbulletin_footer_fa_heading',
		'type' => 'text',
	));


	// Scroll to Top
	$wp_customize-> add_section('phnewsbulletin-scrl-to-top', array(
		'title'                    => __('Scroll to Top','ph-news-bulletin'),
		'description'              => __('Check the box to disable scroll to top','ph-news-bulletin'),
		'panel'                    => 'phnewsbulletin-additional-settings'

	 ));
	
	 $wp_customize-> add_setting('phnewsbulletin-scrl-to-top-set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phnewsbulletin_sanitize_checkbox',
	 ));
	 
	 $wp_customize-> add_control( 'phnewsbulletin-scrl-to-top', array(
		'label'                   => __('Enable Scroll to Top','ph-news-bulletin'),
		'description'             => __('Check the box to disable scroll to top','ph-news-bulletin'),
		'section'                 => 'phnewsbulletin-scrl-to-top',
		'settings'                => 'phnewsbulletin-scrl-to-top-set',
		'type'                    => 'checkbox',
	 ));

	 //checkbox sanitization 
	function phnewsbulletin_sanitize_checkbox( $input ) {
	
		// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
     
	// BreadCrumbs
	 $wp_customize-> add_section('phnewsbulletin-breadcrumbs', array(
		'title'                    => __('Breadcrumbs','ph-news-bulletin'),
		'description'              => __('Check the box to enable Breadcrumbs','ph-news-bulletin'),
		'panel'                    => 'phnewsbulletin-additional-settings'

	 ));
	
	 $wp_customize-> add_setting('phnewsbulletin-breadcrumbs_set', array(
		'type'                     => 'theme_mod',
		'sanitize_callback'        => 'phnewsbulletin_sanitize_checkbox'
	 ));

	 $wp_customize-> add_control( 'phnewsbulletin-breadcrumbs_ctrl', array(
		'label'                   => __('Breadcrumbs','ph-news-bulletin'),
		'description'             => __('Check the box to enable Breadcrumbs','ph-news-bulletin'),
		'section'                 => 'phnewsbulletin-breadcrumbs',
		'settings'                => 'phnewsbulletin-breadcrumbs_set',
		'type'                    => 'checkbox',
	 ));

	  

		// Show/Hide Search Bar
		$wp_customize-> add_section('phnewsbulletin-display-search', array(
			'title'                    => __('Show Search Bar','ph-news-bulletin'),
			'description'              => __('Check the box to enable Search Bar','ph-news-bulletin'),
			'panel'                    => 'phnewsbulletin-additional-settings'
	
		 ));
		
		 $wp_customize-> add_setting('phnewsbulletin-display-search', array(
			'type'                     => 'theme_mod',
			'sanitize_callback'        => 'phnewsbulletin_sanitize_checkbox'
		 ));
	
		 $wp_customize-> add_control( 'phnewsbulletin-display-search_ctrl', array(
			'label'                   => __('Show Search Bar','ph-news-bulletin'),
			'description'             => __('Check the box to enable Search Bar','ph-news-bulletin'),
			'section'                 => 'phnewsbulletin-display-search',
			'settings'                => 'phnewsbulletin-display-search',
			'type'                    => 'checkbox',
		 ));
	

		// google fonts
	
		 $wp_customize->add_section( 'phnewsbulletin_google_fonts', array(
			'title'    => 'Google Fonts',
			'priority' => 30,
			'panel'    => 'phnewsbulletin-additional-settings'
	
		) );
	
		$fonts = array(
			'open-sans' => 'Open Sans',
			'roboto' => 'Roboto',
			'montserrat' => 'Montserrat',
			'lato' => 'Lato',
			'oswald' => 'Oswald',
			'source-sans-pro' => 'Source Sans Pro',
			'raleway' => 'Raleway',
			'pt-sans' => 'PT Sans',
			'merriweather' => 'Merriweather',
			'ubuntu' => 'Ubuntu',
			'playfair-display' => 'Playfair Display',
			'nunito' => 'Nunito',
			'hind' => 'Hind',
			'quicksand' => 'Quicksand',
			'droid-sans' => 'Droid Sans',
			'noto-serif' => 'Noto Serif',
			'fira-sans' => 'Fira Sans',
			'titillium-web' => 'Titillium Web',
			'poppins' => 'Poppins',
			'arial' => 'Arial',
		);
	
		$choices = array();
		foreach ( $fonts as $font_id => $font_name ) {
			$choices[ $font_id ] = $font_name;
		}
	
		$wp_customize->add_setting( 'phnewsbulletin_selected_font_heading', array(
			'default' => 'open-sans',
			'sanitize_callback' => 'phnewsbulletin_sanitize_font',
		) );
	
		$wp_customize->add_control( 'phnewsbulletin_selected_font_heading', array(
			'type' => 'select',
			'section' => 'phnewsbulletin_google_fonts',
			'label' => 'Select a Font for Content',
			'choices' => $choices,
		) );
	
		$wp_customize->add_setting( 'phnewsbulletin_selected_font_body', array(
			'default' => 'poppins',
			'sanitize_callback' => 'phnewsbulletin_sanitize_font',
		) );
	
		$wp_customize->add_control( 'phnewsbulletin_selected_font_body', array(
			'type' => 'select',
			'section' => 'phnewsbulletin_google_fonts',
			'label' => 'Select a Font for Heading',
			'choices' => $choices,
		) );
	}
	
	
	function phnewsbulletin_enqueue_selected_font() {
		$selected_font_heading = get_theme_mod( 'phnewsbulletin_selected_font_heading', 'roboto' );
		$font_url_heading = 'https://fonts.googleapis.com/css?family=' . $selected_font_heading;
		wp_enqueue_style( 'phnewsbulletin_selected_font', $font_url_heading );
	
		$selected_font_body = get_theme_mod( 'phnewsbulletin_selected_font_body', 'poppins' );
		$font_url_body = 'https://fonts.googleapis.com/css?family=' . $selected_font_body;
		wp_enqueue_style( 'phnewsbulletin_selected_font', $font_url_body );
	}
	add_action( 'wp_enqueue_scripts', 'phnewsbulletin_enqueue_selected_font' );
	
	function phnewsbulletin_customizer_fonts_css() {
		$selected_font_heading = get_theme_mod( 'phnewsbulletin_selected_font_heading', 'roboto', );
		$selected_font_body = get_theme_mod( 'phnewsbulletin_selected_font_body', 'popins', );
	
		
		?>
		<style>
			body {
				font-family: '<?php echo $selected_font_heading; ?>', sans-serif;
			}
			h1,h2,h3,h4,h5,h6{
				font-family:'<?php echo $selected_font_body; ?>', sans-serif;
			}
		</style>
		<?php
	}
	add_action( 'wp_head', 'phnewsbulletin_customizer_fonts_css' );
	
	function phnewsbulletin_sanitize_font($input, $setting) {
	
		$choices = array('open-sans','roboto','Montserrat','lato','oswald','source-sans-pro','raleway','pt-sans','merriweather','ubuntu','playfair-display','nunito','hind','quicksand','droid-sans','noto-serif','fira-sans','titillium-web','poppins','arial');
		if (in_array($input, $choices)) {
			return $input;
		} else {
			return "open-sans";
		 }
		}
	 
add_action('customize_register', 'phnewsbulletin_general_settings_customize_register');