<?php if(is_home()):?>
<?php if(get_theme_mod('phnewsbulletin-footer-featured-posts_set')):?>

<div class="footer-featured-module-style container">
 
<div class="module-title module-title-style2 cat-title footer-fa-title">
    <h2 class="footer-fa">
      <span> <?php echo esc_html(get_theme_mod('phnewsbulletin_footer_fa_heading','You May Have Missed')); ?></span>
    </h2>
</div>

<div class="row">
				<?php 
					$args = array(
						'posts_per_page' => 4,
						'ignore_sticky_posts' => 1 //Customizations to follow
					);
				
					$featured_module_posts = new WP_Query($args); 
						while ($featured_module_posts -> have_posts()) : $featured_module_posts -> the_post();
						?>
					
						<div class="featured-post col-sm-6 col-md-3 col-lg-3 small"> 
							<?php $primary_category = phnewsbulletin_primary_category(); 
								if (true) :
									echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
								endif;
							?>
							<a href="<?php the_permalink(); ?>">
							<figure class="figure">
								<?php 
								if (has_post_thumbnail()):
									the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
								else: ?>
									<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/thumbnail.jpg"); ?>"><?php 
								endif;	?>
								</figure>
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
						
						<?php 
						endwhile;
						wp_reset_postdata(); ?>
			</div> 
</div>
<?php endif;
endif;
