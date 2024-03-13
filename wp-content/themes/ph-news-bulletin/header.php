<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phnewsbulletin
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="uNdp4PHrNUDmSIEfbpbGTKBm5clET2oZd88UTuUsCCY" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ph-news-bulletin' ); ?></a>
	
	<?php phnewsbulletin_display_masthead(esc_html(get_theme_mod('phnewsbulletin-header-style','style5'))); ?>

	<header id="masthead-mobile" class="d-flex d-sm-flex d-md-none">
		<a href="#sidr" id="sidr-toggle" class="toggle-menu-hamburger"><i class="fa fa-bars"></i></a>
		<?php get_template_part( 'template-parts/header-mobile/site-branding-mobile'); ?>
		<a href="#search-drop" class="search-toggle"><i class="fa fa-search"></i></a>
	</header>	

	<?php do_action('phnewsbulletin_after_header'); ?>