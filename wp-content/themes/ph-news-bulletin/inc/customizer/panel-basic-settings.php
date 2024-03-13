<?php
/**
 *	Basic Settings
 *  Background Image
 *  Homepage
 *  Archives
 *  Search Results Page
 *  Page Settings
 *  Single Post Settings
 *  404 Error Page
 */ 
function phnewsbulletin_basic_settings_customize_register( $wp_customize ) {
	
	$wp_customize->add_panel(
		'phnewsbulletin-basic-settings', array(
			'title'		=>	__('Basic Settings', 'ph-news-bulletin'),
			'priority'	=>	20
		)
	);
	
	//Homepage Settings
	$wp_customize->add_section(
		'phnewsbulletin-homepage', array(
			'title'		=>	__('Homepage (Blog)', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-latest-post-title', array(
			'default'		=>	__('Latest Posts','ph-news-bulletin'),
			'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		'phnewsbulletin-latest-post-title', array(
			  'type' => 'text',
			  'section'		=>	'phnewsbulletin-homepage',
			  'label' => __( 'Latest Posts Heading','ph-news-bulletin' ),
			  'description' => __( 'The Heading of the Section which displays the latest posts on the homepage. Below all featured areas.','ph-news-bulletin' ),
			)	
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-home-layout', array(
			'default' => 'style3',
			'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
		)
	);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-home-layout', array(
				'type' => 'radio',
				'label' => esc_html__('Latest Posts Style', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-homepage',
				'settings' => 'phnewsbulletin-home-layout',
				'input_attrs' => array('class' => 'blog_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/content-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/content-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/content-style3.png',
					'style4' => get_template_directory_uri() . '/inc/customizer/images/content-style4.png',
					'style5' => get_template_directory_uri() . '/inc/customizer/images/content-style5.png',
					'style6' => get_template_directory_uri() . '/inc/customizer/images/content-style6.png',
				)
			)
		)
	);
	
	$wp_customize->add_setting(
			'phnewsbulletin-primary-width-home', array(
				'default'	=>	'no-sidebar',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-primary-width-home', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-homepage',
				'settings' => 'phnewsbulletin-primary-width-home',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//Background Image
	$wp_customize->get_section('background_image')->panel = 'phnewsbulletin-basic-settings';
	$wp_customize->get_section('background_image')->priority = 5;
	
	//Archives
	$wp_customize->add_section(
		'phnewsbulletin-archives', array(
			'title'		=>	__('Archives (Category/Tags)', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-archive-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-archive-message', array(
				'label'		=>	__('Archive Settings', 'ph-news-bulletin'),
				'description'	=>	__('Use this section to customize the layout of Category and Tag Archive pages. This will also support any other custom taxonomies. Navigate to an archive page to view changes on the right side.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-archives',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-archives-layout', array(
			'default' => 'style1',
			'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
		)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-archives-layout', array(
				'type' => 'radio',
				'label' => esc_html__('Select Content Style', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-archives',
				'settings' => 'phnewsbulletin-archives-layout',
				'input_attrs' => array('class' => 'blog_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/content-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/content-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/content-style3.png',
					'style4' => get_template_directory_uri() . '/inc/customizer/images/content-style4.png',
					'style5' => get_template_directory_uri() . '/inc/customizer/images/content-style5.png',
					'style6' => get_template_directory_uri() . '/inc/customizer/images/content-style6.png',
				)
			)
		)
	);
			
	$wp_customize->add_setting(
			'phnewsbulletin-primary-width-archives', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-primary-width-archives', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-archives',
				'settings' => 'phnewsbulletin-primary-width-archives',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
		
	//Page Settings.
	$wp_customize->add_section(
		'phnewsbulletin-page-settings', array(
			'title'		=>	__('Pages', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-page-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-page-message', array(
				'label'		=>	__('Page Settings', 'ph-news-bulletin'),
				'description'	=>	__('Use this section to customize the layout of pages of your site.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-page-settings',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-primary-width-page', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-primary-width-page', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-page-settings',
				'settings' => 'phnewsbulletin-primary-width-page',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//Single Post Settings.
	$wp_customize->add_section(
		'phnewsbulletin-single-post', array(
			'title'		=>	__('Single Posts', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-single-post-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-single-post-message', array(
				'label'		=>	__('Single Post Settings', 'ph-news-bulletin'),
				'description'	=>	__('Use this section to customize the layout of Single Posts. Navigate to one of the published posts to view changes on the right side.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-single-post',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-single-post-style', array(
				'default'	=>	'style3',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
			)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-single-post-style', array(
				'type' => 'radio',
				'label' => esc_html__('Post Style', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-single-post',
				'settings' => 'phnewsbulletin-single-post-style',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/single-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/single-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/single-style3.png',
				)
			)
		)
	);	
	
	$wp_customize->add_setting(
		'phnewsbulletin-primary-width-single-post', array(
				'default'	=>	'no-sidebar-narrow-primary',
				'sanitize_callback'	=>	'phnewsbulletin_sanitize_sidebar_layout'
			)
		);
		
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-primary-width-single-post', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-single-post',
				'settings' => 'phnewsbulletin-primary-width-single-post',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);	
	
	//Search Results Page
	$wp_customize->add_section(
		'phnewsbulletin-search-results', array(
			'title'		=>	__('Search Results Page', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-search-results-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-search-results-message', array(
				'label'		=>	__('Search Results Settings', 'ph-news-bulletin'),
				'description'	=>	__('Use this section to customize the layout of results on Search Pages. Perform a search on the right hand side so you can view changes.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-search-results',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-search-results-layout', array(
			'default' => 'style4',
			'sanitize_callback'	=>	'phnewsbulletin_sanitize_fa_style'
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-search-results-layout', array(
				'type' => 'radio',
				'label' => esc_html__('Select Content Style', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-search-results',
				'settings' => 'phnewsbulletin-search-results-layout',
				'input_attrs' => array('class' => 'blog_layout_chooser'),
				'choices' => array(
					'style1' => get_template_directory_uri() . '/inc/customizer/images/content-style1.png',
					'style2' => get_template_directory_uri() . '/inc/customizer/images/content-style2.png',
					'style3' => get_template_directory_uri() . '/inc/customizer/images/content-style3.png',
					'style4' => get_template_directory_uri() . '/inc/customizer/images/content-style4.png',
					'style5' => get_template_directory_uri() . '/inc/customizer/images/content-style5.png',
					'style6' => get_template_directory_uri() . '/inc/customizer/images/content-style6.png',
				)
			)
		)
	);

	$wp_customize->add_setting(
		'phnewsbulletin-primary-width-search', array(
			'default'	=>	'no-sidebar-narrow-primary',
			'sanitize_callback'	=>	'phnewsbulletin_sanitize_sidebar_layout'
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Image_Radio_Control($wp_customize, 
			'phnewsbulletin-primary-width-search', array(
				'type' => 'radio',
				'label' => esc_html__('Sidebar Layout', 'ph-news-bulletin'),
				'section' => 'phnewsbulletin-search-results',
				'settings' => 'phnewsbulletin-primary-width-search',
				'input_attrs' => array('class' => 'sidebar_layout_chooser'),
				'choices' => array(
					'no-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no.jpg',
					'right-sidebar' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right.jpg',
					'right-sidebar-narrow' => get_template_directory_uri() . '/inc/customizer/images/sidebar-right-narrow.jpg',
					'no-sidebar-narrow-primary' => get_template_directory_uri() . '/inc/customizer/images/sidebar-no-narrow-primary.jpg',
				)
			)
		)
	);
	
	//404 Error Page Settings.
	$wp_customize->add_section(
		'phnewsbulletin-404-error', array(
			'title'		=>	__('404 Error Page', 'ph-news-bulletin'),
			'priority'	=>	10,
			'panel'		=>	'phnewsbulletin-basic-settings'
		)
	);
	
	$wp_customize->add_setting('pixahive-404page-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-404page-message', array(
				'label'		=>	__('404 Page', 'ph-news-bulletin'),
				'description'	=>	__('Use this page to customize the 404 Error Page.', 'ph-news-bulletin'),
				'priority'		=>	1,
				'section'		=>	'phnewsbulletin-404-error',
			)
		)
	);
	
	$wp_customize->add_setting(
		'phnewsbulletin-enable-404-posts', array(
			'default'		=>	1,
			'sanitize_callback'	=>	'absint' 
		)
	);
		
	$wp_customize->add_control(
		'phnewsbulletin-enable-404-posts', array(
			  'type' => 'checkbox',
			  'section'		=>	'phnewsbulletin-404-error',
			  'label' => __( 'Show Latest Posts on 404 Page','ph-news-bulletin' ),
			)	
	);
	
	
	
}
add_action('customize_register', 'phnewsbulletin_basic_settings_customize_register');