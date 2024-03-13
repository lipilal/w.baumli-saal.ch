<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phnewsbulletin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row blog-style5'); ?>>

<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

	<div class="entry-meta">
				<?php
				phnewsbulletin_posted_on();
				phnewsbulletin_posted_by();
			?>
	</div><!-- .entry-meta -->

	<div class="category">
			<?php
		$primary_category = phnewsbulletin_primary_category(); 
			if (true) :
				echo "<a href='".esc_url($primary_category['url'])."' class='category-ribbon'>".esc_html($primary_category['category_name'])."</a>";	
			endif;?>
	</div>
	

	<div class="thumbnail col-md-12 col-lg-12">
		<figure>
		<a href="<?php the_permalink(); ?>"><?php 
		if (has_post_thumbnail()):
			the_post_thumbnail( 'phnewsbulletin-thumbnail-4x3' );
		else: ?>
			<img src="<?php echo esc_url( get_template_directory_uri()."/design-files/images/thumbnail.jpg" ); ?>"><?php 
		endif;	?></a>
		</figure>
	</div>
	
	<div class="post-details col-md-12 col-lg-12">
		<div class="entry-excerpt">
		<?php
		$content = get_the_content();
		$read_more_text = __('Read more', 'ph-news-bulletin'); // Replace 'your_text_domain' with your actual text domain

		$trimmed_content = wp_trim_words($content, 20, ' <a href="' . esc_url(get_permalink()) . '"><button class="read-more">' . $read_more_text . '</button></a>');
		?>
		<p><?php echo wp_kses_post($trimmed_content); ?></p>

		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
