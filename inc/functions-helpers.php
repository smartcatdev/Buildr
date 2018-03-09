<?php

/**
 * Retrieve all color theme mods in use and return them as an associative array
 * 
 * @since 1.0.0
 * @return array of hex colors
 */
function designr_get_all_theme_colors() {
    
    $theme_colors = array();
    
    /**
     * The following colors are from dropdown SELECTs, and each one
     * needs the # symbol prepended on the frontend.
     */
    
    $theme_colors['navbar_bg']  = get_theme_mod( 'navbar_background', '#141414' );
    $theme_colors['navbar_fg']  = get_theme_mod( 'navbar_foreground', '#ffffff' );
    
    $theme_colors['footer_bg']  = get_theme_mod( 'footer_background', '#141414' );
    $theme_colors['footer_fg']  = get_theme_mod( 'footer_foreground', '#ffffff' );
    
    $theme_colors['primary']    = get_theme_mod( 'skin_theme_primary', '#f04265' );
    $theme_colors['secondary']  = get_theme_mod( 'skin_theme_secondary', '#d60059' );
    
    /**
     * The following colors are from color pickers, and each needs to have
     * the # symbol included in the value. Do not prepend these with # on the frontend!
     */
    
    $theme_colors['social_bg']              = get_theme_mod( 'navbar_social_drawer_background', '#141414' );
    $theme_colors['social_fg']              = get_theme_mod( 'navbar_social_link_foreground', '#FFFFFF' );
    $theme_colors['social_fg_hov']          = get_theme_mod( 'navbar_social_link_foreground_hover', '#0000FF' );
    $theme_colors['custom_header_title']    = get_theme_mod( 'custom_header_title_color', '#FFFFFF' );
    $theme_colors['custom_header_menu']     = get_theme_mod( 'custom_header_menu_color', '#FFFFFF' );
    
    $theme_colors['plx_overlay_single']     = get_theme_mod( 'parallax_layers_single_color', '#348aa7' );
    $theme_colors['plx_overlay_grad_start'] = get_theme_mod( 'parallax_layers_gradient_start_color', '#348aa7' );
    $theme_colors['plx_overlay_grad_end']   = get_theme_mod( 'parallax_layers_gradient_end_color', '#348aa7' );
   
    $theme_colors['footer_widget_title']    = get_theme_mod( 'prefooter_widget_title_color', '#FFFFFF' );
 
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

/**
 * Hex to rgb(a) converter function.
 * 
 * @since 1.0.0
 * @param string $color hex value.
 * @param decimal $opacity optional opacity decimal.
 * @return string rgba(a) value
 */
function designr_hex2rgba( $color, $opacity = false ) {

    $default = 'rgb(0,0,0)';

    // Return default if no color provided
    if ( empty( $color ) ) { return $default; }

    // Sanitize $color if "#" is provided
    if ( $color[0] == '#' ) { $color = substr( $color, 1 ); }

    // Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if( $opacity ) {

        if( abs( $opacity ) > 1 ) { $opacity = 1.0; }
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

    } else {

        $output = 'rgb('.implode(",",$rgb).')';

    }

    // Return rgb(a) color string
    return $output;

}

/**
 * Retrieves the parallax preset (Layers) or parallax value (Vertical)
 * for the currently selected Custom Header template.
 * 
 * @since 1.0.0
 * @param string $style key to identify what to return.
 * @return either an associative array of percentages (Layers) or a single integer value (Vertical)
 */
function designr_get_parallax_preset( $style = 'layers' ) {

    switch ( get_theme_mod( 'parallax_layers_parallax_style', 'default' ) ) :
        
        case 'subtle' :
            $parallax_preset = array(
                'image_layer' => '20%',
                'texture_layer' => '4%',
                'color_layer' => '15%',
                'content_layer' => '0'
            );
            $parallax_value = 5;
            break;
        
        case 'high' :
            $parallax_preset = array(
                'image_layer' => '75%',
                'texture_layer' => '20%',
                'color_layer' => '60%',
                'content_layer' => '0'
            );
            $parallax_value = 2;
            break;
        
        default :
            $parallax_preset = array(
                'image_layer' => '50%',
                'texture_layer' => '10%',
                'color_layer' => '50%',
                'content_layer' => '0'
            );
            $parallax_value = 3;
        
    endswitch;
    
    return $style == 'vertical' ? $parallax_value : $parallax_preset ;

}
