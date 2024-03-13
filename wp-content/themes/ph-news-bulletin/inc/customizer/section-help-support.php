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
function phnewsbulletin_help_support_customize_register( $wp_customize ) {
	
	$wp_customize->add_section(
		'phnewsbulletin-help-support', array(
			'title'		=>	__('Theme Support & Docs', 'ph-news-bulletin'),
			'priority'	=>	10,
		)
	);
	
	$wp_customize->add_setting('pixahive-welcome-message', array(
		'sanitize_callback'	=>	'sanitize_text_field' 
		)
	);
	
	$wp_customize->add_control(
		new phnewsbulletin_Custom_Notice_Control(
			$wp_customize, 'pixahive-welcome-message', array(
				'label'		=>	__('Thank you for choosing PH News Center theme by PixaHive.', 'ph-news-bulletin'),
				'description'	=>	__('PH News Center theme is a brilliant theme in the making. We need your help make it even more better. If you have any feature suggestions, you are more than welcome. <br /> We are providing 100% free support with this theme without the need of upgrading to any pro version. <a href="https://pixahive.com/themes/ph-news-bulletin/" target="_blank">Read Documentation / Contact Us</a> for support, requests, suggestions or just to say how awesome this theme is. To know what your site should look like, <a href="https://theme-demos.pixahive.com/ph-news-bulletin/" target="_blank">view Theme Demo</a>.', 'ph-news-bulletin'),
				'priority'		=>	10,
				'section'		=>	'phnewsbulletin-help-support',
				'input_attrs' => array('class'=>'help-msg'),
			)
		)
	);
	
}
add_action('customize_register', 'phnewsbulletin_help_support_customize_register');