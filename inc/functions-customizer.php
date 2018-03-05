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
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array (
            'selector' => '.site-title a',
            'render_callback' => 'designr_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array (
            'selector' => '.site-description',
            'render_callback' => 'designr_customize_partial_blogdescription',
        ) );
    }
}

add_action( 'customize_register', 'designr_customize_register' );

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
    wp_enqueue_script( 'designr-customizer-preview', get_template_directory_uri() . '/assets/admin/js/customizer-preview.js', array ( 'jquery', 'customize-preview' ), DESIGNR_VERSION, true );
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

            'title'         => __( 'Custom Header', 'designr' ),
            'desciption'    => __( 'Customize the header banner on your site', 'designr' ),
            'sections'      => array (

                // Section : Custom Header Settings ----------------------------
                'section_custom_header' => array (

                    'title' => __( 'General Settings', 'designr' ),
                    'options' => array (
                        // Style
                        'custom_header_style_toggle' => array (
                            'type'          => 'select',
                            'label'         => __( 'Header Style', 'designr' ),
                            'default'       => 'parallax_vertical',
                            'choices'   => array (
                                'parallax_vertical'     => __( 'Parallax - Vertical', 'designr' ),
                                'parallax_layers'       => __( 'Parallax - Perspective Layers', 'designr' ),
                            )
                        ),
                        'designr_custom_header_height_unit' => array (
                            'type'          => 'select',
                            'label'         => __( 'Height Calculation', 'designr' ),
                            'description'   => __( 'This allows you to choose between using % values or fixed pixel values for setting the header height', 'designr' ),
                            'default'       => 'percent',
                            'choices'   => array (
                                'percent'   => __( 'Use a percentage of browser height', 'designr' ),
                                'fixed'     => __( 'Use a fixed pixel value', 'designr' ),
                            )
                        ),
                        'designr_custom_header_height_percent' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (%)', 'designr' ),
                            'default'       => 50,
                            'min'           => 25,
                            'max'           => 100,
                        ),
                        'designr_custom_header_height_percent_mbl' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (%)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => 25,
                            'max'           => 100,
                        ),
                        'designr_custom_header_height_pixels' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (px)', 'designr' ),
                            'default'       => 500,
                            'min'           => 250,
                        ),
                        'designr_custom_header_height_pixels_mbl' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (px)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => 250,
                        ),
                        'parallax_layers_parallax_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Parallax Effect - Intensity', 'designr' ),
                            'default'       => 'default',
                            'choices'   => array (
                                'subtle'            => __( 'Subtle', 'designr' ),
                                'default'           => __( 'Medium (Default)', 'designr' ),
                                'high'              => __( 'High', 'designr' ),
                            )
                        ),
                        'parallax_layers_texture_pattern' => array (
                            'type'          => 'image',
                            'label'         => __( 'Perspective Layers - Transparent Pattern', 'designr' ),
                            'description'   => __( 'https://www.transparenttextures.com', 'designr' ),
                            'default'       => '',
                        ),
                        'parallax_layers_texture_layer_opacity' => array (   // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Perspective Layers - Pattern (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => .75,
                        ),

                    )

                ),

                // Section : Custom Header - Logo Settings ---------------------
                'section_custom_header_logo' => array (

                    'title' => __( 'Display: Logo', 'designr' ),
                    'options' => array (

                        // Logo
                        'custom_header_show_logo' => array (
                            'type'          => 'select',
                            'label'         => __( 'Display the Site Logo?', 'designr' ),
                            'description'   => __( 'If "Yes", the Custom Logo for the site will be displayed', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'designr_custom_header_logo_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo (px)', 'designr' ),
                            'default'       => 150,
                        ),
                        'designr_custom_header_logo_height_mbl' => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo for Mobile (px)', 'designr' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'designr' ),
                            'default'       => 80,
                        ),

                    )

                ),

                // Section : Custom Header - Main Heading Settings ---------------------
                'section_custom_header_heading' => array (

                    'title' => __( 'Display: Heading', 'designr' ),
                    'options' => array (

                        // Main Heading
                        'custom_header_show_heading' => array (
                            'type'          => 'select',
                            'label'         => __( 'Display the Main Heading?', 'designr' ),
                            'description'   => __( 'If "Yes", the primary content heading will be displayed', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'custom_header_title_content' => array (
                            'type'          => 'select',
                            'label'         => __( 'What to Display?', 'designr' ),
                            'default'       => 'site_title',
                            'choices'   => array (
                                'site_title'        => __( 'Site Title', 'designr' ),
                                'site_description'  => __( 'Site Description', 'designr' ),
                            )
                        ),
                        'custom_header_title_font_family' => array (
                            'type'          => 'select',
                            'label'         => __( 'Font Family', 'designr' ),
                            'default'       => 'secondary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        'custom_header_title_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'designr' ),
                            'default'       => 48
                        ),
                        'custom_header_title_letter_spacing' => array (
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing', 'designr' ),
                            'default'       => '.250',
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
                        'custom_header_title_color' => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'designr' ),
                            'default'       => '#FFFFFF'
                        ),

                    )

                ),

                // Section : Custom Header - Menu Settings ---------------------
                'section_custom_header_menu' => array (

                    'title' => __( 'Display: Custom Menu', 'designr' ),
                    'options' => array (

                        // Menu
                        'custom_header_show_menu' => array (
                            'type'          => 'select',
                            'label'         => __( 'Display the Menu?', 'designr' ),
                            'description'   => __( 'If "Yes", the "Custom Header" menu will be displayed (if one is set)', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'custom_header_menu_font_family' => array (
                            'type'          => 'select',
                            'label'         => __( 'Font Family', 'designr' ),
                            'default'       => 'primary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        'custom_header_menu_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'designr' ),
                            'default'       => 10
                        ),
                        'custom_header_menu_letter_spacing' => array (
                            'type'          => 'select',
                            'label'         => __( 'Menu - Link Letter Spacing', 'designr' ),
                            'default'       => '.500',
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
                        'custom_header_menu_color' => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'designr' ),
                            'default'       => '#FFFFFF'
                        ),
                        'custom_header_menu_link_spacing' => array (
                            'type'          => 'number',
                            'label'         => __( 'Link Spacing', 'designr' ),
                            'description'   => __( 'Amount of space in px between each link in the menu', 'designr' ),
                            'default'       => 16
                        ),

                    )

                ),

                // Section : Custom Header Style - Parallax Layers -------------
                'section_custom_header_plx_vertical' => array (

                    'title' => __( 'Color / Gradient Overlay', 'designr' ),
                    'options' => array (

                        'parallax_layers_include_color_layer' => array (
                            'type'          => 'select',
                            'label'         => __( 'Include a colored overlay layer?', 'designr' ),
                            'description'   => __( 'If "Yes", a semi-transparent colored layer will be added between the texture and content layers', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No Color', 'designr' ),
                                'single'    => __( 'Single Color', 'designr' ),
                                'gradient'  => __( 'Gradient', 'designr' ),
                            )
                        ),

                        // Overlay - Single Color
                        'parallax_layers_single_color' => array (
                            'type'          => 'color',
                            'label'         => __( 'Color Overlay - Color', 'designr' ),
                            'default'       => '#348aa7',
                        ),
                        'parallax_layers_single_color_opacity' => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Color Overlay - Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => .75,
                        ),

                        // Overlay - Gradient
                        'parallax_layers_gradient_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Gradient - Style', 'designr' ),
                            'description'   => __( 'Choose from linear or radial', 'designr' ),
                            'default'       => 'linear',
                            'choices'   => array (
                                'linear'    => __( 'Linear', 'designr' ),
                                'radial'    => __( 'Radial', 'designr' ),
                            )
                        ),
                        'parallax_layers_gradient_overall_opacity' => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient - Layer Opacity', 'designr' ),
                            'description'   => __( 'This option can be used to set transparency for the entire gradient. Set 0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => .75,
                        ),
                        'parallax_layers_gradient_linear_direction' => array (
                            'type'          => 'select',
                            'label'         => __( 'Linear Gradient - Direction', 'designr' ),
                            'description'   => __( 'Set the linear gradient direction (Start to End)', 'designr' ),
                            'default'       => 'up',
                            'choices'   => array (
                                'up'        => __( 'Up', 'designr' ),
                                'down'      => __( 'Down', 'designr' ),
                                'right'     => __( 'Right', 'designr' ),
                                'left'      => __( 'Left', 'designr' ),
                            )
                        ),
                        'parallax_layers_gradient_start_color' => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - Start Color', 'designr' ),
                            'default'       => '#348aa7',
                        ),
                        'parallax_layers_gradient_start_color_opacity' => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - Start Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => .75,
                        ),
                        'parallax_layers_gradient_end_color' => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - End Color', 'designr' ),
                            'default'       => '#348aa7',
                        ),
                        'parallax_layers_gradient_end_color_opacity' => array ( // TODO: Change to Overlay Decimal
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - End Color (Opacity)', 'designr' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'designr' ),
                            'default'       => .25,
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

                // Section : Blog Layout Settings ------------------------------
                'section_blog_layout' => array (

                    'title' => __( 'Blog Layout', 'designr' ),
                    'options' => array (

                        'blog_layout_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Blog Style', 'designr' ),
                            'default'       => 'masonry_card',
                            'choices'   => array (
                                'masonry_card'   => __( 'Masonry - Cards', 'designr' ),
                            )
                        ),
                        'blog_layout_num_columns' => array (
                            'type'          => 'select',
                            'label'         => __( 'Layout - Number of Columns', 'designr' ),
                            'description'   => __( 'Mobile devices will automatically show fewer columns to maximaize space.', 'designr' ),
                            'default'       => '3col',
                            'choices'   => array (
                                '1col'      => __( 'Single Column', 'designr' ),
                                '2col'      => __( 'Two Columns', 'designr' ),
                                '3col'      => __( 'Three Columns', 'designr' ),
                                '4col'      => __( 'Four Columns', 'designr' ),
                            )
                        ),
                        'blog_layout_border_radius' => array (
                            'type'          => 'number',
                            'label'         => __( 'Round Corners on Posts in the Blog?', 'designr' ),
                            'description'   => __( 'Set this to 0 for sharp corners, or set the rounding value in pixels.', 'designr' ),
                            'default'       => 0,
                        ),
                        'blog_layout_show_date_posted' => array (
                            'type'          => 'select',
                            'label'         => __( 'Show Date Posted?', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'blog_layout_show_author' => array (
                            'type'          => 'select',
                            'label'         => __( 'Show Author?', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'blog_layout_show_categories' => array (
                            'type'          => 'select',
                            'label'         => __( 'Show Category Footer?', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'blog_layout_show_comment_count' => array (
                            'type'          => 'select',
                            'label'         => __( 'Show the Comment Count in the Meta Stats tab?', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        //                        'blog_layout_show_view_count' => array (
                        //                            'type'          => 'select',
                        //                            'label'         => __( 'Show the View Count in the Meta Stats tab?', 'designr' ),
                        //                            'default'       => 'no',
                        //                            'choices'   => array (
                        //                                'no'        => __( 'No', 'designr' ),
                        //                                'yes'       => __( 'Yes', 'designr' ),
                        //                            )
                        //                        ),
                        'blog_layout_excerpt_trim_words' => array (
                            'type'          => 'number',
                            'label'         => __( 'Automatic Excerpt - Trim by Number of Words', 'designr' ),
                            'description'   => __( 'If no manual excerpt exists, a post will show this many words of preview content', 'designr' ),
                            'default'       => 30,
                        ),
                        'blog_layout_read_more_text' => array (
                            'type'          => 'text',
                            'label'         => __( 'Automatic Excerpt - "Read more" Link Text', 'designr' ),
                            'description'   => __( 'This link only shows on posts with no manual excerpt, as a content preview will be used instead', 'designr' ),
                            'default'       => __( 'Read more', 'designr' ),
                        ),
                        'blog_title_font_size_dsk' => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Desktop)', 'designr' ),
                            'default'       => 32,
                        ),
                        'blog_title_font_size_mbl' => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Mobile)', 'designr' ),
                            'default'       => 20,
                        ),
                        'blog_meta_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Date & Author - Font Size', 'designr' ),
                            'default'       => 12,
                        ),

                    )

                ),

            ), // End of Blog Sections

        ), // End of Blog Panel

        // Panel: Navbar -------------------------------------------------------
        'panel_navbar' => array (

            'title'         => __( 'Navbar', 'designr' ),
            'desciption'    => __( 'Customize the primary navbar on your site, including control over appearance & behaviour', 'designr' ),
            'sections'      => array (

                // Section : Navbar General Settings ---------------------------
                'section_nav_general' => array (

                    'title' => __( 'General Settings', 'designr' ),
                    'options' => array (

                        'navbar_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Navbar Style', 'designr' ),
                            'default'       => 'default',
                            'choices'   => array (
                                'default'       => __( 'Default', 'designr' ),
                                'slim_split'    => __( 'Slim - Centered & Split', 'designr' ),
                                'slim_left'     => __( 'Slim - Left Aligned', 'designr' ),
                            )
                        ),
                        'navbar_hide_tagline' => array (
                            'type'          => 'select',
                            'label'         => __( 'Hide Site Tagline?', 'designr' ),
                            'description'   => __( 'Both the Title & Tagline show by default when no logo is chosen', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'navbar_site_title_font' => array (
                            'type'          => 'select',
                            'label'         => __( 'Site Title - Font Family', 'designr' ),
                            'default'       => 'secondary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        'navbar_site_title_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Title - Font Size', 'designr' ),
                            'default'       => 32
                        ),
                        'navbar_site_title_spacing' => array(
                            'type'          => 'select',
                            'label'         => __( 'Site Title - Letter Spacing', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 0 for normal spacing.', 'designr' ),
                            'default'       => '0.25',
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'designr' ),
                                '-.075'     => __( '-.075em', 'designr' ),
                                '-.050'     => __( '-.050em', 'designr' ),
                                '-.025'     => __( '-.025em', 'designr' ),
                                '0.0'         => __( '0.00em (Default)', 'designr' ),
                                '.025'      => __( '.025em', 'designr' ),
                                '.050'      => __( '.050em', 'designr' ),
                                '.075'      => __( '.075em', 'designr' ),
                                '.100'      => __( '.100em', 'designr' ),
                                '.250'      => __( '.250em', 'designr' ),
                                '.500'      => __( '.500em (Widest)', 'designr' ),
                            )
                        ),
                        'navbar_site_tagline_font' => array (
                            'type'          => 'select',
                            'label'         => __( 'Site Tagline - Font Family', 'designr' ),
                            'default'       => 'secondary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        'navbar_site_tagline_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Tagline - Font Size', 'designr' ),
                            'default'       => 12
                        ),
                        'navbar_links_font' => array (
                            'type'          => 'select',
                            'label'         => __( 'Navbar Links - Font Family', 'designr' ),
                            'default'       => 'primary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        ),
                        'navbar_links_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Font Size', 'designr' ),
                            'default'       => 10
                        ),
                        'navbar_links_gap_spacing' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Gap Between Links', 'designr' ),
                            'label'         => __( 'Set the pixel value for the amount of space between links', 'designr' ),
                            'default'       => 30
                        ),
                        'style_a_box_shadow' => array (
                            'type'          => 'select',
                            'label'         => __( 'Add a box shadow to the Navbar?', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),

                    )

                ),

                // Section : Slim Style Settings ---------------------------
                'section_nav_style_a' => array (

                    'title' => __( 'Style: Slim', 'designr' ),
                    'options' => array (

                        'style_a_always_show_logo' => array (
                            'type'          => 'select',
                            'label'         => __( 'Logo - Always Visible?', 'designr' ),
                            'description'   => __( 'When "Yes", the logo will be visible even when Navbar is collapsed / unstuck', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'style_a_logo_space' => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Horizontal Padding', 'designr' ),
                            'default'       => 15
                        ),
                        'style_a_mobile_logo_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Height (Mobile Only)', 'designr' ),
                            'description'   => __( 'Set the logo height for the mobile Navbar', 'designr' ),
                            'default'       => 50
                        ),
                        'style_a_collapse_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Collapsed)', 'designr' ),
                            'description'   => __( 'When Navbar is collapsed / unstuck', 'designr' ),
                            'default'       => 50
                        ),
                        'style_a_expand_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Expanded)', 'designr' ),
                            'description'   => __( 'When Navbar is expanded / sticky', 'designr' ),
                            'default'       => 75
                        ),
                        'style_a_right_align_menu' => array ( // TODO: Should Only show if Slim - Left Aligned is set for Navbar Style
                            'type'          => 'select',
                            'label'         => __( 'Navbar - Bookend the Logo & Menu?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will right-align the menu, instead of displaying the Social Links section', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'style_a_boxed_navbar' => array ( // TODO: Should Only show if Slim - Left Aligned is set for Navbar Style
                            'type'          => 'select',
                            'label'         => __( 'Navbar - Boxed Content?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will line up the Navbar with the main content instead of the left & right bounds of the window', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),

                    )

                ),

                // Section : Social Links --------------------------------------
                'section_nav_social_links' => array (

                    'title' => __( 'Social Links', 'designr' ),
                    'options' => array (

                        'navbar_show_social' => array (
                            'type'          => 'select',
                            'label'         => __( 'Show Social Links in Navbar?', 'designr' ),
                            'description'   => __( 'Different Navbar styles will display the icons in varying ways', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'social_icon_1_url' => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #1 - URL', 'designr' ),
                            'default'       => ''
                        ),
                        'social_icon_1_icon' => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #1 - Icon', 'designr' ),
                            'default'       => '',
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        'social_icon_2_url' => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #2 - URL', 'designr' ),
                            'default'       => ''
                        ),
                        'social_icon_2_icon' => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #2 - Icon', 'designr' ),
                            'default'       => '',
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        'social_icon_3_url' => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #3 - URL', 'designr' ),
                            'default'       => ''
                        ),
                        'social_icon_3_icon' => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #3 - Icon', 'designr' ),
                            'default'       => '',
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        'social_icon_4_url' => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #4 - URL', 'designr' ),
                            'default'       => ''
                        ),
                        'social_icon_4_icon' => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #4 - Icon', 'designr' ),
                            'default'       => '',
                            'choices'       => designr_get_icons( 'social' )
                        ),
                        'social_icon_5_url' => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #5 - URL', 'designr' ),
                            'default'       => ''
                        ),
                        'social_icon_5_icon' => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #5 - Icon', 'designr' ),
                            'default'       => '',
                            'choices'       => designr_get_icons( 'social' )
                        ),

                    )

                ),

                // Section : Navbar Colors -------------------------------------
                'section_nav_colors' => array (

                    'title' => __( 'Colors', 'designr' ),
                    'options' => array (

                        'navbar_background_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Background Style', 'designr' ),
                            'default'       => 'color',
                            'choices'   => array (
                                'color'     => __( 'Color', 'designr' ),
                                'image'     => __( 'Background Image', 'designr' ),
                            )
                        ),
                        'navbar_background' => array (
                            'type'          => 'select',
                            'label'         => __( 'Background Color', 'designr' ),
                            'default'       => '141414',
                            'choices'   => array (
                                '141414'    => __( 'Dark', 'designr' ),
                                'ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        'navbar_foreground' => array (
                            'type'          => 'select',
                            'label'         => __( 'Foreground Color', 'designr' ),
                            'default'       => 'ffffff',
                            'choices'   => array (
                                '141414'    => __( 'Dark', 'designr' ),
                                'ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),
                        'navbar_bg_image' => array (
                            'type'          => 'image',
                            'label'         => __( 'Background Image', 'designr' ),
                            'default'       => '',
                        ),
                        'navbar_social_drawer_background' => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Drawer Background', 'designr' ),
                            'default'       => '#141414'
                        ),
                        'navbar_social_link_foreground' => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons', 'designr' ),
                            'default'       => '#FFFFFF'
                        ),
                        'navbar_social_link_foreground_hover' => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons (Hover)', 'designr' ),
                            'default'       => '#0000FF'
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

                        'skin_theme_primary' => array(
                            'type'          => 'select',
                            'label'         => __( 'Theme Color - Primary', 'designr' ),
                            'default'       => '0000FF',
                            'choices'   => array(
                                '0000FF'       => __( 'Blue', 'designr' ),
                                '00FF00'       => __( 'Green', 'designr' ),
                                'FF0000'       => __( 'Red', 'designr' ),
                                'f04265'       => __( 'Cherry Gloss', 'designr' ),
                            ),
                        ),
                        'skin_theme_secondary' => array(
                            'type'          => 'select',
                            'label'         => __( 'Theme Color - Secondary', 'designr' ),
                            'default'       => '00FF00',
                            'choices'   => array(
                                '0000FF'       => __( 'Blue', 'designr' ),
                                '00FF00'       => __( 'Green', 'designr' ),
                                'FF0000'       => __( 'Red', 'designr' ),
                                'c70546'       => __( 'Deep Magenta', 'designr' ),
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
                        'primary_font' => array(
                            'type'      => 'select',
                            'label'     => __( 'Primary Font (Headings & Titles)', 'designr' ),
                            'default'   => 'Montserrat, sans-serif',
                            'choices'   => designr_fonts(),
                        ),
                        'headings_letter_spacing' => array(
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing for all Headings', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 0 for normal spacing.', 'designr' ),
                            'default'       => '0.0',
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
                        'headings_line_height' => array(
                            'type'          => 'select',
                            'label'         => __( 'Line Height for all Headings', 'designr' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 1 for normal spacing.', 'designr' ),
                            'default'       => '1',
                            'choices'   => array (
                                '.80'       => __( '.80em (Shortest)', 'designr' ),
                                '1'         => __( '1em (Default)', 'designr' ),
                                '1.125'     => __( '1.125em', 'designr' ),
                                '1.25'      => __( '1.25em', 'designr' ),
                                '1.5'       => __( '1.5em (Tallest)', 'designr' ),
                            )
                        ),
                        'h1_font_size' => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - h1', 'designr' ),
                            'default'   => 16,
                        ),
                        'h1_font_size_mbl' => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - h1 (Mobile)', 'designr' ),
                            'default'   => 16,
                        ),

                        // Secondary Font
                        'secondary_font' => array(
                            'type'      => 'select',
                            'label'     => __( 'Secondary Font (Body & Paragraph)', 'designr' ),
                            'default'   => 'Abel, sans-serif',
                            'choices'   => designr_fonts(),
                        ),
                        'body_font_size' => array(
                            'type'      => 'number',
                            'label'     => __( 'Font Size - Body & Paragraph', 'designr' ),
                            'default'   => 16,
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

                // Section : Footer General Settings  --------------------------
                'section_footer_general' => array (

                    'title'     => __( 'General Settings', 'designr' ),
                    'options'   => array (

                        // Footer Style
                        'footer_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Footer Style', 'designr' ),
                            'default'       => 'default',
                            'choices'   => array (
                                'default'           => __( 'Default', 'designr' ),
                                'slim'              => __( 'Slim', 'designr' ),
                                'slim_centered'     => __( 'Slim - Centered', 'designr' ),
                            )
                        ),
                        'boxed_footer' => array (
                            'type'          => 'select',
                            'label'         => __( 'Footer - Boxed Content?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will line up the Footer with the main content instead of the left & right bounds of the window', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'footer_show_social' => array (
                            'type'          => 'select',
                            'label'         => __( 'Footer - Show Social?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will include the social icon links you have set', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'footer_show_branding' => array (
                            'type'          => 'select',
                            'label'         => __( 'Footer - Show Branding?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will include either an alternate custom logo or your site title in the footer', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'footer_show_copyright' => array (
                            'type'          => 'select',
                            'label'         => __( 'Footer - Show Copyright?', 'designr' ),
                            'description'   => __( 'Selecting "Yes" will include the copyright tagline in the footer', 'designr' ),
                            'default'       => 'yes',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'footer_copyright_tagline' => array (
                            'type'          => 'select',
                            'label'         => __( 'Copyright - Tagline Text', 'designr' ),
                            'default'       => __( '© 2018 Your Company', 'designr' ),
                        ),
                        'footer_branding' => array (
                            'type'          => 'select',
                            'label'         => __( 'Branding - What to Display?', 'designr' ),
                            'default'       => 'site_title',
                            'choices'   => array (
                                'site_title'    => __( 'Show Site Title', 'designr' ),
                                'alt_logo'      => __( 'Show Logo', 'designr' ),
                            )
                        ),
                        'alternate_logo' => array (
                            'type'          => 'image',
                            'label'         => __( 'Branding - Logo', 'designr' ),
                            'default'       => '',
                        ),
                        'designr_footer_logo_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Logo Height', 'designr' ),
                            'default'       => 30,
                        ),
                        'footer_site_title_font_size' => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Font Size', 'designr' ),
                            'default'       => 18
                        ),

                    )

                ),

                // Section : Footer Colors -------------------------------------
                'section_footer_colors' => array (

                    'title'     => __( 'Colors', 'designr' ),
                    'options'   => array (

                        // Footer Background
                        'footer_background' => array (
                            'type'          => 'select',
                            'label'         => __( 'Background Color', 'designr' ),
                            'default'       => '141414',
                            'choices'   => array (
                                '141414'    => __( 'Dark', 'designr' ),
                                'ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),

                        // Footer Foreground
                        'footer_foreground' => array (
                            'type'          => 'select',
                            'label'         => __( 'Foreground Color', 'designr' ),
                            'default'       => 'ffffff',
                            'choices'   => array (
                                '141414'    => __( 'Dark', 'designr' ),
                                'ffffff'    => __( 'Light', 'designr' ),
                            )
                        ),

                    )

                ),

            ), // End of Footer Sections

        ), // End of Footer Panel

    ), // End of Panels

);

$acid->config( $data );
