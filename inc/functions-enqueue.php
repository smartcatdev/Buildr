<?php

/**
 * Enqueue scripts and styles.
 */
function designr_scripts() {
    
    wp_enqueue_style( 'designr-style', get_stylesheet_uri() );

    // Fonts
    $fonts = designr_fonts();
    if ( get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) == get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ) :
        // Fonts are the same, enqueue once
        wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ] ), array(), DESIGNR_VERSION ); 
    else :
        // Fonts are different, enqueue together
        wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( 'primary_font', 'Montserrat, sans-serif' ) ] . '|' . $fonts[ get_theme_mod( 'secondary_font', 'Abel, sans-serif' ) ] ), array(), DESIGNR_VERSION ); 
    endif;

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/lib/animate/animate.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'designr-util', get_template_directory_uri() . '/assets/css/util.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'designr', get_template_directory_uri() . '/assets/css/designr.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'designr-wc', get_template_directory_uri() . '/assets/css/designr-woocommerce.css', array(), DESIGNR_VERSION );
    
    // Scripts
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'lettering', get_template_directory_uri() . '/assets/lib/lettering/jquery.lettering.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'textillate', get_template_directory_uri() . '/assets/lib/textillate/jquery.textillate.js', array('jquery','lettering'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'ease-scroll', get_template_directory_uri() . '/assets/lib/ease-scroll/jquery.easeScroll.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'big-slide', get_template_directory_uri() . '/assets/lib/big-slide/bigSlide.min.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'slim-scroll', get_template_directory_uri() . '/assets/lib/slim-scroll/jquery.slimscroll.min.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/assets/lib/jquery-parallax/jquery.parallax.js', array('jquery'), DESIGNR_VERSION, false );
    wp_enqueue_script( 'designr-parallax', get_template_directory_uri() . '/assets/lib/designr-parallax/parallax.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-general', get_template_directory_uri() . '/assets/js/designr-general.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-header', get_template_directory_uri() . '/assets/js/designr-header.js', array('jquery'), DESIGNR_VERSION, false );
    wp_enqueue_script( 'designr-resize', get_template_directory_uri() . '/assets/js/designr-resize.js', array('jquery','masonry'), DESIGNR_VERSION, true );
    
    // _s
    wp_enqueue_script( 'designr-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), DESIGNR_VERSION, true );

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