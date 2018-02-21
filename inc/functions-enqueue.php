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
    wp_enqueue_style( 'designr', get_template_directory_uri() . '/assets/css/designr.css', array(), DESIGNR_VERSION );
    
    // Scripts
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-header', get_template_directory_uri() . '/assets/js/designr-header.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-resize', get_template_directory_uri() . '/assets/js/designr-resize.js', array('jquery','masonry'), DESIGNR_VERSION, true );
    
    // _s
    wp_enqueue_script( 'designr-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), DESIGNR_VERSION, true );

    // Localization Data
    $designrJS = array(
        'style_a_collapse_height'       => get_theme_mod( 'style_a_collapse_height', 50 ) . 'px',
        'style_a_expand_height'         => get_theme_mod( 'style_a_expand_height', 75 ) . 'px'
    );
    
    // Localizations
    wp_localize_script( 'designr-header', 'designrLocalized', $designrJS );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'designr_scripts' );