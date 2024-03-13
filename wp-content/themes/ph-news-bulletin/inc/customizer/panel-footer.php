<?php
/*
* Custom Copyright Text
* Enable Additional Footer Menu
* 
*/
function phnewsbulletin_footer_customize_register($wp_customize) {

	$wp_customize->add_panel(
		'phnewsbulletin-footer-settings', array(
			'title'		=>	__('Footer Settings', 'ph-news-bulletin'),
			'priority'	=>	20
		)
	);
		
}
add_action('customize_register','phnewsbulletin_footer_customize_register');