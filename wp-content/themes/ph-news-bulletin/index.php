<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package phnewsbulletin
 */

get_header();
?>

	<main id="primary" class="site-main <?php do_action('phnewsbulletin_primary_width_class') ?>">
		<?php
		if ( have_posts() ) :

			if ( is_home() ) :
				?>
				<header class="page-title homepage-title module-title">
					<h2><span><?php echo esc_html( get_theme_mod('phnewsbulletin-latest-post-title', __('Latest Posts','ph-news-bulletin') )); ?></span></h2>
				</header>
				<?php
			endif;

			/* Start the Loop */
			do_action( 'phnewsbulletin_before_loop' );
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				do_action('phnewsbulletin_blog_layout'); 

			endwhile;
			do_action( 'phnewsbulletin_after_loop' );

			the_posts_pagination( apply_filters( 'phnewsbulletin_posts_pagination_args', array(
				'class'	=>	'phnewsbulletin-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();  
