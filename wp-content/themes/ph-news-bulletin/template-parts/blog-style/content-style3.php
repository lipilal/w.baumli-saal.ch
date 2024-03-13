<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phnewsbulletin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-style3 col-md-6 col-md-6 col-lg-4 col-xl-4'); ?>>
<div class="blog-layout">
	<div class="thumbnail col-md-12">
		<?php $primary_category = phnewsbulletin_primary_category(); 
			if (true) :
				echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
			endif;
		?>
		<a href="<?php the_permalink(); ?>"><?php 
		if (has_post_thumbnail()):
			the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
		endif;	?></a>
		
	</div>
	
	<div class="post-details col-md-12">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		
		<div class="entry-meta">
			<?php
			phnewsbulletin_posted_on();
			phnewsbulletin_posted_by();
			?>
		</div><!-- .entry-meta -->
			
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

