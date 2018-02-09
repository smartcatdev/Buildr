<?php


// Adds custom classes to the array of body classes.
add_filter( 'body_class', 'designr_body_classes' );

// Add a pingback url auto-discovery header for singularly identifiable articles.
add_action( 'wp_head', 'designr_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 * 
 * @param array $classes Classes for the body element.
 * @return array
 */
function designr_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    return $classes;
}


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function designr_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
