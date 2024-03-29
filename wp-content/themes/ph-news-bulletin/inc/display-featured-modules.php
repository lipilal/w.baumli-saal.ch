<?php 
/*
* Display Featured Modules Function
*/
 
function phnewsbulletin_display_featured_module($style, $enable, $category, $show_title) {
	
	if (is_paged()) 
		return;
	
	switch ($style) {
	
	case 'style1':
			if ($enable) :
			?><div class="featured-module featured-module-style1 row">
				<?php if ($category && $show_title) : ?>
					<div class="module-title module-title-style2 col-md-12">
						<h2>
							<span><?php echo esc_html( get_cat_name( $category ) ); ?></span>
						</h2>
					</div>
				<?php endif; ?>
				<?php 
					$args = array(
						'posts_per_page' => 7,
						'ignore_sticky_posts' => 1, //Customizations to follow
					);
					if ($category) { $args['category__in'] = array($category); }
					
					$featured_module_posts = new WP_Query($args); 
						$post_counter = 1;
						while ($featured_module_posts -> have_posts()) : $featured_module_posts -> the_post();
							$post_class = ($post_counter > 3) ? 'col-md-6 col-lg-3 col-sm-6 small' : 'col-md-6 col-sm-12 col-lg-4 big'; 
						?>
					
						<div class="featured-post <?php echo esc_html($post_class) ?>"> 
							<?php $primary_category = phnewsbulletin_primary_category(); 
									if (true) :
										echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
									endif;
								?>
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
									<div class="box-shadow"></div>
								</a>
								
						</div>
						
						<?php $post_counter++;
						endwhile;
						wp_reset_postdata();
						?>
				  
			</div> <?php
			endif;
		break;
	
	case 'style2': 
		if ($enable) : ?>
			<div class="featured-module featured-module-style2 row">
				<?php if ($category && $show_title) : ?>
					<div class="module-title module-title-style2 col-md-12">
						<h2>
							<span><?php echo esc_html(get_cat_name( $category )); ?></span>
						</h2>
					</div>
				<?php endif; ?>
				<?php 
					$args = array(
						'posts_per_page' => 4,
						'ignore_sticky_posts' => 1 //Customizations to follow
					);
					if ($category) { $args['category__in'] = array($category); }
					
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
						
						<?php 
						endwhile;
						wp_reset_postdata(); ?>
				  
			</div> <?php
			endif;
		break;	
		
		
		case 'style3': 
			if ($enable) :
				?><div class="featured-module featured-module-style3 row">
					<?php if ($category && $show_title) : ?>
						<div class="module-title module-title-style2 col-md-12">
							<h2>
								<span><?php echo esc_html( get_cat_name( $category ) ); ?></span>
							</h2>
						</div>
					<?php endif; ?>
					<?php 
						$args = array(
							'posts_per_page' => 10,
							'ignore_sticky_posts' => 1, //Customizations to follow
						);
						if ($category) { $args['category__in'] = array($category); }
						
						$featured_module_posts = new WP_Query($args); 
							$post_counter = 1;
							while ($featured_module_posts->have_posts()) : $featured_module_posts->the_post();
								$post_class = ($post_counter > 3) ? 'small' : 'big';
								$thumb_size = ($post_counter > 3) ? 'thumbnail' : 'phnewsbulletin-thumbnail-4x3';
								$placeholder = ($post_counter > 3) ? 'thumbnail-square' : 'thumbnail'; //Placeholder
								if ($post_counter == 1) { $post_class = 'bigger'; $thumb_size = 'phnewsbulletin-thumbnail-4x4'; }
								if ($post_counter == 1) { $placeholder = 'thumbnail-square'; }
								?>
								
								<?php //Open Column Divs
									if ($post_counter == 1) { echo "<div class='col-lg-4 col-xl-5 col-md-12'>"; }
									if ($post_counter == 2) { echo "<div class='col-lg-4 col-xl-4 col-md-6'>"; }
									if ($post_counter == 4) { echo "<div class='col-lg-4 col-xl-3 col-md-6'>"; }
								?>	
								
								<?php if ($post_counter < 4) : ?>
									<div class="featured-post <?php echo esc_html($post_class) ?>"> 
										<?php $primary_category = phnewsbulletin_primary_category(); 
											if (true) :
												echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
											endif;
										?>
										<a href="<?php the_permalink(); ?>">
											<?php 
												if (has_post_thumbnail()):
													the_post_thumbnail( $thumb_size );
												else: ?>
													<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
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
											<div class="footer-meta">
												<?php echo $time_string; ?><?php if ($post_counter >=4 && true) {echo "<a href='".esc_url($primary_category['url'])."' class='category-text'>".esc_html($primary_category['category_name'])."</a>"; }?>
											</div>
											<div class="box-shadow"></div>
										</a>
									</div>
								<?php else : ?>
									<div class="featured-post <?php echo esc_html($post_class) ?>"> 
											<div class="featured-image col">
												<a href="<?php the_permalink(); ?>"><?php 
													if (has_post_thumbnail()):
														the_post_thumbnail( $thumb_size );
													else: ?>
														<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
													endif;	?>
												</a>
											</div>
											<div class="featured-post-info col">
												<a href="<?php the_permalink(); ?>">
													<h2 class="entry-title"><?php the_title(); ?></h2>
													</a>
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
													<div class="footer-meta">
														<a href="<?php the_permalink(); ?>"><?php echo $time_string; ?></a>
													</div>
												
											</div>
										</a>
									</div>
								<?php endif; ?>	
								<?php //Close Column Divs
									if ($post_counter == 1) { echo "</div>"; }
									if ($post_counter == 3) { echo "</div>"; }
									if ($post_counter == 10 || 
										$post_counter == $featured_module_posts->found_posts) { echo "</div>"; }
								?>	
								
								<?php $post_counter++;
							endwhile;
							wp_reset_postdata();
							?>
					  
				</div> <?php
				endif;
			break;
			
			case 'style4': 
				if ($enable) : ?>
					<div class="featured-module featured-module-style4 row">
						<?php if ($category && $show_title) : ?>
							<div class="module-title module-title-style2 col-md-12">
								<h2>
									<span><?php echo esc_html(get_cat_name( $category )); ?></span>
								</h2>
							</div>
						<?php endif; ?>
						<?php 
							$args = array(
								'posts_per_page' => 8,
								'ignore_sticky_posts' => 1 //Customizations to follow
							);
							if ($category) { $args['category__in'] = array($category); }
							
							$featured_module_posts = new WP_Query($args); 
								while ($featured_module_posts -> have_posts()) : $featured_module_posts -> the_post();
								?>
							
								<div class="featured-post col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 small"> 
									<?php $primary_category = phnewsbulletin_primary_category(); 
										if (true) :
											echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
										endif;
									?>
									<a href="<?php the_permalink(); ?>">
										<?php 
										if (has_post_thumbnail()):
											the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
										else: ?>
											<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/thumbnail.jpg"); ?>"><?php 
										endif;	?>
										<div class="featured-meta">
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
										</div>
									</a>
								</div>
								
								<?php 
								endwhile;
								wp_reset_postdata(); ?>
						  
					</div> <?php
					endif;
				break;

				
	case 'style5':
		if ($enable) :
		?><div class="featured-module featured-module-style5 row">
			<?php if ($category && $show_title) : ?>
				<div class="module-title module-title-style2 col-md-12">
					<h2>
						<span><?php echo esc_html( get_cat_name( $category ) ); ?></span>
					</h2>
				</div>
			<?php endif; ?>
			<?php 
				$args = array(
					'posts_per_page' => 5,
					'ignore_sticky_posts' => 1, //Customizations to follow
				);
				if ($category) { $args['category__in'] = array($category); }
				
				$featured_module_posts = new WP_Query($args); 
					$post_counter = 1;
					while ($featured_module_posts -> have_posts()) : $featured_module_posts -> the_post();
						$post_class = ($post_counter > 1) ? 'col-md-6 col-lg-3 col-sm-6 small' : 'col-md-12 col-sm-12 col-lg-12 big'; 
					?>
				
					<div class="featured-post <?php echo esc_html($post_class) ?>"> 
						<?php $primary_category = phnewsbulletin_primary_category(); 
								if (true) :
									echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
								endif;
							?>
							<a href="<?php the_permalink(); ?>">
								<?php 
									if (has_post_thumbnail()):
										the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
									else: ?>
										<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/thumbnail.jpg"); ?>"><?php 
									endif;	?>
							<div class="title-wrapper">
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
								<div class="box-shadow"></div>
								</div>
							</a>
							
							
					</div>
					
					<?php $post_counter++;
					endwhile;
					wp_reset_postdata();
					?>
			  
		</div> <?php
		endif;
	break;

	case 'style6': 
		if ($enable) :
			?><div class="featured-module featured-module-style6 row">
				<?php if ($category && $show_title) : ?>
					<div class="module-title module-title-style2 cat-title col-md-12">
						<h2>
							<span><?php echo esc_html( get_cat_name( $category ) ); ?></span>
						</h2>
					</div>
				<?php endif; ?>
				<?php 
					$args = array(
						'posts_per_page' =>9,
						'ignore_sticky_posts' => 1, //Customizations to follow
					);
					if ($category) { $args['category__in'] = array($category); }
					
					$featured_module_posts = new WP_Query($args); 
						$post_counter = 1;
						while ($featured_module_posts->have_posts()) : $featured_module_posts->the_post();
							$post_class = ($post_counter > 2) ? 'small' : 'big';
							$thumb_size = ($post_counter > 2) ? 'thumbnail' : 'phnewsbulletinpro-thumbnail-4x3';
							$placeholder = ($post_counter > 2) ? 'thumbnail-square' : 'thumbnail'; //Placeholder
							if ($post_counter < 3) { $post_class = 'bigger'; $thumb_size = 'phnewsbulletinpro-thumbnail-4x4'; }
							if ($post_counter < 3) { $placeholder = 'thumbnail-square'; }
							?>
							
							<?php //Open Column Divs
								if ($post_counter == 1) { echo "<div class='col-lg-4 col-xl-4 col-md-12'>"; }
								if ($post_counter == 2) { echo "<div class='col-lg-4 col-xl-4 col-md-6'>"; }
								if ($post_counter == 3) { echo "<div class='col-lg-4 col-xl-4 col-md-6'>"; }
								if ($post_counter == 7) { echo "<div class='col-lg-4 col-xl-4 col-md-12'>"; }
								if ($post_counter == 8) { echo "<div class='col-lg-4 col-xl-4 col-md-12'>"; }
								if ($post_counter == 9) { echo "<div class='col-lg-4 col-xl-4 col-md-12'>"; }
							?>	
							
							<?php if ($post_counter < 3) : ?>
								<div class="featured-post <?php echo esc_html($post_class) ?>"> 
									<?php $primary_category = phnewsbulletin_primary_category(); 
										if (true) :
											echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
										endif;
									?>
									<a href="<?php the_permalink(); ?>">
									<figure class="figure">
										<?php 
											if (has_post_thumbnail()):
												the_post_thumbnail( $thumb_size );
											else: ?>
												<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
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
										<div class="footer-meta">
											<?php echo $time_string; ?>
										</div>
										<div class="box-shadow"></div>
									</a>
								</div>
							<?php else : ?>
								<div class="featured-post <?php echo esc_html($post_class) ?>"> 
										<div class="featured-image col">
											<a href="<?php the_permalink(); ?>"><?php 
												if (has_post_thumbnail()):
													the_post_thumbnail( $thumb_size );
												else: ?>
													<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
												endif;	?>
											</a>
										</div>
										<div class="featured-post-info col">
											<a href="<?php the_permalink(); ?>">
												<h2 class="entry-title"><?php the_title(); ?></h2>
												</a>
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
												<div class="footer-meta">
													<a href="<?php the_permalink(); ?>"><?php echo $time_string; ?></a>
												</div>
											
										</div>
									</a>
								</div>
							<?php endif; ?>	
							<?php //Close Column Divs
								if ($post_counter == 1) { echo "</div>"; }
								if ($post_counter == 2) { echo "</div>"; }
								if ($post_counter == 6) { echo "</div>"; }
								if ($post_counter == 7) { echo "</div>"; }
								if ($post_counter == 8) { echo "</div>"; }
								if ($post_counter == 9 || 
									$post_counter == $featured_module_posts->found_posts) { echo "</div>"; }
							?>	
							
							<?php $post_counter++;
						endwhile;
						wp_reset_postdata();
						?>
				  
			</div> <?php
			endif;
		break;

		case 'style7': 
			if ($enable) :
				?><div class="featured-module featured-module-style7 row">
					<?php if ($category && $show_title) : ?>
						<div class="module-title module-title-style2 col-md-12">
							<h2>
								<span><?php echo esc_html( get_cat_name( $category ) ); ?></span>
							</h2>
						</div>
					<?php endif; ?>
					<?php 
						$args = array(
							'posts_per_page' => 3,
							'ignore_sticky_posts' => 1, //Customizations to follow
						);
						if ($category) { $args['category__in'] = array($category); }
						
						$featured_module_posts = new WP_Query($args); 
							$post_counter = 1;
							while ($featured_module_posts->have_posts()) : $featured_module_posts->the_post();
								$post_class = ($post_counter > 3) ? 'small' : 'big';
								$thumb_size = ($post_counter > 3) ? 'thumbnail' : 'phnewsbulletin-thumbnail-4x3';
								$placeholder = ($post_counter > 3) ? 'thumbnail-square' : 'thumbnail'; //Placeholder
								if ($post_counter == 1) { $post_class = 'bigger'; $thumb_size = 'phnewsbulletin-thumbnail-4x4'; }
								if ($post_counter == 1) { $placeholder = 'thumbnail-square'; }
								?>
								
								<?php //Open Column Divs
									if ($post_counter == 1) { echo "<div class='col-lg-8 col-xl-8 col-md-12'>"; }
									if ($post_counter == 2) { echo "<div class='col-lg-4 col-xl-4 col-md-12'>"; }
								?>	
								
								<?php if ($post_counter < 4) : ?>
									<div class="featured-post <?php echo esc_html($post_class) ?>"> 
										<?php $primary_category = phnewsbulletin_primary_category(); 
											if (true) :
												echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
											endif;
										?>
										<a href="<?php the_permalink(); ?>">
											<?php 
												if (has_post_thumbnail()):
													the_post_thumbnail( $thumb_size );
												else: ?>
													<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
												endif;	?>
										<div class="post-info">
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
											<div class="footer-meta">
												<?php echo $time_string; ?><?php if ($post_counter >=4 && true) {echo "<a href='".esc_url($primary_category['url'])."' class='category-text'>".esc_html($primary_category['category_name'])."</a>"; }?>
											</div>
											<div class="box-shadow"></div>
										</a>
										</div>
									</div>
								<?php else : ?>
									<div class="featured-post <?php echo esc_html($post_class) ?>"> 
											<div class="featured-image col">
												<a href="<?php the_permalink(); ?>"><?php 
													if (has_post_thumbnail()):
														the_post_thumbnail( $thumb_size );
													else: ?>
														<img src="<?php echo esc_url(get_template_directory_uri()."/design-files/images/".$placeholder.".jpg"); ?>"><?php 
													endif;	?>
												</a>
											</div>
											<div class="featured-post-info col">
												<a href="<?php the_permalink(); ?>">
													<h2 class="entry-title"><?php the_title(); ?></h2>
													</a>
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
													<div class="footer-meta">
														<a href="<?php the_permalink(); ?>"><?php echo $time_string; ?></a>
													</div>
												
											</div>
										</a>
									</div>
								<?php endif; ?>	
								<?php //Close Column Divs
									if ($post_counter == 1) { echo "</div>"; }
									if ($post_counter == 3 || 
										$post_counter == $featured_module_posts->found_posts) { echo "</div>"; }
								?>	
								
								<?php $post_counter++;
							endwhile;
							wp_reset_postdata();
							?>
					  
				</div> <?php
				endif;
			break;

			
	}//end switch
}