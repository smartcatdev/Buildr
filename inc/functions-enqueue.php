<?php

/**
 * Enqueue scripts and styles.
 */
function designr_scripts() {
    
    wp_enqueue_style( 'designr-style', get_stylesheet_uri() );

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), DESIGNR_VERSION );
    wp_enqueue_style( 'designr', get_template_directory_uri() . '/assets/css/designr.css', array(), DESIGNR_VERSION );
    
    // Scripts
    wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr', get_template_directory_uri() . '/assets/js/designr.js', array('jquery'), DESIGNR_VERSION, true );
    
    // _s
    wp_enqueue_script( 'designr-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), DESIGNR_VERSION, true );
    wp_enqueue_script( 'designr-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), DESIGNR_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'designr_scripts' );