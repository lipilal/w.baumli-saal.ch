<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package phnewsbulletin
 */

?>
	<?php do_action('phnewsbulletin_before_footer'); ?>
	<?php get_template_part( 'template-parts/footer/footer-featured-area'); ?>
	<?php get_template_part( 'template-parts/footer/footer-widgets'); ?>
	<?php get_template_part( 'template-parts/footer/colophon'); ?>
	<?php do_action('phnewsbulletin_after_footer'); ?>
</div><!-- #page -->

<?php get_template_part( 'template-parts/header-mobile/sidr' ); ?>
<?php wp_footer(); ?>

</body>
</html>
