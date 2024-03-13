<?php
/*
* Header Customization Panel
* Site Identity (Desktop Logo Width, Logo Mobile)
* Section - Header Image
* Section - Header Settings - Top Bar (enable, disable). Date (Enable/disable), Search form (enable/disable)
* Section - Header Mobile
*/
function phnewsbulletin_header_customize_register($wp_customize) {

	$wp_customize->add_panel(
		'phnewsbulletin-header-settings', array(
			'title'		=>	__('Header Settings', 'ph-news-bulletin'),
			'priority'	=>	20
		)
	);
	
	$wp_customize->get_section('title_tagline')->panel = 'phnewsbulletin-header-settings';
	$wp_customize->get_section('title_tagline')->priority = 5;
	$wp_customize->get_section('header_image')->panel = 'phnewsbulletin-header-settings';
	$wp_customize->get_section('header_image')->priority = 5;
	
	//Logo
	$wp_customize->add_setting( 'phnewsbulletin-logo-max-height', array(
		'default' => 90,
		'sanitize_callback' => 'absint'
	));
	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'phnewsbulletin-logo-max-height',
			array(
				'label'    => __( 'Logo height (in pixels)', 'ph-news-bulletin' ),
				'description'    => __( 'Adjust Height of Logo in desktop view if its too large. This only affects the maximum height. If your logo is small, it will not make it bigger.', 'ph-news-bulletin' ),
				'section'  => 'title_tagline',
				'settings' => 'phnewsbulletin-logo-max-height',
				'priority' => 5,
				'type'     => 'range',
				'input_attrs' => array(
					'min' => 30,
					'max' => 100,
					'step' => 1,
				  )
			)
		)
	);
	
	$wp_customize->add_setting( 'phnewsbulletin-mobile-logo', array(
		'sanitize_callback' => 'esc_url_raw'
	));
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'phnewsbulletin-mobile-logo-control', array(
		'label' => __('Mobile Logo (optional)','ph-news-bulletin'),
		'description' => __('If you want a different logo to be used for mobile devices, you can use this setting. By Default, Main Logo will be shown for Desktop and Mobile both.','ph-news-bulletin'),
		'priority' => 100,
		'section' => 'title_tagline',
		'settings' => 'phnewsbulletin-mobile-logo',
		'button_labels' => array(// All These labels are optional
					'select' => __('Select Logo','ph-news-bulletin'),
					'remove' => __('Remove Logo','ph-news-bulletin'),
					'change' => __('Change Logo','ph-news-bulletin'),
					)
	)));
	
	//Header Image
	$wp_customize->add_setting('pixahive-header-image-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-header-image-message', array(
				'label'		=>	__('Note:', 'ph-news-bulletin'),
				'description'	=>	__('Header Image only appears when you choose Style 1 in <strong>Header Styles & Layouts</strong>. Header image doesn\'t appear when Style 2 is selected.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'header_image',
			)
		)
	);
	
	//Styles & Layouts
	$wp_customize->add_section(
		'phnewsbulletin-header-styles-layouts', array(
			'title'		=>	__('Header Styles (Desktop)', 'ph-news-bulletin'),
			'priority'	=>	30,
			'panel'		=>	'phnewsbulletin-header-settings'
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-style', array(
			'default' => 'style5',
			'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-header-style', array(
				'type' => 'radio',
				'label' => esc_html__('Select Header Style', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-header-styles-layouts',
				'settings' => 'phnewsbulletin-header-style',
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/header-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/header-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/header-style3.png',
					'style4' => get_template_directory_uri() . '/inc/customizer/images/header-style4.png',
					'style5' => get_template_directory_uri() . '/inc/customizer/images/header-style5.png',
				)
			)
		)
	);
	
	//Colors (FOR STYLE 2 Only)
	$wp_customize->add_setting(
		'phnewsbulletin-header-bg-color', array(
			'default'	=>	'#fff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-bg-color', array(
				'label'		=>	esc_html__('Header Background Color', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-header-bg-color',
				'description'	=>	esc_html__('Header layout 5 uses box shadow, its best to used it with white background. Also use change menu text and site title to dark colors.', 'ph-news-bulletin'),
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value())
						||
						(
							(0 == $control->manager->get_setting('phnewsbulletin-enable-header-gradient')->value())
							&&
							('style3' == $control->manager->get_setting('phnewsbulletin-header-style')->value())
						)
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-bg-lighter-color', array(
			'default'	=>	'#222222',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-bg-lighter-color', array(
				'label'		=>	esc_html__('Header Background (Lighter Shade)', 'ph-news-bulletin'),
				'description'	=>	esc_html__('Background color of social icons & search bar.', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-header-bg-lighter-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return ('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value());
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-top-bar-text-color', array(
			'default'	=>	'#FFFDEC',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-top-bar-text-color', array(
				'label'		=>	esc_html__('Top Bar Text Color', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-top-bar-text-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phnewsbulletin-enable-top-bar')->value())
						&&
						('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value())
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-top-bar-bg-color', array(
			'default'	=>	'#3a3a3a',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-top-bar-bg-color', array(
				'label'		=>	esc_html__('Top Bar Background Color', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-top-bar-bg-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phnewsbulletin-enable-top-bar')->value())
						&&
						('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value())
					);
				}
			)	
		)
	);
	
	//Gradient for Header Background [Style3 Only]
	$wp_customize->add_setting(
		'phnewsbulletin-enable-header-gradient', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-header-gradient', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-header-styles-layouts',
			  'label' => __( 'Enable Header Gradient','ph-news-bulletin' ),
			  'description' => __( 'This enables you to choose 2 colors for Header.','ph-news-bulletin' ),
			  'active_callback' => function($control) {
				  return ('style3' == $control->manager->get_setting('phnewsbulletin-header-style')->value());
			  }
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-gradient-left', array(
			'default'	=>	'#c90000',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-gradient-left', array(
				'label'		=>	esc_html__('Header Gradient (Left)', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-header-gradient-left',
				'priority'	=>	29,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phnewsbulletin-enable-header-gradient')->value())
						&&
						('style3' == $control->manager->get_setting('phnewsbulletin-header-style')->value())
					);
				}
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-gradient-right', array(
			'default'	=>	'#8158ff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-gradient-right', array(
				'label'		=>	esc_html__('Header Gradient (Right)', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-header-gradient-right',
				'priority'	=>	29,
				'active_callback' => function($control) {
					return (
						(true == $control->manager->get_setting('phnewsbulletin-enable-header-gradient')->value())
						&&
						('style3' == $control->manager->get_setting('phnewsbulletin-header-style')->value())
					);
				}
			)	
		)
	);
	
	
	//END Header Gradient
	
	//Header content Color
	$wp_customize->add_setting(
		'phnewsbulletin-header-content-color', array(
			'default'	=>	'#FFFFFF',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-content-color', array(
				'label'		=>	esc_html__('Header Content Color', 'ph-news-bulletin'),
				'description'	=>	esc_html__('Used by social icons, search bar.', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-styles-layouts',
				'settings'	=>	'phnewsbulletin-header-content-color',
				'priority'	=>	30,
				'active_callback' => function($control) {
					return ('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value());
				}
			)	
		)
	);
	//Header Content Color ENDS
	
	//Enable Top Bar
	$wp_customize->add_setting(
		'phnewsbulletin-enable-top-bar', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-top-bar', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-header-styles-layouts',
			  'label' => __( 'Enable Top Bar','ph-news-bulletin' ),
			  'description' => __( 'This enables an additional top bar above header containing Top Menu on the right, and Date on left.','ph-news-bulletin' ),
			  'active_callback' => function($control) {
				  return ('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value());
			  }
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-enable-date', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-date', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-header-styles-layouts',
			  'label' => __( 'Enable Date in Top Bar','ph-news-bulletin' ),
			  'active_callback' => function($control) {
				  return (
					  (true == $control->manager->get_setting('phnewsbulletin-enable-top-bar')->value())
					  &&
					  ('style1' !== $control->manager->get_setting('phnewsbulletin-header-style')->value())
				  );
			  },
			  
			)	
	);


	//Header (Mobile)
	$wp_customize->add_section(
		'phnewsbulletin-header-mobile', array(
			'title'		=>	__('Header Style (Mobile)', 'ph-news-bulletin'),
			'priority'	=>	30,
			'panel'		=>	'phnewsbulletin-header-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-header-mobile-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-header-mobile-message', array(
				'label'		=>	__('Header (Mobile)', 'ph-news-bulletin'),
				'description'	=>	__('For a Better User experience, PH News Center uses a smaller Mobile Header with just the logo and Menu Icon. The Search Bar, Social Icons, Complete Menu appear when the Hamburger (<span class="dashicons dashicons-menu-alt"></span>) Icon is clicked.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-header-mobile',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-mobile-bg-color', array(
			'default'	=>	'#FFFFFF',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-mobile-bg-color', array(
				'label'		=>	esc_html__('Header Background Color', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-mobile',
				'settings'	=>	'phnewsbulletin-header-mobile-bg-color',
				'priority'	=>	30,
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-header-mobile-text-color', array(
			'default'	=>	'#222222',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-header-mobile-text-color', array(
				'label'		=>	esc_html__('Content Color (Title/Icons)', 'ph-news-bulletin'),
				'section'	=>	'phnewsbulletin-header-mobile',
				'settings'	=>	'phnewsbulletin-header-mobile-text-color',
				'priority'	=>	30,
			)	
		)
	);
	
	
	//Social
	$wp_customize->add_section(
		'phnewsbulletin-social-links', array(
			'title'		=>	__('Social Links', 'ph-news-bulletin'),
			'priority'	=>	30,
			'panel'		=>	'phnewsbulletin-header-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-social-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-social-message', array(
				'label'		=>	__('How to Set up Social Icons in Header?', 'ph-news-bulletin'),
				'description'	=>	__('PH News Center themes supports social icons via WordPress menus. Its really easy to add and the info is retained when you switch themes. Here is how you do it. <br><br><strong>Step 1. </strong>Go to Appearance > Menus. Create a New Menu. <br><strong>Step 2. </strong>Add Menu Item. Choose Custom Links. Enter your Social Profile URL. Leave the <em>Link Text</em> field blank. Repeat for all social networks you want to display.<br><strong>Step 3. </strong>Choose Menu location as Social Networks, and press Save. <br><br>PH News Center theme is smart enough and will automatically connect your social urls with correct icons. The theme supports all top social networks.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-social-links',
			)
		)
	);
	
}
add_action('customize_register','phnewsbulletin_header_customize_register');