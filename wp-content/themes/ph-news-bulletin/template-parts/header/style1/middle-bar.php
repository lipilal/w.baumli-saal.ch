<div id="site-branding">
	<div class="container logo-search-wrapper">
	 <?php
	  the_custom_logo(); ?>
		<div class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

	<div class="search-wrapper">
	<?php
	if(get_theme_mod('phnewsbulletin-display-search')):
		get_search_form();
	endif;
		?>
	</div>
	</div>
</div><!-- .site-branding -->