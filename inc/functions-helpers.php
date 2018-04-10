<?php

/**
 * Retrieve all color theme mods in use and return them as an associative array
 * 
 * @since 1.0.0
 * @return array of hex colors
 */
function designr_get_all_theme_colors() {
    
    $theme_colors = array();
    
    $theme_colors['navbar_bg']              = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_BG_COLOR, DESIGNR_DEFAULTS::NAVBAR_BG_COLOR );
    $theme_colors['navbar_fg']              = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_FG_COLOR, DESIGNR_DEFAULTS::NAVBAR_FG_COLOR );
    
    $theme_colors['navbar_menu_bg']         = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_MENU_BG_COLOR, DESIGNR_DEFAULTS::NAVBAR_MENU_BG_COLOR );
    $theme_colors['navbar_menu_fg']         = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_MENU_FG_COLOR, DESIGNR_DEFAULTS::NAVBAR_MENU_FG_COLOR );
    
    $theme_colors['prefooter_bg']           = get_theme_mod( DESIGNR_OPTIONS::PRE_FOOTER_BG_COLOR, DESIGNR_DEFAULTS::PRE_FOOTER_BG_COLOR );
    $theme_colors['prefooter_fg']           = get_theme_mod( DESIGNR_OPTIONS::PRE_FOOTER_FG_COLOR, DESIGNR_DEFAULTS::PRE_FOOTER_FG_COLOR );
    
    $theme_colors['footer_bg']              = get_theme_mod( DESIGNR_OPTIONS::FOOTER_BG_COLOR, DESIGNR_DEFAULTS::FOOTER_BG_COLOR );
    $theme_colors['footer_fg']              = get_theme_mod( DESIGNR_OPTIONS::FOOTER_FG_COLOR, DESIGNR_DEFAULTS::FOOTER_FG_COLOR );
    
    $theme_colors['primary']                = get_theme_mod( DESIGNR_OPTIONS::COLOR_SKIN_PRIMARY, DESIGNR_DEFAULTS::COLOR_SKIN_PRIMARY );
    $theme_colors['secondary']              = get_theme_mod( DESIGNR_OPTIONS::COLOR_SKIN_SECONDARY, DESIGNR_DEFAULTS::COLOR_SKIN_SECONDARY );
    
    $theme_colors['social_bg']              = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SOCIAL_BG_COLOR, DESIGNR_DEFAULTS::NAVBAR_SOCIAL_BG_COLOR );
    $theme_colors['social_fg']              = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SOCIAL_FG_COLOR, DESIGNR_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR );
    $theme_colors['social_fg_hov']          = get_theme_mod( DESIGNR_OPTIONS::NAVBAR_SOCIAL_FG_COLOR_HOVER, DESIGNR_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR_HOVER );
    $theme_colors['custom_header_title']    = get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_COLOR, DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_COLOR );
    $theme_colors['custom_header_menu']     = get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_COLOR, DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_COLOR );
    
    $theme_colors['cart_tab']               = get_theme_mod( DESIGNR_OPTIONS::WOO_SLIDE_CART_TAB_COLOR, DESIGNR_DEFAULTS::WOO_SLIDE_CART_TAB_COLOR );
    
    $theme_colors['plx_overlay_single']     = get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_COLOR, DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_COLOR );
    $theme_colors['plx_overlay_grad_start'] = get_theme_mod( DESIGNR_OPTIONS::GRADIENT_START_COLOR, DESIGNR_DEFAULTS::GRADIENT_START_COLOR );
    $theme_colors['plx_overlay_grad_end']   = get_theme_mod( DESIGNR_OPTIONS::GRADIENT_END_COLOR, DESIGNR_DEFAULTS::GRADIENT_END_COLOR );
   
    $theme_colors['footer_widget_title']    = get_theme_mod( DESIGNR_OPTIONS::PRE_FOOTER_WIDGET_TITLE_COLOR, DESIGNR_DEFAULTS::PRE_FOOTER_WIDGET_TITLE_COLOR );
 
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
        'fa-app-store'      => __( 'App Store', 'designr' ),
        'fa-apple'          => __( 'Apple', 'designr' ),
        'fa-bandcamp'       => __( 'Bandcamp', 'designr' ),
        'fa-behance'        => __( 'Behance', 'designr' ),
        'fa-codepen'        => __( 'CodePen', 'designr' ),
        'fa-discord'        => __( 'Discord', 'designr' ),
        'fa-dribbble'       => __( 'Dribbble', 'designr' ),
        'fa-etsy'           => __( 'Etsy', 'designr' ),
        'fa-facebook-f'     => __( 'Facebook', 'designr' ),
        'fa-git'            => __( 'Git', 'designr' ),
        'fa-github'         => __( 'GitHub', 'designr' ),
        'fa-google-play'    => __( 'Google Play', 'designr' ),
        'fa-google-plus-g'  => __( 'Google+', 'designr' ),
        'fa-imdb'           => __( 'IMDb', 'designr' ),
        'fa-instagram'      => __( 'Instagram', 'designr' ),
        'fa-itunes-note'    => __( 'iTunes', 'designr' ),
        'fa-kickstarter-k'  => __( 'Kickstarter', 'designr' ),
        'fa-lastfm'         => __( 'Last.fm', 'designr' ),
        'fa-linkedin-in'    => __( 'LinkedIn', 'designr' ),
        'fa-medium-m'       => __( 'Medium', 'designr' ),
        'fa-microsoft'      => __( 'Microsoft', 'designr' ),
        'fa-mixcloud'       => __( 'Mixcloud', 'designr' ),
        'fa-patreon'        => __( 'Patreon', 'designr' ),
        'fa-pinterest-p'    => __( 'Pinterest', 'designr' ),
        'fa-playstation'    => __( 'PlayStation', 'designr' ),
        'fa-reddit-alien'   => __( 'Reddit', 'designr' ),
        'fa-slack-hash'     => __( 'Slack', 'designr' ),
        'fa-snapchat-ghost' => __( 'Snapchat', 'designr' ),
        'fa-soundcloud'     => __( 'SoundCloud', 'designr' ),
        'fa-spotify'        => __( 'Spotify', 'designr' ),
        'fa-steam'          => __( 'Steam', 'designr' ),
        'fa-stumbleupon'    => __( 'StumbleUpon', 'designr' ),
        'fa-tumblr'         => __( 'Tumblr', 'designr' ),
        'fa-twitch'         => __( 'Twitch', 'designr' ),
        'fa-twitter'        => __( 'Twitter', 'designr' ),
        'fa-vimeo'          => __( 'Vimeo', 'designr' ),
        'fa-vimeo'          => __( 'Vimeo', 'designr' ),
        'fa-xbox'           => __( 'Xbox', 'designr' ),
        'fa-yelp'           => __( 'Yelp', 'designr' ),
        'fa-youtube'        => __( 'YouTube', 'designr' ),
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
//    
//    return sprintf( '… <a class="read-more" href="%1$s">%2$s</a>',
//        get_permalink( get_the_ID() ),
//        __( get_theme_mod( DESIGNR_OPTIONS::BLOG_READ_MORE_TEXT, DESIGNR_DEFAULTS::BLOG_READ_MORE_TEXT ), 'designr' )
//    );
    
    return sprintf( __( '… <a class="read-more" href="%1$s">%2$s</a>', 'designr' ), esc_url( get_the_permalink( get_the_ID() ) ), get_theme_mod( DESIGNR_OPTIONS::BLOG_READ_MORE_TEXT, DESIGNR_DEFAULTS::BLOG_READ_MORE_TEXT ) );
    
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
    return get_theme_mod( DESIGNR_OPTIONS::BLOG_EXCERPT_TRIM_NUM, DESIGNR_DEFAULTS::BLOG_EXCERPT_TRIM_NUM );
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

    switch ( get_theme_mod( DESIGNR_OPTIONS::CUSTOM_HEADER_PLX_INTENSITY, DESIGNR_DEFAULTS::CUSTOM_HEADER_PLX_INTENSITY ) ) :
        
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

/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param array $types - post types to retrieve
 * @return array of posts
 */
function designr_all_posts_array( $types = array( 'post' ) ) {
    
    $posts = get_posts( array(
        'post_type'        => $types,
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));

    $posts_array = array(
        'none'  => __( 'None', 'designr' ),
    );
    
    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}