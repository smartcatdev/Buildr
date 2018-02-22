<?php

/**
 * Retrieve all color theme mods in use and return them as an associative array
 * 
 * @since 1.0.0
 * @return array of hex colors
 */
function designr_get_all_theme_colors() {
    
    $theme_colors = array();
    
    $theme_colors['navbar_bg']  = get_theme_mod( 'navbar_background', '#141414' );
    $theme_colors['navbar_fg']  = get_theme_mod( 'navbar_foreground', '#ffffff' );
    
    $theme_colors['footer_bg']  = get_theme_mod( 'footer_background', '#141414' );
    $theme_colors['footer_fg']  = get_theme_mod( 'footer_foreground', '#ffffff' );
    
    $theme_colors['primary']    = get_theme_mod( 'skin_theme_primary', '#0000FF' );
    $theme_colors['secondary']  = get_theme_mod( 'skin_theme_secondary', '#00FF00' );
 
    return $theme_colors;
    
}

/**
 * Retrieve all icons or a specific subset
 * 
 * @since 1.0.0
 * @return array of Font Awesome 5 icons
 */
function designr_get_icons( $subset = null ) {
    
    $icons = array(
        'fa-facebook-f'     => __( 'Facebook', 'designr' ),
        'fa-twitter'        => __( 'Twitter', 'designr' ),
        'fa-soundcloud'     => __( 'SoundCloud', 'designr' ),
        'fa-instagram'      => __( 'Instagram', 'designr' ),
    );
    
    return $icons;
    
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @since 1.0.0
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function designr_add_excerpt_more_link( $more ) {
    return sprintf( '… <a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        get_theme_mod( 'blog_layout_read_more_text', __( 'Read more', 'designr' ) )
    );
}
add_filter( 'excerpt_more', 'designr_add_excerpt_more_link' );

/**
 * Filter the excerpt length to a user-defined number words.
 *
 * @since 1.0.0
 * @param int $length Excerpt length.
 * @return int modified excerpt length.
 */
function designr_custom_auto_excerpt_length( $length ) {
    return get_theme_mod( 'blog_layout_excerpt_trim_words', 30 );
}
add_filter( 'excerpt_length', 'designr_custom_auto_excerpt_length', 999 );