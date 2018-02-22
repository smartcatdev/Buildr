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
    wp_enqueue_script( 'designr-customizer-preview', get_template_directory_uri() . '/assets/admin/js/customizer-preview.js', array ( 'customize-preview' ), DESIGNR_VERSION, true );
}

add_action( 'customize_preview_init', 'designr_customize_preview_js' );


function designr_customize_controls_js() {
    wp_enqueue_script( 'designr-customizer-control', get_template_directory_uri() . '/assets/admin/js/customizer-control.js', array ( 'customize-preview' ), DESIGNR_VERSION, true );
    wp_enqueue_style( 'designr-customizer-style', get_template_directory_uri() . '/assets/admin/css/customizer.css', DESIGNR_VERSION, null );
}
add_action( 'customize_controls_enqueue_scripts', 'designr_customize_controls_js' );


$acid = acid_instance();

$data = array (
    
    'panels' => array (
        
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
                    
                    'title' => __( 'Navbar Style', 'designr' ),
                    'options' => array (
                        'navbar_style' => array (
                            'type'          => 'select',
                            'label'         => __( 'Navbar Style', 'designr' ),
                            'default'       => 'default',
                            'choices'   => array (
                                'default'   => __( 'Default', 'designr' ),
                                'custom_a'  => __( 'Custom A', 'designr' ),
                            )
                        ),
                        'navbar_links_font' => array (
                            'type'          => 'select',
                            'label'         => __( 'Navbar Links - Font Family', 'designr' ),
                            'default'       => 'primary',
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'designr' ),
                                'secondary' => __( 'Use Secondary Font', 'designr' ),
                            )
                        )
                    )
                    
                ),

                // Section : Custom A Style Settings ---------------------------
                'section_nav_style_a' => array (
                    
                    'title' => __( 'Style: Custom A - Settings', 'designr' ),
                    'dependancy'        => 'navbar_style',
                    'dependancy_val'    => 'custom_a',
                    
                    'options' => array (
                        'style_a_always_show_logo' => array (
                            'type'          => 'select',
                            'label'         => __( 'Logo always visible?', 'designr' ),
                            'description'   => __( 'When true, logo will be visible even when Navbar is collapsed / unstuck', 'designr' ),
                            'default'       => 'no',
                            'choices'   => array (
                                'no'        => __( 'No', 'designr' ),
                                'yes'       => __( 'Yes', 'designr' ),
                            )
                        ),
                        'style_a_collapse_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Height (Collapsed)', 'designr' ),
                            'description'   => __( 'When Navbar is collapsed / unstuck', 'designr' ),
                            'default'       => 50
                        ),
                        'style_a_expand_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Height (Expanded)', 'designr' ),
                            'description'   => __( 'When Navbar is expanded / sticky', 'designr' ),
                            'default'       => 75
                        ),
                        'style_a_mobile_logo_height' => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo Height (Mobile Only)', 'designr' ),
                            'description'   => __( 'Set the height of the logo in the mobile Navbar', 'designr' ),
                            'default'       => 50
                        )
                    )
                    
                ),
                
                // Section : Navbar Colors -------------------------------------
                'section_nav_colors' => array (
                    
                    'title' => __( 'Navbar Colors', 'designr' ),
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
                
                // Section : Footer Colors -------------------------------------
                'section_footer_colors' => array (
                    
                    'title'     => __( 'Footer Colors', 'designr' ),
                    'options'   => array (
                        
                        // Footer Background Color
                        'footer_background' => array (
                            'type'      => 'select',
                            'label'     => __( 'Background Color', 'designr' ),
                            'default'   => '141414',
                            'choices'   => array (
                                '141414'   => __( 'Dark', 'designr' ),
                                'ffffff'   => __( 'Light', 'designr' ),
                            )
                        ),
                        
                        // Footer Foreground Color
                        'footer_foreground' => array (
                            'type'      => 'select',
                            'label'     => __( 'Foreground Color', 'designr' ),
                            'default'   => 'ffffff',
                            'choices'   => array (
                                '141414'   => __( 'Dark', 'designr' ),
                                'ffffff'   => __( 'Light', 'designr' ),
                            )
                        )
                        
                    )
                    
                ),
                
            ), // End of Footer Sections
            
        ), // End of Footer Panel
        
    ), // End of Panels
    
);

$acid->config( $data );