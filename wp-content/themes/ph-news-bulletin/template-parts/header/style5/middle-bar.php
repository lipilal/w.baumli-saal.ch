<div id="middle-bar">
	<div class="container">
		<div class="row">
			<div id="site-branding" class="col-md-12 col-lg-3">
				<?php
				the_custom_logo(); ?>
					<div class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="col-md-9 main-navigation">
				<div class="container">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>
			</nav><!-- #site-navigation -->
				
		</div>
	</div>
</div>