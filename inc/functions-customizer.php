<?php

/**
 * Designr Theme Customizer
 *
 * @package Designr
 */
include_once get_template_directory() . '/inc/lib/Acid/acid.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function designr_customize_register( $wp_customize ) {
    
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    
    
    // Housekeeping ------------------------------------------------------------
    $wp_customize->get_section( 'header_image' )->panel = 'panel_custom_header';
    $wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title & Logo', 'designr' );
    // End Housekeeping --------------------------------------------------------
    
    
    // Priority ----------------------------------------------------------------
    $wp_customize->get_section( 'title_tagline' )->priority = 1;
    $wp_customize->get_panel( 'panel_navbar' )->priority = 2;
    $wp_customize->get_panel( 'panel_custom_header' )->priority = 3;
    $wp_customize->get_panel( 'panel_blog' )->priority = 4;
    $wp_customize->get_panel( 'panel_appearance' )->priority = 5;
    // End Priority ------------------------------------------------------------
    
    // Selective Refresh -------------------------------------------------------
    if ( isset( $wp_customize->selective_refresh ) ) {
        
        $wp_customize->selective_refresh->add_partial( 'blogname', array (
            'selector' => '.site-title a',
            'render_callback' => 'designr_customize_partial_blogname',
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array (
            'selector' => '.site-description',
            'render_callback' => 'designr_customize_partial_blogdescription',
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'navbar_show_social', array(
            'selector'  => '.navbar-social'
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'custom_header_style_toggle', array(
            'selector'  => '#custom-header-content'
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blog_layout_show_date_posted', array(
            'selector'  => '.masonry_card_blog .post-date'
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blog_title_font_size_dsk', array(
            'selector'  => '.masonry_card_blog .entry-title'
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blog_layout_show_comment_count', array(
            'selector'  => '.masonry_card_blog .meta-stats'
        ) );
        
    }
    // End Selective Refresh ---------------------------------------------------
}

add_action( 'customize_register', 'designr_customize_register', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function designr_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function designr_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function designr_customize_preview_js() {
    wp_enqueue_style( 'designr-customizer-preview-style', get_template_directory_uri() . '/assets/admin/css/customizer-preview.css', DESIGNR_VERSION, null );
    wp_enqueue_script( 'designr-customizer-preview-script', get_template_directory_uri() . '/assets/admin/js/customizer-preview.js', array ( 'jquery', 'customize-preview' ), DESIGNR_VERSION, true );
}
add_action( 'customize_preview_init', 'designr_customize_preview_js' );


function designr_customize_controls_js() {
    wp_enqueue_script( 'designr-customizer-control', get_template_directory_uri() . '/assets/admin/js/customizer-control.js', array ( 'jquery', 'customize-controls' ), DESIGNR_VERSION, true );
    wp_enqueue_style( 'designr-customizer-style', get_template_directory_uri() . '/assets/admin/css/customizer.css', DESIGNR_VERSION, null );
}
add_action( 'customize_controls_enqueue_scripts', 'designr_customize_controls_js' );


$acid = acid_instance( get_template_directory_uri() . '/inc/lib/' );

$data = array (

    'panels' => array (

        // Panel: Custom Header ------------------------------------------------
        'panel_custom_header' => array (

            'title'         => __( 'Header', 'designr' ),
            'desciption'    => __( 'Customize the header banner on your site', 'designr' ),
            'sections'      => array (

                // Section : Custom Header Settings ----------------------------
                'section_custom_header' => array (

                    'title' => __( 'General Settings', 'designr' ),
                    'options' => array (
                        // Style
                        DESIGNR_OPTIONS::CUSTOM_HEADER_STYLE_TOGGLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Header - Parallax Style', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_STYLE_TOGGLE,
                            'choices'   => array (
                                'parallax_vertical'     => __( 'Vertical Scroll', 'designr' ),
                                'parallax_layers'       => __( 'Perspective Layers', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Height Calculation', 'designr' ),
                            'description'   => __( 'This allows you to choose between using % values or fixed pixel values for setting the header height', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC,
                            'choices'   => array (
                                'percent'   => __( 'Use % of browser height', 'designr' ),
                                'fixed'     => __( 'Use a fixed pixel value', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (%)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT,
                            'min'           => 25,
                            'max'           => 100,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (%)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL,
                            'max'           => 100,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (px)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX,
                            'min'           => 250,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (px)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_PLX_INTENSITY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Parallax Effect - Intensity', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_PLX_INTENSITY,
                            'choices'   => array (
                                'subtle'            => __( 'Subtle', 'designr' ),
                                'default'           => __( 'Medium (Default)', 'designr' ),
                                'high'              => __( 'High', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TEXTURE_IMG => array (
                            'type'          => 'image',
                            'label'         => __( 'Perspective Layers - Transparent Pattern', 'designr' ),
                            'description'   => __( 'https://www.transparenttextures.com', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TEXTURE_IMG,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TEXTURE_OPAC => array (   // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Perspective Layers - Pattern (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TEXTURE_OPAC,
                        ),
                        
                    )

                ),

                // Section : Custom Header - Logo Settings ---------------------
                'section_custom_header_logo' => array (

                    'title' => __( 'Content', 'designr' ),
                    'options' => array (

                        // Logo
                        DESIGNR_OPTIONS::CUSTOM_HEADER_SHOW_LOGO => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Site Logo?', 'designr' ),
                            'description'   => __( 'If on, the Custom Logo for the site will be displayed', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_SHOW_LOGO,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo (px)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo for Mobile (px)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT_MBL,
                        ),
                        
                        // Main Heading
                        DESIGNR_OPTIONS::CUSTOM_HEADER_SHOW_TITLE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Main Heading?', 'designr' ),
                            'description'   => __( 'If on, the primary content heading will be displayed', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_SHOW_TITLE
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'What to Display?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT,
                            'choices'   => array (
                                'site_title'        => __( 'Site Title', 'designr' ),
                                'site_description'  => __( 'Site Description', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'       => __( '0.00em', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em', 'designr' ),
                                '.250'      => __( '.250em (Default)', 'designr' ),
                                '.500'      => __( '.500em (Widest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'All Uppercase?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_ALL_CAPS
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_TITLE_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_TITLE_COLOR
                        ),

                    )

                ),

                // Section : Custom Header - Menu Settings ---------------------
                'section_custom_header_menu' => array (

                    'title' => __( 'Custom Menu', 'designr' ),
                    'options' => array (

                        // Menu
                        DESIGNR_OPTIONS::CUSTOM_HEADER_SHOW_MENU => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Menu?', 'designr' ),
                            'description'   => __( 'If on, the "Custom Header" menu will be displayed (if one is set)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_SHOW_MENU
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Menu - Link Letter Spacing', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'       => __( '0.00em', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em', 'designr' ),
                                '.250'      => __( '.250em', 'designr' ),
                                '.500'      => __( '.500em (Default/Widest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_COLOR
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_MENU_LINKS_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Link Spacing', 'designr' ),
                            'description'   => __( 'Amount of space in px between each link in the menu', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_MENU_LINKS_GAP
                        ),
                       
                    )

                ),

                // Section : Custom Header Style - Parallax Layers -------------
                'section_custom_header_plx_vertical' => array (

                    'title' => __( 'Color / Gradient Overlay', 'designr' ),
                    'options' => array (

                        DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Include a colored overlay layer?', 'designr' ),
                            'description'   => __( 'If "Yes", a semi-transparent colored layer will be added between the texture and content layers', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE,
                            'choices'   => array (
                                'no'        => __( 'No Color', 'designr' ),
                                'single'    => __( 'Single Color', 'designr' ),
                                'gradient'  => __( 'Gradient', 'designr' ),
                            )
                        ),

                        // Overlay - Single Color
                        DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Color Overlay - Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_COLOR,
                        ),
                        DESIGNR_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Color Overlay - Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY,
                        ),

                        // Overlay - Gradient
                        DESIGNR_OPTIONS::GRADIENT_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Gradient - Style', 'designr' ),
                            'description'   => __( 'Choose from linear or radial', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_STYLE,
                            'choices'   => array (
                                'linear'    => __( 'Linear', 'designr' ),
                                'radial'    => __( 'Radial', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::GRADIENT_OVERALL_OPACITY => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient - Layer Opacity', 'designr' ),
                            'description'   => __( 'This option can be used to set transparency for the entire gradient. Set 0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_OVERALL_OPACITY,
                        ),
                        DESIGNR_OPTIONS::GRADIENT_LINEAR_DIRECTION => array (
                            'type'          => 'select',
                            'label'         => __( 'Linear Gradient - Direction', 'designr' ),
                            'description'   => __( 'Set the linear gradient direction (Start to End)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_LINEAR_DIRECTION,
                            'choices'   => array (
                                'up'        => __( 'Up', 'designr' ),
                                'down'      => __( 'Down', 'designr' ),
                                'right'     => __( 'Right', 'designr' ),
                                'left'      => __( 'Left', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::GRADIENT_START_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - Start Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_START_COLOR,
                        ),
                        DESIGNR_OPTIONS::GRADIENT_START_COLOR_OPACITY => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - Start Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_START_COLOR_OPACITY,
                        ),
                        DESIGNR_OPTIONS::GRADIENT_END_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - End Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_END_COLOR,
                        ),
                        DESIGNR_OPTIONS::GRADIENT_END_COLOR_OPACITY => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - End Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::GRADIENT_END_COLOR_OPACITY,
                        ),
                        
                    )

                ),

            ), // End of Custom Header Sections

        ), // End of Custom Header Panel

        // Panel: Blog ---------------------------------------------------------
        'panel_blog' => array (

            'title'         => __( 'Blog', 'designr' ),
            'desciption'    => __( 'Customize the blog and archive pages on your site', 'designr' ),
            'sections'      => array (

                // Section : Blog General Settings ------------------------------
                'section_blog_general' => array (

                    'title' => __( 'General Settings', 'designr' ),
                    'options' => array (

                        DESIGNR_OPTIONS::BLOG_LAYOUT_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Blog Style', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_LAYOUT_STYLE,
                            'choices'   => array (
                                'blog_standard' => __( 'Standard', 'designr' ),
                                'blog_masonry'  => __( 'Masonry - Cards', 'designr' ),
                                'blog_mosaic'   => __( 'Mosaic - Grid', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::BLOG_SHOW_DATE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Date Posted?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_SHOW_DATE,
                        ),
                        DESIGNR_OPTIONS::BLOG_SHOW_AUTHOR => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Author?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_SHOW_AUTHOR,
                        ),
                        DESIGNR_OPTIONS::BLOG_SHOW_CONTENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Content / Excerpt?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_SHOW_CONTENT,
                        ),
                        DESIGNR_OPTIONS::BLOG_SHOW_CATEGORY => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Category Footer?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_SHOW_CATEGORY,
                        ),
                        DESIGNR_OPTIONS::BLOG_SHOW_COMMENT_COUNT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show the Comment Count in the Meta Stats tab?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_SHOW_COMMENT_COUNT,
                        ),
                        DESIGNR_OPTIONS::BLOG_EXCERPT_TRIM_NUM => array (
                            'type'          => 'number',
                            'label'         => __( 'Automatic Excerpt - Trim by Number of Words', 'designr' ),
                            'description'   => __( 'If no manual excerpt exists, a post will show this many words of preview content', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_EXCERPT_TRIM_NUM,
                        ),
                        DESIGNR_OPTIONS::BLOG_READ_MORE_TEXT => array (
                            'type'          => 'text',
                            'label'         => __( 'Automatic Excerpt - "Read more" Link Text', 'designr' ),
                            'description'   => __( 'This link only shows on posts with no manual excerpt, as a content preview will be used instead', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_READ_MORE_TEXT,
                        ),

                    )

                ),
                
                // Section : Blog Layout Settings ------------------------------
                'section_blog_advanced' => array (

                    'title' => __( 'Advanced Settings', 'designr' ),
                    'options' => array (
                        
                        DESIGNR_OPTIONS::BLOG_LAYOUT_NUM_COLS => array (
                            'type'          => 'select',
                            'label'         => __( 'Layout - Number of Columns', 'designr' ),
                            'description'   => __( 'Mobile devices will automatically show fewer columns to maximize space.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_LAYOUT_NUM_COLS,
                            'choices'   => array (
                                '1col'      => __( 'Single Column', 'designr' ),
                                '2col'      => __( 'Two Columns', 'designr' ),
                                '3col'      => __( 'Three Columns', 'designr' ),
                                '4col'      => __( 'Four Columns', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::BLOG_CARD_APPEARANCE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Blog Card Appearance', 'designr' ),
                            'description'   => __( 'Select whether the Standard style blog cards should appear flat, or as raised cards with a shadow.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_CARD_APPEARANCE,
                            'choices'   => array (
                                'flat'      => __( 'Flat', 'designr' ),
                                'raised'    => __( 'Raised', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::BLOG_CARD_BORDER_RADIUS => array (
                            'type'          => 'number',
                            'label'         => __( 'Round Corners on Posts in the Blog?', 'designr' ),
                            'description'   => __( 'Set this to 0 for sharp corners, or set the rounding value in pixels.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_CARD_BORDER_RADIUS,
                        ),
                        DESIGNR_OPTIONS::BLOG_CARD_MOSAIC_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Space around each Mosaic tile?', 'designr' ),
                            'description'   => __( 'This is the uncombined padding around each tile. For example, setting this to 5px per tile will equal a 10px wide gutter. Set to 0 for gapless tiles.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_CARD_MOSAIC_GAP,
                        ),
                        DESIGNR_OPTIONS::BLOG_CARD_FONT_SIZE_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Desktop)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_CARD_FONT_SIZE_DSK,
                        ),
                        DESIGNR_OPTIONS::BLOG_CARD_FONT_SIZE_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Mobile)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_CARD_FONT_SIZE_MBL,
                        ),
                        DESIGNR_OPTIONS::BLOG_META_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Date & Author - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::BLOG_META_FONT_SIZE,
                        ),

                    )

                ),

            ), // End of Blog Sections

        ), // End of Blog Panel

        // Panel: Navbar -------------------------------------------------------
        null => array (

            'sections'       => array (

                'section_nav_social_links' => array (

                    'title' => __( 'Social Links', 'designr' ),
                    'options' => array (
                        
                        DESIGNR_OPTIONS::SOCIAL_URL_1 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #1 - URL', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_URL_1
                        ),
                        DESIGNR_OPTIONS::SOCIAL_ICON_1 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #1 - Icon', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_ICON_1,
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        DESIGNR_OPTIONS::SOCIAL_URL_2 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #2 - URL', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_URL_2
                        ),
                        DESIGNR_OPTIONS::SOCIAL_ICON_2 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #2 - Icon', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_ICON_2,
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        DESIGNR_OPTIONS::SOCIAL_URL_3 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #3 - URL', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_URL_3
                        ),
                        DESIGNR_OPTIONS::SOCIAL_ICON_3 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #3 - Icon', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_ICON_3,
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        DESIGNR_OPTIONS::SOCIAL_URL_4 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #4 - URL', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_URL_4
                        ),
                        DESIGNR_OPTIONS::SOCIAL_ICON_4 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #4 - Icon', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_ICON_4,
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        DESIGNR_OPTIONS::SOCIAL_URL_5 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #5 - URL', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_URL_5
                        ),
                        DESIGNR_OPTIONS::SOCIAL_ICON_5 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #5 - Icon', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::SOCIAL_ICON_5,
                            'choices'       => designr_get_icons( 'social' )
                        ),

                    )

                ),
                
            ), // End of Social Section
            
        ), // End of Social Panel

        // Panel: Navbar -------------------------------------------------------
        'panel_navbar' => array (

            'title'         => __( 'Navbar', 'designr' ),
            'desciption'    => __( 'Customize the primary navbar on your site, including control over appearance & behaviour', 'designr' ),
            'sections'      => array (

                // Section : Navbar General Settings ---------------------------
                'section_nav_general' => array (

                    'title' => __( 'General Settings', 'designr' ),
                    'options' => array (

                        DESIGNR_OPTIONS::NAVBAR_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Style', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_STYLE,
                            'choices'   => array (
                                'slim_split'    => __( 'Slim - Centered & Split', 'designr' ),
                                'slim_left'     => __( 'Slim - Left Aligned', 'designr' ),
                                'banner'        => __( 'Banner', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_HIDE_TAGLINE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Hide Site Tagline?', 'designr' ),
                            'description'   => __( 'Both the Title & Tagline show by default when no logo is chosen', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_HIDE_TAGLINE,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Site Title - Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Title - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP => array(
                            'type'          => 'select',
                            'label'         => __( 'Site Title - Letter Spacing', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 0 for normal spacing.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'       => __( '0.00em (Default)', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em', 'designr' ),
                                '.250'      => __( '.250em', 'designr' ),
                                '.500'      => __( '.500em (Widest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SITE_TITLE_ALL_CAPS => array(
                            'type'          => 'toggle',
                            'label'         => __( 'Site Title - All Uppercase?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SITE_TITLE_ALL_CAPS
                        ),
                        DESIGNR_OPTIONS::NAVBAR_TAGLINE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Site Tagline - Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_TAGLINE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_TAGLINE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Tagline - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_TAGLINE_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LINKS_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Links - Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LINKS_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LINKS_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LINKS_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LINKS_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Gap Between Links', 'designr' ),
                            'label'         => __( 'Set the pixel value for the amount of space between links', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LINKS_GAP
                        ),
                        DESIGNR_OPTIONS::NAVBAR_HAS_SHADOW => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Add a box shadow to the Navbar?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_HAS_SHADOW,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SHOW_SOCIAL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Social Links in Navbar?', 'designr' ),
                            'description'   => __( 'If on, social links will display in the Navbar. Navbar styles display these in different ways', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SHOW_SOCIAL,
                        ),
                        
                    )

                ),

                // Section : Slim Style Settings ---------------------------
                'section_nav_style_a' => array (

                    'title' => __( 'Advanced Settings', 'designr' ),
                    'options' => array (
                        
                        DESIGNR_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Logo - Always Visible?', 'designr' ),
                            'description'   => __( 'If on, the logo will be visible even when Slim Navbar is collapsed / unstuck', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LOGO_HORIZONTAL_PADDING => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Horizontal Padding', 'designr' ),
                            'description'   => __( 'Set the space (in pixels) between menu links and the logo', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LOGO_HORIZONTAL_PADDING
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LOGO_HEIGHT_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Height (Desktop)', 'designr' ),
                            'description'   => __( 'Set the logo height for the desktop Navbar', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LOGO_HEIGHT_DSK
                        ),
                        DESIGNR_OPTIONS::NAVBAR_LOGO_HEIGHT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Height (Mobile)', 'designr' ),
                            'description'   => __( 'Set the logo height for the mobile Navbar', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_LOGO_HEIGHT_MBL
                        ),
                        DESIGNR_OPTIONS::NAVBAR_INITIAL_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Initial)', 'designr' ),
                            'description'   => __( 'When the Slim Navbar is at the very top of the page (unstuck)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_INITIAL_HEIGHT
                        ),
                        DESIGNR_OPTIONS::NAVBAR_STICKY_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Sticky)', 'designr' ),
                            'description'   => __( 'When the Slim Navbar is sticky, after the user scrolls down the page', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_STICKY_HEIGHT
                        ),
                        DESIGNR_OPTIONS::NAVBAR_RIGHT_ALIGN_MENU => array ( 
                            'type'          => 'toggle',
                            'label'         => __( 'Right Aligned Menu?', 'designr' ),
                            'description'   => __( 'If on, the menu will be right-aligned. For the "Slim - Left Aligned" style of Navbar, the menu will replace the Social Links section', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_RIGHT_ALIGN_MENU,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BOXED_CONTENT => array ( 
                            'type'          => 'toggle',
                            'label'         => __( 'Box the Content?', 'designr' ),
                            'description'   => __( 'If on, the Navbar content will be lined up with the main content of the page instead of the left & right bounds of the window', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BOXED_CONTENT,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_TRANSPARENT_MENU_BG => array ( 
                            'type'          => 'toggle',
                            'label'         => __( 'Transparent Menu?', 'designr' ),
                            'description'   => __( 'If on, the menu will be transparent, allowing the Navbar background (color or image) to show through', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_TRANSPARENT_MENU_BG,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BRANDING_ALIGNMENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Branding - Alignment', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BRANDING_ALIGNMENT,
                            'choices'   => array (
                                'left'      => __( 'Left', 'designr' ),
                                'center'    => __( 'Centered', 'designr' ),
                                'right'     => __( 'Right', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_MENU_ALIGNMENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Menu - Alignment', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_MENU_ALIGNMENT,
                            'choices'   => array (
                                'left'      => __( 'Left', 'designr' ),
                                'center'    => __( 'Centered', 'designr' ),
                                'right'     => __( 'Right', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Above', 'designr' ),
                            'description'   => __( 'Set the amount of space (in pixels) above the branding (for the Banner style of Navbar)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_DSK
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Below', 'designr' ),
                            'description'   => __( 'Set the amount of space (in pixels) below the branding (for the Banner style of Navbar)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Above (Mobile)', 'designr' ),
                            'description'   => __( 'Set the amount of space (in pixels) above the branding on mobile devices (for the Banner style of Navbar)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_MBL
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Below (Mobile)', 'designr' ),
                            'description'   => __( 'Set the amount of space (in pixels) below the branding on mobile devices (for the Banner style of Navbar)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL
                        ),

                    )

                ),

                // Section : Navbar Colors -------------------------------------
                'section_nav_colors' => array (

                    'title' => __( 'Colors', 'designr' ),
                    'options' => array (
                        
                        DESIGNR_OPTIONS::NAVBAR_BG_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Background Style', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BG_STYLE,
                            'choices'   => array (
                                'color'     => __( 'Color', 'designr' ),
                                'image'     => __( 'Background Image', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Background Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Foreground Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_MENU_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Menu - Background Color', 'designr' ),
                            'description'   => __( 'If the menu is not set to transparent (in Advanced Settings), you can set the background color for the menu bar', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_MENU_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_MENU_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Menu - Foreground Color', 'designr' ),
                            'description'   => __( 'If the menu is not set to transparent (in Advanced Settings), you can set the foreground color for the menu bar', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_MENU_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::NAVBAR_BG_IMAGE => array (
                            'type'          => 'image',
                            'label'         => __( 'Background Image', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_BG_IMAGE,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SOCIAL_BG_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Drawer Background', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SOCIAL_BG_COLOR,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SOCIAL_FG_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR,
                        ),
                        DESIGNR_OPTIONS::NAVBAR_SOCIAL_FG_COLOR_HOVER => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons (Hover)', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR_HOVER,
                        ),

                    )

                ),

            ), // End of Navbar Sections

        ), // End of Navbar Panel

        // Panel: Appearance ---------------------------------------------------
        'panel_appearance' => array (

            'title'         => __( 'Appearance', 'designr' ),
            'description'   => __( 'Customize your site colors, fonts, and more', 'designr' ),
            'sections'      => array (

                // Section : Colors --------------------------------------------
                'section_colors' => array (

                    'title'         => __( 'Colors', 'designr' ),
                    'description'   => __( 'Customize the colors in use on your site', 'designr' ),
                    'options' => array (
                        
                        DESIGNR_OPTIONS::COLOR_SKIN_PRIMARY => array(
                            'type'          => 'color-select',
                            'label'         => __( 'Theme Color - Primary', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::COLOR_SKIN_PRIMARY,
                            'choices'   => array(
                                '#f04265'       => __( 'Cherry Gloss', 'designr' ),
                                '#13ecb6'       => __( 'Seafoam Coast', 'designr' ),
                                '#7f66ff'       => __( 'Royal Lilac', 'designr' ),
                                '#00d4ff'       => __( 'Sky Blue', 'designr' ),
                            ),
                        ),
                        DESIGNR_OPTIONS::COLOR_SKIN_SECONDARY => array(
                            'type'          => 'color-select',
                            'label'         => __( 'Theme Color - Secondary', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::COLOR_SKIN_SECONDARY,
                            'choices'   => array(
                                '#d60059'       => __( 'Magenta Rose', 'designr' ),
                                '#04aeae'       => __( 'Tide Pool', 'designr' ),
                                '#6e3399'       => __( 'Wildberry', 'designr' ),
                                '#0b84da'       => __( 'Ocean Swell', 'designr' ),
                            ),
                        ),

                    ),

                ),

                // Section : Fonts ---------------------------------------------
                'fonts' => array (

                    'title'         => __( 'Fonts', 'designr' ),
                    'description'   => __( 'Customize the fonts in use on your site', 'designr' ),
                    'options' => array (
                        
                        // Primary Font
                        DESIGNR_OPTIONS::FONT_PRIMARY => array(
                            'type'      => 'select',
                            'label'     => __( 'Primary Font (Headings & Titles)', 'designr' ),
                            'default'   => DESIGNR_DEFAULTS::FONT_PRIMARY,
                            'choices'   => designr_fonts(),
                        ),
                        DESIGNR_OPTIONS::FONT_HEADINGS_LETTER_GAP => array(
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing for all Headings', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 0 for normal spacing.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FONT_HEADINGS_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'         => __( '0.00em (Default)', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em (Widest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::FONT_HEADINGS_LINE_HEIGHT => array(
                            'type'          => 'select',
                            'label'         => __( 'Line Height for all Headings', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 1 for normal spacing.', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FONT_HEADINGS_LINE_HEIGHT,
                            'choices'   => array (
                                '.80'       => __( '.80em (Shortest)', 'designr' ),
                                '1'         => __( '1em (Default)', 'designr' ),
                                '1.125'     => __( '1.125em', 'designr' ),
                                '1.25'      => __( '1.25em', 'designr' ),
                                '1.5'       => __( '1.5em (Tallest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::FONT_H1_FONT_SIZE => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - h1', 'designr' ),
                            'default'   => DESIGNR_DEFAULTS::FONT_H1_FONT_SIZE,
                        ),
                        DESIGNR_OPTIONS::FONT_H1_FONT_SIZE_MBL => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - h1 (Mobile)', 'designr' ),
                            'default'   => DESIGNR_DEFAULTS::FONT_H1_FONT_SIZE_MBL,
                        ),

                        // Secondary Font
                        DESIGNR_OPTIONS::FONT_SECONDARY => array(
                            'type'      => 'select',
                            'label'     => __( 'Secondary Font (Body & Paragraph)', 'designr' ),
                            'default'   => DESIGNR_DEFAULTS::FONT_SECONDARY,
                            'choices'   => designr_fonts(),
                        ),
                        DESIGNR_OPTIONS::FONT_BODY_SIZE => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - Body & Paragraph', 'designr' ),
                            'default'   => DESIGNR_DEFAULTS::FONT_BODY_SIZE,
                        ),

                    ),

                ),

            ), // End of Appearance Sections

        ), // End of Appearance Panel

        // Panel: Footer -------------------------------------------------------
        'panel_footer' => array (

            'title'         => __( 'Footer', 'designr' ),
            'desciption'    => __( 'Customize the theme footer', 'designr' ),
            'sections'      => array (

                // Section : Pre-Footer Widget Area Settings  ------------------
                'section_pre_footer' => array (

                    'title'     => __( 'Pre-Footer Sidebar', 'designr' ),
                    'options'   => array (
                        
                        DESIGNR_OPTIONS::FOOTER_NUM_WIDGET_COLS => array (
                            'type'          => 'range',
                            'label'         => __( 'Number of Widget Columns' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_NUM_WIDGET_COLS,
                            'min'           => 1,
                            'max'           => 4,
                            'step'          => 1
                        ),
                        DESIGNR_OPTIONS::WIDGETS_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Widget Titles - Font Family', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WIDGETS_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::WIDGETS_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Widget Titles - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WIDGETS_TITLE_FONT_SIZE,
                        ),
                        DESIGNR_OPTIONS::WIDGETS_TITLE_FONT_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Widget Titles - Letter Spacing', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WIDGETS_TITLE_FONT_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'       => __( '0.00em', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em', 'designr' ),
                                '.250'      => __( '.250em (Default)', 'designr' ),
                                '.500'      => __( '.500em (Widest)', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::WIDGETS_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Widget Titles - All Uppercase?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WIDGETS_TITLE_ALL_CAPS,
                        ),
                        DESIGNR_OPTIONS::FOOTER_BORDER_TOP_THICKNESS => array (
                            'type'          => 'number',
                            'label'         => __( 'Colored Top Border - Thickness', 'designr' ),
                            'description'   => __( 'If set to a value greater than 0, the Prefooter will include a primary color top border of this many pixels', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_BORDER_TOP_THICKNESS,
                        ),
                        
                    )
                    
                ),
                        
                // Section : Footer General Settings  --------------------------
                'section_footer_general' => array (

                    'title'     => __( 'General Settings', 'designr' ),
                    'options'   => array (

                        // Footer Style
                        DESIGNR_OPTIONS::FOOTER_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Footer Style', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_STYLE,
                            'choices'   => array (
                                'default'           => __( 'Default', 'designr' ),
                                'slim'              => __( 'Slim', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::FOOTER_BOXED_CONTENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Boxed Content?', 'designr' ),
                            'description'   => __( 'If on, the Footer will be lined up with the main content instead of the left & right bounds of the window', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_BOXED_CONTENT,
                        ),
                        DESIGNR_OPTIONS::FOOTER_CENTER_BRANDING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Centered?', 'designr' ),
                            'description'   => __( 'If on, the Footer content will be centered', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_CENTER_BRANDING,
                        ),
                        DESIGNR_OPTIONS::FOOTER_SHOW_SOCIAL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Social?', 'designr' ),
                            'description'   => __( 'If on, the Footer will include the social icon links you have set', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_SHOW_SOCIAL,
                        ),
                        DESIGNR_OPTIONS::FOOTER_SHOW_BRANDING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Branding?', 'designr' ),
                            'description'   => __( 'If on,  the Footer will include either an alternate custom logo or your site title', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_SHOW_BRANDING,
                        ),
                        DESIGNR_OPTIONS::FOOTER_SHOW_COPYRIGHT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Copyright?', 'designr' ),
                            'description'   => __( 'If on, the Footer will include the copyright tagline you set', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_SHOW_COPYRIGHT,
                        ),
                        DESIGNR_OPTIONS::FOOTER_COPYRIGHT_TAGLINE => array (
                            'type'          => 'text',
                            'label'         => __( 'Copyright - Tagline Text', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE,
                        ),
                        DESIGNR_OPTIONS::FOOTER_BRANDING_TYPE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Branding - What to Display?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_BRANDING_TYPE,
                            'choices'   => array (
                                'site_title'    => __( 'Show Site Title', 'designr' ),
                                'alt_logo'      => __( 'Show Logo', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::FOOTER_ALTERNATE_LOGO => array (
                            'type'          => 'image',
                            'label'         => __( 'Branding - Logo', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_ALTERNATE_LOGO,
                        ),
                        DESIGNR_OPTIONS::FOOTER_ALTERNATE_LOGO_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Logo Height', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_ALTERNATE_LOGO_HEIGHT,
                        ),
                        DESIGNR_OPTIONS::FOOTER_SITE_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_SITE_TITLE_FONT_SIZE
                        ),
                        DESIGNR_OPTIONS::FOOTER_SITE_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Branding - All Uppercase?', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_SITE_TITLE_ALL_CAPS
                        ),
                        DESIGNR_OPTIONS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Copyright - Font Size', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE
                        ),

                    )

                ),

                // Section : Footer Colors -------------------------------------
                'section_footer_colors' => array (

                    'title'     => __( 'Colors', 'designr' ),
                    'options'   => array (
                        
                        // Pre-Footer Background
                        DESIGNR_OPTIONS::PRE_FOOTER_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Prefooter: Background Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::PRE_FOOTER_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),

                        // Pre-Footer Foreground
                        DESIGNR_OPTIONS::PRE_FOOTER_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Prefooter: Foreground Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::PRE_FOOTER_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        
                        // Pre-Footer Widget Titles
                        DESIGNR_OPTIONS::PRE_FOOTER_WIDGET_TITLE_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Prefooter: Widgets Title Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::PRE_FOOTER_WIDGET_TITLE_COLOR,
                        ),
                        
                        // Footer Background
                        DESIGNR_OPTIONS::FOOTER_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Footer: Background Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_BG_COLOR,
                            'choices'   => array (
                                '#000000'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),

                        // Footer Foreground
                        DESIGNR_OPTIONS::FOOTER_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Footer: Foreground Color', 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::FOOTER_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'designr' ),
                                '#ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),

                    )

                ),

            ), // End of Footer Sections

        ), // End of Footer Panel

        // Panel: WooCommerce --------------------------------------------------
        'woocommerce' => array (

            'title'         => __( 'WooCommerce', 'designr' ),
            'sections'      => array (

                // Section : WooCommerce Advanced  -----------------------------
                'section_woocommerce_featured' => array (

                    'title'     => __( 'Featured Products', 'designr' ),
                    'options'   => array (
                        
                        DESIGNR_OPTIONS::WOO_SHOW_FEATURED_PRODUCTS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Featured Products at the top of the Shop page?' , 'designr' ),
                            'description'   => __( 'To feature a product, click the corresponding star icon on the Products page.' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SHOW_FEATURED_PRODUCTS,
                        ),
                        DESIGNR_OPTIONS::WOO_SHOW_FEATURED_PRODUCT_HEADING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show "Featured" Header Banner?' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SHOW_FEATURED_PRODUCT_HEADING,
                        ),
                        DESIGNR_OPTIONS::WOO_FEATURED_PRODUCTS_NUM_COLS => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Featured Products Per Row' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_FEATURED_PRODUCTS_NUM_COLS,
                            'choices'       => array (
                                'two'   => __( 'Two', 'designr' ),
                                'three' => __( 'Three', 'designr' ),
                            )
                        ),
                        
                    )
                    
                ),
                
                // Section : WooCommerce Advanced  -----------------------------
                'section_woocommerce_slide_cart' => array (

                    'title'     => __( 'Slide-In Cart', 'designr' ),
                    'options'   => array (
                        
                        DESIGNR_OPTIONS::WOO_SLIDE_CART_TOGGLE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include the Slide-In Cart Drawer?' , 'designr' ),
                            'description'   => __( 'If this is on, users can click a tab on the right side of the page to open a drawer displaying the items currently added to their cart.' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SLIDE_CART_TOGGLE,
                        ),
                        DESIGNR_OPTIONS::WOO_SLIDE_CART_TAB_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Tab: Color' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SLIDE_CART_TAB_COLOR,
                        ),
                        DESIGNR_OPTIONS::WOO_SLIDE_CART_TAB_ICON => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Tab: Icon' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SLIDE_CART_TAB_ICON,
                            'choices'       => array (
                                'fa-shopping-cart'      =>  __( 'Cart', 'designr' ),
                                'fa-shopping-bag'       =>  __( 'Bag', 'designr' ),
                                'fa-shopping-basket'    =>  __( 'Basket', 'designr' ),
                            )
                        ),
                        DESIGNR_OPTIONS::WOO_SLIDE_CART_TAB_POSITION => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Tab: Location' , 'designr' ),
                            'description'   => __( 'For readability, the tab will always appear at the bottom when viewing the site on mobile devices.' , 'designr' ),
                            'default'       => DESIGNR_DEFAULTS::WOO_SLIDE_CART_TAB_POSITION,
                            'choices'       => array (
                                'top'           =>  __( 'Top', 'designr' ),
                                'bottom'        =>  __( 'Bottom', 'designr' ),
                            )
                        ),
                        
                    )
                    
                ),
                
            ), // End of Footer Sections

        ), // End of WooCommerce Panel
       
    ), // End of Panels

);

$acid->config( $data );
