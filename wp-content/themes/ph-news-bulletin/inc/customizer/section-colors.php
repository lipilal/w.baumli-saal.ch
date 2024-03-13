<?php 
function phnewsbulletin_colors_customize_register($wp_customize) {
	
	$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','ph-news-bulletin');
	$wp_customize->get_section('colors')->title = __('Website Color Scheme','ph-news-bulletin');
	
	$wp_customize->add_setting(
		'phnewsbulletin-background-darker-color', array(
			'default'	=>	'#EEEEEE',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-background-darker-color', array(
				'label'		=>	__('Background (Darker Shade)', 'ph-news-bulletin'),
				'description' =>	__('A Slightly darker shade of the main background color. Helpful in adding accents to the design.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-background-darker-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-primary-color', array(
			'default'	=>	'#f37e7e',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-primary-color', array(
				'label'		=>	__('Primary Color', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-primary-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-primary-text-color', array(
			'default'	=>	'#f9ffe7',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-primary-text-color', array(
				'label'		=>	__('Primary Text Color', 'ph-news-bulletin'),
				'description' => __('This is the color of the text, where the background color is Primary color. Like Menu Bar, Buttons, etc.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-primary-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	//Secondary
	$wp_customize->add_setting(
		'phnewsbulletin-secondary-color', array(
			'default'	=>	'#747474',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-secondary-color', array(
				'label'		=>	__('Secondary Color', 'ph-news-bulletin'),
				'description' => __('Secondary Color. Used for Links within content, sidebar, etc.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-secondary-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-secondary-text-color', array(
			'default'	=>	'#f9ffe7',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-secondary-text-color', array(
				'label'		=>	__('Secondary Text Color', 'ph-news-bulletin'),
				'description' => __('This is the color of the text, where the background color is Secondary color. Like Module Headings, Some Buttons, etc.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-secondary-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-secondary-dark-color', array(
			'default'	=>	'#E9C864',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-secondary-dark-color', array(
				'label'		=>	__('Secondary Color (Darker Shade)', 'ph-news-bulletin'),
				'description' => __('Darker shade of Secondary color. Used on Link Hover, etc.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-secondary-dark-color',
				'priority'	=>	30
			)	
		)
	);
	
	//Text Colors.
	$wp_customize->add_setting(
		'phnewsbulletin-text-color', array(
			'default'	=>	'#555555',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-text-color', array(
				'label'		=>	__('Text Color', 'ph-news-bulletin'),
				'description' =>	__('Text Color. Main color of the content.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-text-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-text-dark-color', array(
			'default'	=>	'#111111',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-text-dark-color', array(
				'label'		=>	__('Text Color (Darker shade)', 'ph-news-bulletin'),
				'description' =>	__('Darker Shade of the text color. Used for headings and important text.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-text-dark-color',
				'priority'	=>	30
			)	
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-text-light-color', array(
			'default'	=>	'#777777',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-text-light-color', array(
				'label'		=>	__('Text Color (Lighter Shade)', 'ph-news-bulletin'),
				'description' =>	__('Lighter Shade of Text Color. Used for Top Menu, Meta Data and other text.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-text-light-color',
				'priority'	=>	30
			)	
		)
	);

	$wp_customize->add_setting(
		'phnewsbulletin-menu-text-color', array(
			'default'	=>	'#232323',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-menu-text-color', array(
				'label'		=>	__('Menu Text Color', 'ph-news-bulletin'),
				'description' =>	__('Used by navigation links in main menu.', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-menu-text-color',
				'priority'	=>	30
			)	
		)
	);

	$wp_customize->add_setting(
		'phnewsbulletin-bg-plain-color', array(
			'default'	=>	'#ffff',
			'sanitize_callback'	=>	'sanitize_hex_color'
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize, 'phnewsbulletin-bg-plain-color', array(
				'label'		=>	__('Primary Color', 'ph-news-bulletin'),
				'section'	=>	'colors',
				'settings'	=>	'phnewsbulletin-bg-plain-color',
				'priority'	=>	30
			)	
		)
	);
		
}
add_action('customize_register','phnewsbulletin_colors_customize_register');