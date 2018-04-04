<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
  <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Designr
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses designr_header_style()
 */
function designr_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'designr_custom_header_args', array (
        'default-image' => '',
        'header-text'  => false,
        'flex-height' => true,
        'uploads'   => true,
        'width'     => 1200,
        'height'    => 700,
    ) ) );
}
add_action( 'after_setup_theme', 'designr_custom_header_setup' );

/**
 * Creates header using images from Custom Header
 * @param string $details Extra info to print into header
 */
add_action( 'designr_custom_header', 'designr_render_custom_header' );
function designr_render_custom_header() { 

    if ( has_header_image() ) :

        get_template_part( 'template-parts/custom-header', get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_STYLE_TOGGLE, DESIGNR_DEFAULTS::CUSTOM_HEADER_STYLE_TOGGLE ) );
            
    endif;
    
}