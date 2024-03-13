<?php if (!get_theme_mod('phnewsbulletin-scrl-to-top-set')) : ?>
<button class="backToTopBtn">
  <img id="scroll" src="<?php echo esc_url( get_template_directory_uri(). '/design-files/images/arrow-up.png');?>"?>
</button>
<?php endif;?>

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<?php _e('© ','ph-news-bulletin'); ?> <?php echo esc_html(get_bloginfo('name'));?> <?php echo esc_html(date('Y'));?>
		<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Designed by %1$s.', 'ph-news-bulletin' ), '<a rel="nofollow" href="https://pixahive.com/">PixaHive.com</a>' );
			?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->