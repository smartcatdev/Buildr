<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Designr
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    
    <head>
        
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
        
    </head>

    <body <?php body_class(); ?>>
        
        <div id="page" class="site">
            
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'designr' ); ?></a>

            <?php get_template_part( 'template-parts/navbar', get_theme_mod( DESIGNR_OPTIONS::NAVBAR_STYLE, DESIGNR_DEFAULTS::NAVBAR_STYLE ) ); ?>
            
            <?php if ( class_exists('WooCommerce') && get_theme_mod( DESIGNR_OPTIONS::WOO_SLIDE_CART_TOGGLE, DESIGNR_DEFAULTS::WOO_SLIDE_CART_TOGGLE ) ) { get_template_part( 'template-parts/cart-slide_in' ); } ?>
            
            <div id="content" class="site-content">

                <?php do_action( 'designr_custom_header' ); ?>