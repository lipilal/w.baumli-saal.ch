<div class="bottom-bar-wrapper">
 <div class="menu-search-wrapper container">
  <div class="container menu-box">
   <nav id="site-navigation" class="main-navigation">
	
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
   </nav><!-- #site-navigation -->
 </div>

	<div class="search-bar-wrapper col-lg-1">
		<?php if(get_theme_mod('phnewsbulletin-display-search')):?>
		<a class="search-icon"><img id="search-icon" src="<?php echo esc_url( get_template_directory_uri(). '/design-files/images/search-icon.png');?>"?></a>
		<a class="cross-icon"><img id="cross-icon" src="<?php echo esc_url( get_template_directory_uri(). '/design-files/images/Cross.png');?>"?></a>
		<?php endif;?>
	</div>
	
</div>
</div>
<div class="search-form-wrapper container">
<?php get_search_form();?>
</div>


