<?php

/**
 * Enqueue scripts and styles.
 */
function designr_scripts() {
    wp_enqueue_style( 'designr-style', get_stylesheet_uri() );

    wp_enqueue_script( 'designr-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array (), '20151215', true );

    wp_enqueue_script( 'designr-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array (), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'designr_scripts' );