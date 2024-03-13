<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pixanewscenter
 */

 if ( phnewsbulletin_sidebar_setting() == 'no-sidebar' ) {
	 $post_class = " col-md-6"; 
 }
 else { 
	 $post_class = ""; 
 }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row blog-style4'.$post_class); ?>>
<div class="thumbnail col-3 col-sm-3 col-md-3 col-lg-2">
	
	<a href="<?php the_permalink(); ?>"><?php 
	if (has_post_thumbnail()):
		the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
	else: ?>
		<img src="<?php echo esc_url( get_template_directory_uri()."/design-files/images/thumbnail.jpg" ); ?>"><?php 
	endif;	?></a>
	
</div>

<div class="post-details col-9 col-sm-9 col-md-9 col-lg-10">
	
	<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<?php $primary_category = phnewsbulletin_primary_category(); 
		if (true) :
			echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
		endif;
	?>
	
</div>
</article><!-- #post-<?php the_ID(); ?> -->