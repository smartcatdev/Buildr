<?php

/**
 * Enqueue scripts and styles.
 */
function designr_scripts() {
    
    wp_enqueue_style( 'designr-style', get_stylesheet_uri() );

    // Fonts
    $fonts = designr_fonts();
    if ( get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) == get_theme_mod( BUILDR_OPTIONS::FONT_SECONDARY, BUILDR_DEFAULTS::FONT_SECONDARY ) ) :
        // Fonts are the same, enqueue once
        wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ] ), array(), BUILDR_VERSION ); 
    else :
        // Fonts are different, enqueue together
        wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( BUILDR_OPTIONS::FONT_PRIMARY, BUILDR_DEFAULTS::FONT_PRIMARY ) ] . '|' . $fonts[ get_theme_mod( BUILDR_OPTIONS::FONT_SECONDARY, BUILDR_DEFAULTS::FONT_SECONDARY ) ] ), array(), BUILDR_VERSION ); 
    endif;

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), BUILDR_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), BUILDR_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/lib/animate/animate.css', array(), BUILDR_VERSION );
    wp_enqueue_style( 'designr-util', get_template_directory_uri() . '/assets/css/util.css', array(), BUILDR_VERSION );
    wp_enqueue_style( 'buildr', get_template_directory_uri() . '/assets/css/designr.css', array(), BUILDR_VERSION );
    if ( class_exists( 'woocommerce' ) ) :
        wp_enqueue_style( 'designr-wc', get_template_directory_uri() . '/assets/css/designr-woocommerce.css', array(), BUILDR_VERSION );
    endif;
    
    // Scripts
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'lettering', get_template_directory_uri() . '/assets/lib/lettering/jquery.lettering.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'textillate', get_template_directory_uri() . '/assets/lib/textillate/jquery.textillate.js', array('jquery','lettering'), BUILDR_VERSION, true );
    wp_enqueue_script( 'ease-scroll', get_template_directory_uri() . '/assets/lib/ease-scroll/jquery.easeScroll.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'big-slide', get_template_directory_uri() . '/assets/lib/big-slide/bigSlide.min.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'slim-scroll', get_template_directory_uri() . '/assets/lib/slim-scroll/jquery.slimscroll.min.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/assets/lib/jquery-parallax/jquery.parallax.js', array('jquery'), BUILDR_VERSION, false );
    wp_enqueue_script( 'designr-parallax', get_template_directory_uri() . '/assets/lib/designr-parallax/parallax.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'designr-general', get_template_directory_uri() . '/assets/js/designr-general.js', array('jquery'), BUILDR_VERSION, true );
    wp_enqueue_script( 'designr-header', get_template_directory_uri() . '/assets/js/designr-header.js', array('jquery'), BUILDR_VERSION, false );
    wp_enqueue_script( 'designr-resize', get_template_directory_uri() . '/assets/js/designr-resize.js', array('jquery','masonry'), BUILDR_VERSION, true );
    
    // _s
    wp_enqueue_script( 'designr-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), BUILDR_VERSION, true );
    wp_enqueue_script( 'designr-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), BUILDR_VERSION, true );

    // Localization Data
    $parallax_preset = designr_get_parallax_preset();
    $designr_header_JS = array(
        'parallax_image_layer'          => $parallax_preset['image_layer'],
        'parallax_texture_layer'        => $parallax_preset['texture_layer'],
        'parallax_color_layer'          => $parallax_preset['color_layer'],
        'parallax_content_layer'        => $parallax_preset['content_layer'],
    );
    $designr_parallax_JS = array(
        'intensity_value'   => designr_get_parallax_preset('vertical')
    );
    
    // Localizations
    wp_localize_script( 'designr-header', 'designr_local', $designr_header_JS );
    wp_localize_script( 'designr-parallax', 'designr_local_parallax', $designr_parallax_JS );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'designr_scripts' );