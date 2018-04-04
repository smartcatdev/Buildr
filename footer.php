<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Designr
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer', get_theme_mod( DESIGNR_OPTIONS::FOOTER_STYLE, DESIGNR_DEFAULTS::FOOTER_STYLE ) ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
