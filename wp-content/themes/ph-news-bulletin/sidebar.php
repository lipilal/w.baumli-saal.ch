<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phnewsbulletin
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area <?php do_action('phnewsbulletin_secondary_width_class'); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); 
	
if(get_theme_mod('phnewsbulletin-sidebar-featured-posts_set')):?>
<div class="featured-post-widget">
  <h3 class="fp-sidebar-title"><?php esc_html('Featured Posts','Featured Posts')?></h3>

  <div class="row featured-sidebar-row">
	<?php
	$featured_post_sidebar_args = array(
		'posts_per_page' => 4,
		'ignore_sticky_posts' => 1, //Customizations to follow
 	);

  $featured_post_sidebar = new WP_Query($featured_post_sidebar_args);

  if ($featured_post_sidebar->have_posts()) {
    while ($featured_post_sidebar->have_posts()) {
      $featured_post_sidebar->the_post();
      ?>
	  
      <div class="sidebar-thumbnail-wrapper col-md-4 col-lg-4 col-xl-4">
      <?php
         if (has_post_thumbnail()) :
           the_post_thumbnail();
             else : ?>                              
        <img src="<?php echo esc_url(get_template_directory_uri() . "/design-files/images/thumbnail.jpg"); ?>"><?php 
        endif;?>
	  </div>
       <div class="sidebar-post-info-wrapper col-md-8 col-lg-8 col-xl-8">
			<a href="<?php the_permalink(); ?>">
				<?php the_title('<h4 class="sidebar-title">', '</h4>'); ?>
			</a>
			<div class="entry-meta">
					<?php phnewsbulletin_posted_on();?>
			</div><!-- .entry-meta -->
		</div><!--idebar-post-info-wrapper-->
    <?php
    }
  }
  wp_reset_postdata();
  ?>
</div>
</div><!--row-->
</div><!--featured-post-widge-->
<?php endif;?>
</aside><!-- #secondary -->
