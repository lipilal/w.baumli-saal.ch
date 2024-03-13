<?php
/**
 *	Featured Areas
 */
function phnewsbulletin_featured_areas_customize_register( $wp_customize ) {
	
	
	//Featured Areas
	$wp_customize->add_panel(
		'phnewsbulletin-featured-areas', array(
			'title'		=>	__('Featured Areas', 'ph-news-bulletin'),
			'priority'	=>	30
		)
	);
	
	//Ticker
	$wp_customize->add_section(
		'phnewsbulletin-ticker', array(
			'title'		=>	__('Featured Ticker', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-featured-areas'
		)
		);
		
	$wp_customize->add_setting(
		'phnewsbulletin-enable-ticker', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-ticker', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-ticker',
			  'label' => __( 'Enable ticker (Homepage Only)','ph-news-bulletin' ),
			  'description' => __( 'Animated Ticker generally used to show viral or trending content.','ph-news-bulletin' ),
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-enable-ticker-sitewide', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-ticker-sitewide', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-ticker',
			  'label' => __( 'Enable Ticker (Sitewide)','ph-news-bulletin' ),
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-ticker-label', array(
			'default'		=>	__('Latest Posts', 'ph-news-bulletin'),
			'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-ticker-label', array(
			  'type' => 'text',
			  'section'		=>	'phnewsbulletin-ticker',
			  'label' => __( 'Ticker Label','ph-news-bulletin' ),
			)	
	);
		
	$wp_customize->add_setting(
		'phnewsbulletin-ticker-cat', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
		
	$wp_customize->add_control(
		new phnewsbulletin_WP_Customize_Category_Control(
			$wp_customize, 'phnewsbulletin-ticker-cat', array(
				'label'		=>	__('Category', 'ph-news-bulletin'),
				'description'	=>	__('Category whose posts need to be featured..', 'ph-news-bulletin'),
				'priority'		=>	10,
				'section'		=>	'phnewsbulletin-ticker'
				
			)
		)
	);
		
	$wp_customize->add_setting(
		'phnewsbulletin-ticker-count', array(
			'default'		=>	6,
			'sanitize_callback'	=>	'absint'
		)
	);
		
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'phnewsbulletin-ticker-count',
			array(
				'label'    => __( 'No. of Posts', 'ph-news-bulletin' ),
				'description'    => __( 'Recommended to set this value to 6 or more.', 'ph-news-bulletin' ),
				'section'  => 'phnewsbulletin-ticker',
				'settings' => 'phnewsbulletin-ticker-count',
				'type'     => 'number'
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-ticker-disable-phone', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
	$wp_customize->add_control(
		'phnewsbulletin-ticker-disable-phone', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-ticker',
			  'label' => __( 'Disable ticker on Mobile Devices','ph-news-bulletin' ),
			  'description' => __( 'The Slider Ticker may not produce the desired effect on Mobile as it does on Desktop Devices. Use this to disable Ticker on Phone. (Recommended)','ph-news-bulletin' ),
			)	
	);
	
	
		
	//Carousel
	$wp_customize->add_section(
		'phnewsbulletin-carousel', array(
			'title'		=>	__('Featured Carousel', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-featured-areas'
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-enable-carousel', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint' 
		)
	);
	
	$wp_customize->add_control(
		'phnewsbulletin-enable-carousel', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-carousel',
			  'label' => __( 'Enable Carousel','ph-news-bulletin' ),
			  'description' => __( 'A Sliding Carousel appears at the top of the Homepage, below the Menu Bar.','ph-news-bulletin' ),
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-carousel-cat', array(
			'default'		=>	0,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_WP_Customize_Category_Control(
			$wp_customize, 'phnewsbulletin-carousel-cat', array(
				'label'		=>	__('Category', 'ph-news-bulletin'),
				'description'	=>	__('Category whose posts need to be featured..', 'ph-news-bulletin'),
				'priority'		=>	10,
				'section'		=>	'phnewsbulletin-carousel'
				
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-carousel-count', array(
			'default'		=>	6,
			'sanitize_callback'	=>	'absint'
		)
	);
	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'phnewsbulletin-carousel-count',
			array(
				'label'    => __( 'No. of Posts', 'ph-news-bulletin' ),
				'description'    => __( 'Recommended to set this value to 6 or more.', 'ph-news-bulletin' ),
				'section'  => 'phnewsbulletin-carousel',
				'settings' => 'phnewsbulletin-carousel-count',
				'type'     => 'number'
			)
		)
	);
	
	//Featured Areas Section Generator
	$i = 0;
	for ($i = 1; $i < 8; $i++) :
		$wp_customize->add_section(
			'phnewsbulletin-fa-'.$i, array(
				'title'		=>	__('Featured Posts Area - ', 'ph-news-bulletin').$i,
				'priority'	=>	10,
				'panel'		=>	'phnewsbulletin-featured-areas'
			)
		);
		
		//Enable
		$wp_customize->add_setting(
			'phnewsbulletin-fa-enable-'.$i, array(
				'default'		=>	0,
				'sanitize_callback'	=>	'absint' 
			)
		);
		
		$wp_customize->add_control(
			'phnewsbulletin-fa-enable-'.$i, array(
				  'type' => 'checkbox',
				  'section'		=>	'phnewsbulletin-fa-'.$i,
				  'label' => __( 'Enable','ph-news-bulletin' ),
				  'description' => __( 'Enable this Featured Area.','ph-news-bulletin' ),
				)	
		);
		
		//Category Select Box
		$wp_customize->add_setting(
			'phnewsbulletin-fa-cat-'.$i, array(
				'default'		=>	0,
				'sanitize_callback'	=>	'absint' 
			)
		);
		
		$wp_customize->add_control(
			new phnewsbulletin_WP_Customize_Category_Control(
				$wp_customize, 'phnewsbulletin-fa-cat-'.$i, array(
					'label'		=>	__('Category', 'ph-news-bulletin'),
					'description'	=>	__('Category whose posts need to be featured', 'ph-news-bulletin'),
					'priority'		=>	10,
					'section'		=>	'phnewsbulletin-fa-'.$i,
				)
			)
		);
		
		//Show Title Checkbox
		$wp_customize->add_setting(
			'phnewsbulletin-fa-show-title-'.$i, array(
				'default'		=>	0,
				'sanitize_callback'	=>	'absint' 
			)
		);
		
		$wp_customize->add_control(
			'phnewsbulletin-fa-show-title-'.$i, array(
				  'type' => 'checkbox',
				  'section'		=>	'phnewsbulletin-fa-'.$i,
				  'label' => __( 'Show Title','ph-news-bulletin' ),
				  'description' => __( 'By Default, the category name will appear as the title above the featured section.','ph-news-bulletin' ),
				)	
		);
		
		$wp_customize->add_setting(
			'phnewsbulletin-fa-style-'.$i, array(
				'default' => 'style7',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
			)
		);
		
		$wp_customize->add_control(
			new phnewsbulletin_Image_Radio_Control($wp_customize, 
				'phnewsbulletin-fa-style-'.$i, array(
					'type' => 'radio',
					'label' => esc_html__('Select Featured Area Style', 'ph-news-bulletin'),
					'section' => 'phnewsbulletin-fa-'.$i,
					'settings' => 'phnewsbulletin-fa-style-'.$i,
					'choices' => array(
						'style1' => get_template_directory_uri() . '/inc/customizer/images/fa-style1.png',
						'style2' => get_template_directory_uri() . '/inc/customizer/images/fa-style2.png',
						'style3' => get_template_directory_uri() . '/inc/customizer/images/fa-style3.png',
						'style4' => get_template_directory_uri() . '/inc/customizer/images/fa-style4.png',
						'style5' => get_template_directory_uri() . '/inc/customizer/images/fa-style5.png',
						'style6' => get_template_directory_uri() . '/inc/customizer/images/fa-style6.png',
						'style7' => get_template_directory_uri() . '/inc/customizer/images/fa-style7.png',
					)
				)
			)
		);
		
		
	endfor;	
	
}
add_action('customize_register', 'phnewsbulletin_featured_areas_customize_register');