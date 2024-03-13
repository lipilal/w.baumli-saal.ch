<?php 
if (get_theme_mod('phnewsbulletin-enable-carousel') && !is_paged()) : ?>
	<div class="owl-carousel">
		<?php 
			$args = array(
				'posts_per_page' => get_theme_mod('phnewsbulletin-carousel-count', 6)
			);
			if (get_theme_mod('phnewsbulletin-carousel-cat')) { 
				$args['category__in'] = array(get_theme_mod('phnewsbulletin-carousel-cat')); 
			}
			
			
			$carousel_posts = new WP_Query($args); 
			while ($carousel_posts -> have_posts()) : $carousel_posts -> the_post();
			?>
			
			<div class="carousel-post"> 
				<?php $primary_category = phnewsbulletin_primary_category(); 
					if (true) { 
						echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>"; 
					} ?>
				<a href="<?php the_permalink(); ?>">
				<?php 
					if (has_post_thumbnail()):
						the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
							else: ?>
						<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/thumbnail.jpg"); ?>"><?php 
					endif;	?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php 
						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
						$time_string = sprintf(
							$time_string,
							esc_attr( get_the_date( DATE_W3C ) ),
							esc_html( get_the_date() ),
							esc_attr( get_the_modified_date( DATE_W3C ) ),
							esc_html( get_the_modified_date() )
						);
					?>
					<div class="footer-meta"><?php echo $time_string; ?></div>
				</a>
			</div>
			
			<?php endwhile; 
			wp_reset_postdata(); ?>
		  
	</div> 
<?php endif; ?>